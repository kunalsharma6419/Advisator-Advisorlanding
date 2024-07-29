<?php

namespace App\Http\Controllers\Advisor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\AdvisorProfiles;
use App\Models\BusinessFunctionCategory;
use App\Models\SubFunctionCategory;
use App\Models\IndustryVertical;
use App\Models\GeographyLocation;
use App\Models\Availabilities;
use App\Models\AdvisorNomination;
use Illuminate\Support\Facades\DB;
use App\Models\BankDetails;
use App\Models\CustomerSupportTicket;

class ProfileController extends Controller
{
    public function myprofile()
    {
        $advisor = AdvisorProfiles::with('bankDetails')->where('user_id', Auth::user()->unique_id)->firstOrFail();
        // dd($advisor);
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

        return view('advisor.pages.myprofile', [
            'user' => Auth::user(),
            'advisor' => $advisor,
            'businessFunctionCategories' => $businessFunctionCategories,
            'industries' => $industries,
            'geographies' => $geographies,
            'subFunction1Options' => $subFunction1Options,
            'subFunction2Options' => $subFunction2Options,
        ]);
    }


    public function getByBusinessFunctionCategory($id)
    {
        // return response()->json(SubFunctionCategory::where('business_function_category_id', $id)->get());
        $subFunctionCategories = SubFunctionCategory::where('business_function_category_id', $id)->get();
        return response()->json($subFunctionCategories);
    }

    public function profileupdate(Request $request)
    {
        $user = Auth::user();
        $advisor = AdvisorProfiles::where('user_id', $user->unique_id)->firstOrFail();

        // Validate incoming request data
        $request->validate([
            'photo' => 'nullable|image|max:2048', // Adjust max file size as needed
            'full_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
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
            'services' => 'nullable|string',
            'awards_recognition' => 'nullable|string',
            // 'video_upload.*' => 'nullable|file|mimes:mp4,mov,avi|max:20480', // Validate video uploads
            'about' => 'nullable|string',
            'is_founder' => 'nullable|boolean',
            'linkedin_profile' => 'nullable|string',
            'company_name' => 'nullable|string|max:255',
            'company_website' => 'nullable|string|max:255|url',
        ]);

        // // Handle photo upload
        // if ($request->hasFile('photo')) {
        //     // Delete previous photo if exists
        //     if ($user->profile_photo_path) {
        //         Storage::delete($user->profile_photo_path);
        //     }

        //     // Store new photo
        //     $photoPath = $request->file('photo')->store('profile-photos', 'public');
        //     $user->profile_photo_path = $photoPath;
        // }
        // Handle photo upload
        if ($request->hasFile('photo')) {
            if ($advisor->profile_photo_path) {
                Storage::delete($advisor->profile_photo_path);
            }
            $photoPath = $request->file('photo')->store('profile-photos', 'public');
            $advisor->profile_photo_path = $photoPath;
            $advisor->save();
            $user->profile_photo_path = $photoPath;
            $user->save();
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


    public function getAvailability()
    {
        $user = Auth::user();
        $advisornomination = AdvisorNomination::where('user_id', $user->unique_id)->firstOrFail();
        $advisor = AdvisorProfiles::where('advisor_id', $advisornomination->nominee_id)->firstOrFail();
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

    public function updateAvailability(Request $request)
    {
        try {
            // Retrieve authenticated user and advisor nomination
            $user = Auth::user();
            $advisornomination = AdvisorNomination::where('user_id', $user->unique_id)->firstOrFail();
            $advisor = AdvisorProfiles::where('advisor_id', $advisornomination->nominee_id)->firstOrFail();

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

    public function updateVideos(Request $request)
    {
        try {
            $user = Auth::user();
            $advisor = AdvisorProfiles::where('user_id', $user->unique_id)->firstOrFail();

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

    public function updatePrices(Request $request)
    {
        $user = Auth::user();
        $advisor = AdvisorProfiles::where('user_id', $user->unique_id)->firstOrFail();

        $advisor->discovery_call_price_per_minute = $request->input('discovery_call_price_per_minute');
        $advisor->discovery_call_price_per_hour = $request->input('discovery_call_price_per_hour');
        $advisor->conference_call_price_per_minute = $request->input('conference_call_price_per_minute');
        $advisor->conference_call_price_per_hour = $request->input('conference_call_price_per_hour');
        $advisor->chat_price_per_minute = $request->input('chat_price_per_minute');
        $advisor->chat_price_per_hour = $request->input('chat_price_per_hour');

        $advisor->save();
        return redirect()->back()->with('success', 'Prices updated successfully');
    }

    public function bankstore(Request $request)
    {
        $user = Auth::user();
        $advisor = AdvisorProfiles::where('user_id', $user->unique_id)->firstOrFail();
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

    public function ticketstore(Request $request)
    {
        $user = Auth::user();
        $advisor = AdvisorProfiles::where('user_id', $user->unique_id)->firstOrFail();
        $request->validate([
            'subject' => 'required|string|max:255',
            'description' => 'required|string',
            'attachment' => 'nullable|file|max:10240' // max 10MB file size
        ]);

        // Prepare ticket data
        $ticketData = [
            'advisor_profile_id' => $advisor->advisor_id,
            'subject' => $request->input('subject'),
            'description' => $request->input('description'),
        ];

        // Handle attachment upload
        if ($request->hasFile('attachment')) {
            $attachmentPath = $request->file('attachment')->store('attachments', 'public');
            // $path = $image->store('highlighted-images', 'public');
            $ticketData['attachment'] = $attachmentPath;
        }

        // Create the ticket
        CustomerSupportTicket::create($ticketData);

        return redirect()->back()->with('success', 'Ticket submitted successfully!');
    }
}
