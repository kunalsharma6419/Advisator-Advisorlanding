<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdvisorProfiles;
use App\Models\BusinessFunctionCategory;
use App\Models\SubFunctionCategory;
use App\Models\IndustryVertical;
use App\Models\GeographyLocation;
use App\Models\Availabilities;
use App\Models\AdvisorNomination;
use App\Models\BankDetails;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdvisorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entriesPerPage = request('entries', 10);
        $search = request('search');
        $advisors = AdvisorProfiles::query();

        if ($search) {
            $advisors->where(function ($query) use ($search) {
                $query->where('nominee_id', 'LIKE', '%' . $search . '%')
                    ->orWhere('full_name', 'LIKE', '%' . $search . '%')
                    ->orWhere('email', 'LIKE', '%' . $search . '%')
                    ->orWhere('mobile_number', 'LIKE', '%' . $search . '%')
                    ->orWhere('location', 'LIKE', '%' . $search . '%')
                    ->orWhere('user_id', 'LIKE', '%' . $search . '%');
            });
        }

        $advisors = $advisors->where('nomination_status', 'selected')->paginate($entriesPerPage);
        $totaladvisors = AdvisorProfiles::where('nomination_status', 'selected')->count();

        $recentlySelectedDate = Carbon::now()->subDays(7);
        $newprofiles = AdvisorProfiles::where('nomination_status', 'selected')
                                        ->where('updated_at', '>=', $recentlySelectedDate)
                                        ->count();

        return view('admin.pages.advisoraccounts.index', compact('advisors', 'search', 'totaladvisors', 'newprofiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $advisor = AdvisorProfiles::with(['businessFunctionCategory', 'subFunctionCategory1', 'subFunctionCategory2'])->findOrFail($id);
        $industries = $advisor->getIndustries();
        $geographies = $advisor->getGeographies();

        return view('admin.pages.advisoraccounts.show', compact('advisor', 'industries', 'geographies'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $advisor = AdvisorProfiles::with('bankDetails')->findOrFail($id);
        $businessFunctionCategories = BusinessFunctionCategory::all();
        $industries = IndustryVertical::all();
        $geographies = GeographyLocation::all();

        // Fetch options for Sub Function 1 and Sub Function 2 based on the advisor's selected business function category
        $subFunction1Options = [];
        $subFunction2Options = [];

        if ($advisor->business_function_category_id) {
            $subFunction1Options = SubFunctionCategory::where('business_function_category_id', $advisor->business_function_category_id)->get();
            $subFunction2Options = SubFunctionCategory::where('business_function_category_id', $advisor->business_function_category_id)->get();
        }

        return view('admin.pages.advisoraccounts.edit', compact('advisor', 'businessFunctionCategories', 'industries','geographies','subFunction1Options', 'subFunction2Options' ));
    }

    public function getByBusinessFunctionCategory($id)
    {
        // return response()->json(SubFunctionCategory::where('business_function_category_id', $id)->get());
        $subFunctionCategories = SubFunctionCategory::where('business_function_category_id', $id)->get();
        return response()->json($subFunctionCategories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $advisor = AdvisorProfiles::findOrFail($id);

        // Validate incoming request data
        $request->validate([
            'photo' => 'nullable|image|max:2048', // Adjust max file size as needed
            'full_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $advisor->id,
            'mobile_number' => 'required|string|max:20',
            'location' => 'nullable|string|max:255',
            'business_function_category_id' => 'required|exists:business_function_categories,id',
            'sub_function_category_id_1' => 'nullable|exists:sub_function_categories,id',
            'sub_function_category_id_2' => 'nullable|exists:sub_function_categories,id',
            'industries.*' => 'nullable|exists:industry_verticals,id',
            'geographies.*' => 'nullable|exists:geography_locations,id',
            'highlighted_images.*' => 'nullable|image|max:2048', // Validate highlighted images
            'is_available' => 'nullable|boolean',
            'language_known' => 'nullable|string|in:English,Hindi',
            'services.*' => 'nullable|string',
            'awards_recognition.*' => 'nullable|string',
            // 'video_upload.*' => 'nullable|file|mimes:mp4,mov,avi|max:20480', // Validate video uploads
            'about' => 'nullable|string',
            'is_founder' => 'nullable|boolean',
            'company_name' => 'nullable|string|max:255',
            'company_website' => 'nullable|string|max:255|url',
        ]);

        // Handle photo upload
        if ($request->hasFile('photo')) {
            // Delete previous photo if exists
            if ($user->profile_photo_path) {
                Storage::delete($user->profile_photo_path);
            }

            // Store new photo
            $photoPath = $request->file('photo')->store('profile-photos', 'public');
            $user->profile_photo_path = $photoPath;
        }

        // Handle multiple photo uploads (highlighted_images)
        if ($request->hasFile('highlighted_images')) {
            $uploadedImages = [];
            foreach ($request->file('highlighted_images') as $image) {
                $path = $image->store('highlighted-images', 'public');
                $uploadedImages[] = $path;
            }
            $advisor->highlighted_images = $uploadedImages;
        }

        // Remove deleted images from storage and database
        if ($request->has('removed_images')) {
            $removedImages = $request->input('removed_images', []);
            foreach ($removedImages as $removedImage) {
                // Delete from storage
                Storage::disk('public')->delete($removedImage);
                // Remove from database field
                $advisor->highlighted_images = array_diff($advisor->highlighted_images ?? [], [$removedImage]);
            }
        }

        // Update advisor profile fields
        $advisor->fill($request->except(['photo', 'industries', 'geographies', 'highlighted_images', 'removed_images']));

        // Sync industries
        if ($request->has('industries')) {
            $advisor->industry_ids = $request->input('industries');
        } else {
            $advisor->industry_ids = [];
        }

        // Sync geographies
        if ($request->has('geographies')) {
            $advisor->geography_ids = $request->input('geographies');
        } else {
            $advisor->geography_ids = [];
        }

        // Convert JSON strings to arrays
        $advisor->industry_ids = json_decode($request->input('industries', '[]'));
        $advisor->geography_ids = json_decode($request->input('geographies', '[]'));


        // Sync services
        $advisor->services = $request->input('services', []);

        // Sync awards and recognitions
        $advisor->awards_recognition = $request->input('awards_recognition', []);


        // Save advisor profile
        $advisor->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    public function getAvailability($id)
    {
        $advisor = AdvisorProfiles::findOrFail($id);
        // dd($advisor);
        // Retrieve availabilities based on advisor_nomination_id
        $availabilities = Availabilities::where('advisor_nomination_id', $advisor->advisor_id)
            ->get(); // Retrieve all availabilities
        // dd($availabilities);
        // Prepare an array to store formatted availability data
        $formattedAvailabilities = [];

        // Iterate through each availability record
        foreach ($availabilities as $availability) {
            // Extract necessary fields
            $day = $availability->day;
            $timeSlot = $availability->time_slot;
            $availabilityStatus = $availability->availability_status;

            // If day key does not exist in formatted array, initialize it
            if (!isset($formattedAvailabilities[$day])) {
                $formattedAvailabilities[$day] = [];
            }

            // Add time slot to the respective day
            $formattedAvailabilities[$day][] = [
                'time_slot' => $timeSlot,
                'availability_status' => $availabilityStatus,
            ];
        }

        // Return JSON response with formatted availabilities
        return response()->json($formattedAvailabilities);
    }

    public function updateAvailability(Request $request, $id)
    {
        try {
            // Retrieve authenticated user and advisor nomination
            $advisor = AdvisorProfiles::findOrFail($id);

            // Validate availability data structure if needed
            $availabilityData = $request->availability;
            if (!is_array($availabilityData)) {
                throw new \InvalidArgumentException('Invalid availability data format');
            }

            // Begin database transaction for atomicity
            \DB::beginTransaction();

            // Delete existing availabilities for the advisor
            Availabilities::where('advisor_nomination_id', $advisor->advisor_id)->delete();

            // Insert new availabilities using Eloquent
            foreach ($availabilityData as $day => $timeSlots) {
                foreach ($timeSlots as $timeSlot) {
                    Availabilities::create([
                        'advisor_nomination_id' => $advisor->advisor_id,
                        'day' => $day,
                        'time_slot' => $timeSlot['time_slot'],
                        'availability_status' => $timeSlot['availability_status'],
                    ]);
                }
            }

            // Commit transaction
            \DB::commit();

            // Return success response
            return response()->json(['message' => 'Availability updated successfully']);

        } catch (\Exception $e) {
            // Rollback transaction on error
            \DB::rollBack();

            // Log the exception for debugging purposes
            \Log::error('Error updating availability: ' . $e->getMessage());

            // Return error response
            return response()->json(['error' => 'Failed to update availability. Please try again later.'], 500);
        }
    }

    public function updatePrices(Request $request, $id)
    {
        $advisor = AdvisorProfiles::findOrFail($id);

        $advisor->discovery_call_price_per_minute = $request->input('discovery_call_price_per_minute');
        $advisor->discovery_call_price_per_hour = $request->input('discovery_call_price_per_hour');
        $advisor->conference_call_price_per_minute = $request->input('conference_call_price_per_minute');
        $advisor->conference_call_price_per_hour = $request->input('conference_call_price_per_hour');
        $advisor->chat_price_per_minute = $request->input('chat_price_per_minute');
        $advisor->chat_price_per_hour = $request->input('chat_price_per_hour');

        $advisor->save();
        return redirect()->back()->with('success', 'Prices updated successfully');
    }

    public function updateVideos(Request $request, $id)
    {
        try {
            $advisor = AdvisorProfiles::findOrFail($id);

            // Validate uploaded videos
            $request->validate([
                'video_upload.*' => 'nullable|file|mimes:mp4,mov,avi|max:20480', // Max size 2MB
            ]);

            if ($request->hasFile('video_upload')) {
                $uploadedVideos = [];
                foreach ($request->file('video_upload') as $video) {
                    $path = $video->store('videos', 'public');
                    $uploadedVideos[] = $path;
                }
                $advisor->video_upload = $uploadedVideos;
            }

            if ($request->has('removed_videos')) {
                $removedVideos = $request->input('removed_videos', []);
                foreach ($removedVideos as $removedVideo) {
                    Storage::disk('public')->delete($removedVideo);
                    $advisor->video_upload = array_diff($advisor->video_upload ?? [], [$removedVideo]);
                }
            }

            $advisor->save();

            return redirect()->back()->with('success', 'Videos updated successfully');
        } catch (\Exception $e) {
            \Log::error('Error updating videos: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to update videos. Please try again later.');
        }
    }

    public function bankstore(Request $request, $id)
    {
        $advisor = AdvisorProfiles::with('bankDetails')->findOrFail($id);
        $request->validate([
            'bank_name' => 'required|string|max:255',
            'account_holder_name' => 'required|string|max:255',
            'account_number' => 'required|string|max:255',
            'account_type' => 'required|in:saving,current',
            'bank_ifsc' => 'required|string|max:255',
        ]);

        BankDetails::updateOrCreate(
            ['advisor_profile_id' => $advisor->advisor_id],
            $request->only('bank_name', 'account_holder_name', 'account_number', 'account_type', 'bank_ifsc')
        );

        return redirect()->back()->with('success', 'Bank details updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
