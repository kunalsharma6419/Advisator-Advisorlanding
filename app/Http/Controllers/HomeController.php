<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Contact;
use App\Models\AdvisorProfiles;
use App\Models\BusinessFunctionCategory;
use App\Models\IndustryVertical;
use App\Models\GeographyLocation;
use App\Models\SubFunctionCategory;
use App\Models\Availabilities;
use App\Models\AppointmentBooking;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\UserProfiles;
use App\Models\CallReview;
use App\Models\CallLog;
use App\Models\WalletTransaction;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function redirect()
    {
        $usertype = Auth::user()->usertype;

        if($usertype=='1')
        {
            return view('admin.pages.dashboard');
            // return redirect()->route('advisatoradmin.dashboard');
        } elseif($usertype=='2') {
            return view('advisaor.pages.dashboard');
        } else {
            return view('web.pages.home');
        }
    }

    public function saveToken(Request $request)
    {
        // Validate incoming request
        $validatedData = $request->validate([
            'subscription_id' => 'required|string',
            'token' => 'required|string',
        ]);

        // Assuming you want to save this to the authenticated user
        $user = Auth::user();
        if ($user) {
            // Check if subscription_id and token are already saved
            if ($user->subscription_id === $validatedData['subscription_id'] && $user->device_token === $validatedData['token']) {
                return response()->json(['message' => 'Token and subscription ID already saved.'], 200);
            }
            $user->subscription_id = $validatedData['subscription_id'];
            $user->device_token = $validatedData['token'];
            $user->save();

            return response()->json(['message' => 'Token and subscription ID saved successfully!'], 200);
        }

        return response()->json(['message' => 'User not authenticated.'], 403);
    }

    public function getSubscriptionId(Request $request)
    {
        $uid = $request->query('uid');
        $user = User::where('unique_id', $uid)->first();

        if ($user) {
            return response()->json(['subscriptionId' => $user->subscription_id]); // Adjust according to your user model
        }

        return response()->json(['error' => 'User not found'], 404);
    }

    public function home(Request $request)
{
    $categories = BusinessFunctionCategory::all();
    $industries = IndustryVertical::all();
    $geographyLocations = GeographyLocation::all();
    $businessFunctions = BusinessFunctionCategory::select('id', 'name')->get();

    // Fetch request inputs
    $selectedCategory = $request->input('category');
    $selectedBusinessFunction = $request->input('business_function');
    $selectedSubFunction = $request->input('sub_function');
    $selectedIndustry = $request->input('industry');
    $selectedLocation = $request->input('location');

    // Prepare the advisor query with a join to advisor_evaluations
    $advisors = AdvisorProfiles::query()
        ->join('advisor_evaluations', 'advisor_profiles.advisor_id', '=', 'advisor_evaluations.advisor_nomination_id')
        ->select('advisor_profiles.*', 'advisor_evaluations.overall_score')
        ->where('profile_completion_percentage', '>=', 80) // Profile completion filter
        ->orderBy('advisor_evaluations.overall_score', 'desc'); // Order by overall score

    // Apply category filter if selected
    if ($selectedCategory) {
        $advisors->whereHas('businessFunctionCategory', function($query) use ($selectedCategory) {
            $query->where('name', $selectedCategory);
        });
    }

    // Apply business function filter if selected
    if ($selectedBusinessFunction) {
        $advisors->whereHas('businessFunctionCategory', function($query) use ($selectedBusinessFunction) {
            $query->where('name', $selectedBusinessFunction);
        });
    }

    // Apply sub-function filter if selected
    if ($selectedSubFunction) {
        $advisors->whereHas('subFunction', function($query) use ($selectedSubFunction) {
            $query->where('name', $selectedSubFunction);
        });
    }

    // Apply industry filter if selected
    if ($selectedIndustry) {
        $advisors->whereHas('industry', function($query) use ($selectedIndustry) {
            $query->where('name', $selectedIndustry);
        });
    }

    // Apply location filter if selected
    if ($selectedLocation) {
        $advisors->whereHas('getGeographies', function($query) use ($selectedLocation) {
            $query->where('name', $selectedLocation);
        });
    }

    // Fetch the filtered advisors
    $advisors = $advisors->get();

    // Check if the request is AJAX (to return only the advisor list)
    if ($request->ajax()) {
        return view('web.pages.partials.advisor-list', compact('advisors'));
    }

    // Return the full view if it's not an AJAX request
    return view('web.pages.home', compact('categories', 'industries', 'geographyLocations', 'advisors', 'businessFunctions'));
}

    
    
    
    public function showCategoryDetail(Request $request, $categoryName)
    {
        $category = BusinessFunctionCategory::where('name', $categoryName)->firstOrFail();
    
        // Fetch only advisors related to the specific category
        $query = AdvisorProfiles::with(['businessFunctionCategory', 'subFunctionCategory1', 'subFunctionCategory2'])
                    ->where('business_function_category_id', $category->id)
                    ->where('profile_completion_percentage', '>=', 80); // Ensure profile completion is at least 80%
    
        // Apply Search Filter
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($subQuery) use ($search) {
                $subQuery->where('full_name', 'like', '%' . $search . '%')
                         ->orWhere('advisor_id', 'like', '%' . $search . '%');
            });
        }
    
        $advisors = $query->get();
    
        // Add average review scores and availability status for each advisor
        $currentDay = Carbon::now('Asia/Kolkata')->format('D'); // Current day (e.g., 'Sat')
        $currentTime = Carbon::now('Asia/Kolkata'); // Current time in Indian timezone
    
        $advisors->map(function ($advisor) use ($currentDay, $currentTime) {
            // Fetch reviews
            $reviews = CallReview::where('advisor_id', $advisor->advisor_id)->get();
            $advisor->average_review_score = $reviews->isNotEmpty() ? $reviews->avg('overall_experience') : null;
    
            // Fetch availabilities
            $availabilities = Availabilities::where('advisor_nomination_id', $advisor->advisor_id)->get();
    
            // Check if available today
            $todayAvailabilities = $availabilities->filter(function ($availability) use ($currentDay) {
                return $availability->day === $currentDay; // Filter availabilities for the current day
            });
    
            $advisor->isAvailableToday = false;
            foreach ($todayAvailabilities as $availability) {
                try {
                    // Split the time slot into start and end times
                    [$startTime, $endTime] = explode('-', $availability->time_slot);
    
                    // Parse start and end times as Carbon instances in Indian timezone
                    $startTime = Carbon::createFromFormat('gA', trim($startTime), 'Asia/Kolkata');
                    $endTime = Carbon::createFromFormat('gA', trim($endTime), 'Asia/Kolkata');
    
                    // Handle cross-midnight time slots
                    if ($endTime->lt($startTime)) {
                        $endTime->addDay();
                    }
    
                    // Check if the current time falls within the time slot
                    if ($currentTime->between($startTime, $endTime, true)) {
                        $advisor->isAvailableToday = true;
                        break; // No need to check further slots
                    }
                } catch (\Exception $e) {
                    // Log any errors during time slot parsing
                    \Log::error('Time slot parsing error', [
                        'advisor_id' => $advisor->advisor_id,
                        'time_slot' => $availability->time_slot,
                        'error' => $e->getMessage(),
                    ]);
                }
            }
    
            return $advisor;
        });
    
        // Get all other categories except the current one
        $otherCategories = BusinessFunctionCategory::where('id', '!=', $category->id)->get();
        $otherCategories->prepend($category);
    
        return view('web.pages.category_detail', compact('advisors', 'category', 'otherCategories'));
    }

    
   public function showIndustryDetail(Request $request, $industryName)
{
    // Fetch the industry based on the name
    $industry = IndustryVertical::where('name', $industryName)->firstOrFail();

    // Fetch all advisors first
    $advisors = AdvisorProfiles::all();

    // Filter advisors that belong to the specified industry and have a profile completion of 80% or more
    $advisors = $advisors->filter(function ($advisor) use ($industry) {
        // Check if the advisor's industry_ids contains the industry ID and if profile is complete
        return in_array($industry->id, $advisor->industry_ids) && $advisor->profile_completion_percentage >= 80;
    });

    // Apply search filter if applicable
    if ($request->filled('search')) {
        $search = $request->search;
        $advisors = $advisors->filter(function ($advisor) use ($search) {
            return stripos($advisor->full_name, $search) !== false || stripos($advisor->advisor_id, $search) !== false;
        });
    }

    // Add availability status, review scores, and other data for each advisor
    $currentDay = Carbon::now('Asia/Kolkata')->format('D');
    $currentTime = Carbon::now('Asia/Kolkata');

    $advisors->map(function ($advisor) use ($currentDay, $currentTime) {
        // Check for availability
        $availabilities = Availabilities::where('advisor_nomination_id', $advisor->advisor_id)->get();
        $todayAvailabilities = $availabilities->filter(function ($availability) use ($currentDay) {
            return $availability->day === $currentDay;
        });

        $advisor->isAvailableToday = false;
        foreach ($todayAvailabilities as $availability) {
            try {
                [$startTime, $endTime] = explode('-', $availability->time_slot);
                $startTime = Carbon::createFromFormat('gA', trim($startTime), 'Asia/Kolkata');
                $endTime = Carbon::createFromFormat('gA', trim($endTime), 'Asia/Kolkata');

                if ($endTime->lt($startTime)) {
                    $endTime->addDay();
                }

                if ($currentTime->between($startTime, $endTime, true)) {
                    $advisor->isAvailableToday = true;
                    break;
                }
            } catch (\Exception $e) {
                \Log::error('Time slot parsing error', [
                    'advisor_id' => $advisor->advisor_id,
                    'time_slot' => $availability->time_slot,
                    'error' => $e->getMessage(),
                ]);
            }
        }

        // Fetch reviews and calculate the average score
        $reviews = CallReview::where('advisor_id', $advisor->advisor_id)->get();
        $advisor->average_review_score = $reviews->isNotEmpty() ? $reviews->avg('overall_experience') : null;

        return $advisor;
    });

    // Fetch other industries except the current one
    $otherIndustries = IndustryVertical::where('name', '!=', $industryName)->get();
    $otherIndustries->prepend($industry);

    return view('web.pages.industry_detail', compact('advisors', 'industry', 'otherIndustries'));
}

public function showGeographyDetail(Request $request, $locationName)
{
    // Fetch the geography location based on the name
    $location = GeographyLocation::where('name', $locationName)->firstOrFail();

    // Fetch all advisors first
    $advisors = AdvisorProfiles::all();

    // Filter advisors that belong to the specified geography location and have a profile completion of 80% or more
    $advisors = $advisors->filter(function ($advisor) use ($location) {
        // Check if the advisor's geography_ids contains the location ID and if profile is complete
        return in_array($location->id, $advisor->geography_ids) && $advisor->profile_completion_percentage >= 80;
    });

    // Apply search filter if applicable
    if ($request->filled('search')) {
        $search = $request->search;
        $advisors = $advisors->filter(function ($advisor) use ($search) {
            return stripos($advisor->full_name, $search) !== false || stripos($advisor->advisor_id, $search) !== false;
        });
    }

    // Add availability status, review scores, and other data for each advisor
    $currentDay = Carbon::now('Asia/Kolkata')->format('D');
    $currentTime = Carbon::now('Asia/Kolkata');

    $advisors->map(function ($advisor) use ($currentDay, $currentTime) {
        // Check for availability
        $availabilities = Availabilities::where('advisor_nomination_id', $advisor->advisor_id)->get();
        $todayAvailabilities = $availabilities->filter(function ($availability) use ($currentDay) {
            return $availability->day === $currentDay;
        });

        $advisor->isAvailableToday = false;
        foreach ($todayAvailabilities as $availability) {
            try {
                [$startTime, $endTime] = explode('-', $availability->time_slot);
                $startTime = Carbon::createFromFormat('gA', trim($startTime), 'Asia/Kolkata');
                $endTime = Carbon::createFromFormat('gA', trim($endTime), 'Asia/Kolkata');

                if ($endTime->lt($startTime)) {
                    $endTime->addDay();
                }

                if ($currentTime->between($startTime, $endTime, true)) {
                    $advisor->isAvailableToday = true;
                    break;
                }
            } catch (\Exception $e) {
                \Log::error('Time slot parsing error', [
                    'advisor_id' => $advisor->advisor_id,
                    'time_slot' => $availability->time_slot,
                    'error' => $e->getMessage(),
                ]);
            }
        }

        // Fetch reviews and calculate the average score
        $reviews = CallReview::where('advisor_id', $advisor->advisor_id)->get();
        $advisor->average_review_score = $reviews->isNotEmpty() ? $reviews->avg('overall_experience') : null;

        return $advisor;
    });

    // Fetch other locations except the current one
    $otherLocations = GeographyLocation::where('name', '!=', $locationName)->get();
    $otherLocations->prepend($location);

    return view('web.pages.geography_detail', compact('advisors', 'location', 'otherLocations'));
}

    

    public function landing()
    {
        return view('landing.index');
    }

    public function getSubFunctions(Request $request)
    {
        $subFunctions = SubFunctionCategory::where('business_function_category_id', $request->business_function_id)->get();
        return response()->json($subFunctions);
    }



    public function consultadvisor(Request $request)
    {
        // Start query with relationships
        $query = AdvisorProfiles::with(['businessFunctionCategory', 'subFunctionCategory1', 'subFunctionCategory2'])
            ->join('advisor_evaluations', 'advisor_profiles.advisor_id', '=', 'advisor_evaluations.advisor_nomination_id')
            ->select('advisor_profiles.*', 'advisor_evaluations.overall_score')
            ->orderBy('advisor_evaluations.overall_score', 'desc'); // Order by overall_score in descending order
    
        // Apply Profile completion filter
        $query->where('profile_completion_percentage', '>=', 80);
    
        // Apply other filters (business_function, sub_function, industry, location, etc.)
        if ($request->filled('business_function')) {
            $query->where('business_function_category_id', $request->business_function);
        }
    
        if ($request->filled('sub_function')) {
            $query->where(function ($subQuery) use ($request) {
                $subQuery->where('sub_function_category_id_1', $request->sub_function)
                        ->orWhere('sub_function_category_id_2', $request->sub_function);
            });
        }
    
        if ($request->filled('industry')) {
            $query->whereJsonContains('industry_ids', $request->industry);
        }
    
        if ($request->filled('location')) {
            $query->where('location', 'like', '%' . $request->location . '%');
        }
    
        if ($request->filled('price')) {
            $query->where('discovery_call_price_per_minute', '<=', $request->price);
        }
    
        if ($request->filled('available')) {
            $query->where('is_available', true);
        }
    
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($subQuery) use ($search) {
                $subQuery->where('full_name', 'like', '%' . $search . '%')
                        ->orWhere('advisor_id', 'like', '%' . $search . '%');
            });
        }
    
        // Fetch the advisors
        $advisors = $query->get();
    
        // Calculate the average review score for each advisor
        $advisors->map(function ($advisor) {
            // Get the reviews for this advisor
            $reviews = CallReview::where('advisor_id', $advisor->advisor_id)->get();
    
            // Calculate the average overall_experience score (out of 5)
            if ($reviews->isNotEmpty()) {
                $averageScore = $reviews->avg('overall_experience');
            } else {
                $averageScore = null; // No reviews, set to null or 0 if you prefer
            }
    
            // Add the average score to the advisor object
            $advisor->average_review_score = $averageScore;
    
            return $advisor;
        });
    
        // Fetch Availabilities for each advisor
        $advisorAvailabilities = [];
        foreach ($advisors as $advisor) {
            // Fetch availability for the advisor
            $advisorAvailabilities = Availabilities::where('advisor_nomination_id', $advisor->advisor_id)
                                                    ->orderBy('day')
                                                    ->get();
        }
    
        // Get upcoming days (next 7 days including today)
        $upcomingDays = [];
        for ($i = 0; $i < 7; $i++) {
            $date = Carbon::now()->addDays($i);
            $upcomingDays[] = [
                'day' => $date->format('D'),
                'date' => $date->format('Y-m-d')
            ];
        }
    
        // Pass filter data to view
        $businessFunctions = BusinessFunctionCategory::all();
        $industries = IndustryVertical::all();
        $locations = GeographyLocation::all();

     
// Add average review scores and availability status for each advisor
$currentDay = Carbon::now('Asia/Kolkata')->format('D'); // Current day (e.g., 'Sat')
$currentTime = Carbon::now('Asia/Kolkata'); // Current time in Indian timezone

$advisors->map(function ($advisor) use ($currentDay, $currentTime) {
    // Fetch reviews
    $reviews = CallReview::where('advisor_id', $advisor->advisor_id)->get();
    $advisor->average_review_score = $reviews->isNotEmpty() ? $reviews->avg('overall_experience') : null;

    // Fetch availabilities
    $availabilities = Availabilities::where('advisor_nomination_id', $advisor->advisor_id)->get();

    // Check if available today
    $todayAvailabilities = $availabilities->filter(function ($availability) use ($currentDay) {
        return $availability->day === $currentDay; // Filter availabilities for the current day
    });

    $advisor->isAvailableToday = false;
    foreach ($todayAvailabilities as $availability) {
        try {
            // Split the time slot into start and end times
            [$startTime, $endTime] = explode('-', $availability->time_slot);

            // Parse start and end times as Carbon instances in Indian timezone
            $startTime = Carbon::createFromFormat('gA', trim($startTime), 'Asia/Kolkata');
            $endTime = Carbon::createFromFormat('gA', trim($endTime), 'Asia/Kolkata');

            // Handle cross-midnight time slots
            if ($endTime->lt($startTime)) {
                $endTime->addDay();
            }

            // Check if the current time falls within the time slot
            if ($currentTime->between($startTime, $endTime, true)) {
                $advisor->isAvailableToday = true;
                break; // No need to check further slots
            }
        } catch (\Exception $e) {
            // Log any errors during time slot parsing
            \Log::error('Time slot parsing error', [
                'advisor_id' => $advisor->advisor_id,
                'time_slot' => $availability->time_slot,
                'error' => $e->getMessage(),
            ]);
        }
    }

    return $advisor;
});

        // Return filtered advisors to the view, including average review scores
        return view('web.pages.consultadvisor', compact('advisors', 'businessFunctions', 'industries', 'locations', 'advisorAvailabilities', 'upcomingDays'));
    }

    public function notifyAdvisor(Request $request, $userid)
    {
        $advisor = AdvisorProfiles::where('user_id', $userid)->first();
        $authUser = auth()->user();
    
        if (!$advisor) {
            return response()->json([
                'success' => false,
                'message' => 'Advisor not found.',
            ], 404);
        }
    
        if (!$authUser || !$authUser->unique_id) {
            return response()->json([
                'success' => false,
                'message' => 'User is not authenticated or does not have a unique ID.',
            ], 401);
        }
    
        // Create a unique cache key using the user's and advisor's IDs
        $cacheKey = 'notify_' . $authUser->unique_id . '_' . $advisor->user_id;
        
        // Check if a notification was already sent in the last 10 minutes
        if (Cache::has($cacheKey)) {
            return response()->json([
                'success' => false,
                'message' => 'You have already notified this advisor. Please try again after 60 minutes.',
            ], 429);
        }
    
        try {
            // Send the email notification
            \Mail::to($advisor->email)->send(new \App\Mail\AdvisorNotification($advisor, $authUser));
    
            // Store a timestamp in the cache for 10 minutes
            Cache::put($cacheKey, Carbon::now()->timestamp, 60 * 60);

    
            return response()->json([
                'success' => true,
                'message' => 'Advisor has been notified successfully.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to notify the advisor. Please try again.',
            ], 500);
        }
    }
    
    

    
    



    
    
        public function advisorSuggestions(Request $request)
    {
        if ($request->filled('query')) {
            $search = $request->query('query');
            $advisors = AdvisorProfiles::where('full_name', 'like', '%' . $search . '%')->limit(10)->get(['full_name']);

            return response()->json($advisors);
        }
        return response()->json([]);
    }


    public function advisorDetail($advisor_id)
    {
        // Fetch the advisor details with relationships
        $advisor = AdvisorProfiles::with([
                'businessFunctionCategory',
                'subFunctionCategory1',
                'subFunctionCategory2',
            ])
            ->where('user_id', $advisor_id)
            ->first();

        // If advisor is not found, redirect or show a 404 page
        if (!$advisor) {
            return redirect()->route('consult-advisor')->withErrors(['Advisor not found']);
        }

         // Retrieve industries and geographies based on stored IDs
        $industries = $advisor->getIndustries();
        $geographies = $advisor->getGeographies();


        // Fetch availabilities based on the related `advisor_nomination_id`
        $availabilities = Availabilities::where('advisor_nomination_id', $advisor->advisor_id)->get();
         // Fetch availability for the advisor
        $advisorAvailabilities = Availabilities::where('advisor_nomination_id', $advisor->advisor_id)
                                            ->orderBy('day')
                                            ->get();

        // Get upcoming days (next 7 days including today)
        $upcomingDays = [];
        for ($i = 0; $i < 7; $i++) {
            $date = Carbon::now()->addDays($i);
            $upcomingDays[] = [
                'day' => $date->format('D'), // e.g., Mon, Tue, etc.
                'date' => $date->format('Y-m-d')
            ];
        }

        $advisorProfile = AdvisorProfiles::where('user_id', $advisor_id)->first();

       $actualAdvisorId = $advisorProfile->advisor_id;

    // Step 4: Fetch reviews associated with this advisor ID
    $reviews = CallReview::where('advisor_id', $actualAdvisorId)
        ->with('userProfile') // Include the user profile relationship
        ->get(); // Fetch a single review

        $averageReviewScore = $reviews->isNotEmpty() ? $reviews->avg('overall_experience') : null;
        $advisor->average_review_score = $averageReviewScore;


// Determine availability for today
$currentDay = Carbon::now('Asia/Kolkata')->format('D'); // Get current day in 'D' format, e.g., 'Sat'
$currentTime = Carbon::now('Asia/Kolkata'); // Current time in Indian timezone
$isAvailableToday = false;

// Filter today's availability slots
$todayAvailabilities = $availabilities->filter(function ($availability) use ($currentDay) {
    return $availability->day === $currentDay; // Match the current day
});

foreach ($todayAvailabilities as $availability) {
    try {
        // Split the time slot into start and end times
        [$startTime, $endTime] = explode('-', $availability->time_slot);

        // Parse start and end times into Carbon instances using 12-hour format with meridian (AM/PM)
        $startTime = Carbon::createFromFormat('gA', trim($startTime), 'Asia/Kolkata'); // '9AM' -> '09:00 AM'
        $endTime = Carbon::createFromFormat('gA', trim($endTime), 'Asia/Kolkata'); // '10AM' -> '10:00 AM'

        // Handle scenarios where the end time is past midnight (e.g., '9PM-1AM')
        if ($endTime->lt($startTime)) {
            $endTime->addDay(); // Add one day to the end time if it's earlier than the start time
        }

        // Check if the current time falls within this slot
        if ($currentTime->between($startTime, $endTime, true)) {
            $isAvailableToday = true;
            break; // No need to check further slots
        }
    } catch (\Exception $e) {
        // Log any errors that occur during time parsing
        \Log::error('Time slot parsing error', [
            'time_slot' => $availability->time_slot,
            'error' => $e->getMessage(),
        ]);
    }
}
        // Pass the advisor data to the view
        return view('web.pages.advisordetail', compact('advisor','reviews','isAvailableToday', 'industries', 'geographies','availabilities', 'advisorAvailabilities', 'upcomingDays'));
    }




    // Show advisor profile with availability data
    public function showAdvisorAvailability($advisorNominationId)
    {
        $advisorAvailabilities = Availabilities::where('advisor_nomination_id', $advisorNominationId)->get();

        return view('web.pages.advisordetail', [
            'advisorAvailabilities' => $advisorAvailabilities,
        ]);
    }


    // Book an appointment
    // public function bookAppointment(Request $request)
    // {
    //     // Ensure user is authenticated
    //     if (!Auth::check()) {
    //         return response()->json(['error' => 'Kindly Login First to Book Appointment'], 401);
    //     }

    //    $validatedData = $request->validate([
    //         'advisor_nomination_id' => 'required|string',
    //         'day' => 'required|string',
    //         'time_slot' => 'required|string',
    //     ]);

    //     try {
    //             // Find the date from upcomingDays
    //         $date = Carbon::createFromFormat('Y-m-d', $validatedData['day']);
    //         $booking = new AppointmentBooking();
    //         $booking->booking_id = Str::random(9);  // Generating unique booking id
    //         $booking->advisor_id = $validatedData['advisor_nomination_id'];
    //         $booking->user_id = Auth::user()->unique_id;
    //         $booking->day = $validatedData['day'];
    //         $booking->time_slot = $validatedData['time_slot'];
    //         $booking->status = false; // Status will be pending (false)
    //         $booking->is_booked = false;
    //         $booking->booking_date = $date->toDateString(); // Assuming this is the date format you want to save
    //         $booking->booking_link = null; // You can set this if needed
    //         $booking->save();

    //         return response()->json(['success' => 'Appointment booked successfully!']);
    //     } catch (\Exception $e) {
    //         return response()->json(['error' => 'An error occurred while booking the appointment.'], 500);
    //     }
    // }
    public function discoverycall()
{
    // Get the advisor user_id from the session
    $advisorUserId = session('advisor_id'); // This should hold user_id

    // Check if the advisor user ID is available, else use the authenticated user's unique ID
    if (!$advisorUserId) {
        // Use the authenticated user's unique ID as the receiver ID fallback
        $advisorUserId = auth()->user()->unique_id;
    }

    // Fetch the advisor details based on the stored advisor user_id
    $advisor = AdvisorProfiles::with([
        'businessFunctionCategory',
        'subFunctionCategory1',
        'subFunctionCategory2',
    ])
    ->where('user_id', $advisorUserId) // Match with the user_id
    ->first();

    // Check if advisor was found or fallback user ID exists
    if (!$advisor) {
        return redirect()->back()->with('error', 'Advisor or user ID is not set.');
    }

    // Now, since we confirmed the advisor exists, we can safely access user_id
    $callLog = CallLog::where('receiver_id', $advisor->user_id)->latest()->first();

    // Pass the advisor data to the view
    return view('web.pages.discovery-call', compact('advisor', 'callLog'));
}



    
    public function setReceiverId(Request $request)
    {
        $request->validate(['receiver_id' => 'required|different:user_id']);
    
        // Ensure receiver ID isn't the same as the logged-in user's ID
        if ($request->receiver_id === auth()->user()->unique_id) {
            return response()->json(['error' => 'Cannot call yourself.'], 400);
        }
    
        // Set receiver ID in the session for the call
        session(['advisor_id' => $request->receiver_id]);
    
        return response()->json(['success' => true]);
    }
    
    


    public function initiateCall(Request $request)
    {
        // Validate the incoming request to ensure the advisor's user_id exists
        $request->validate([
            'advisorId' => 'required|string|exists:advisor_profiles,user_id', // Validate against user_id
        ]);
    
        // Store the advisor user_id in the session
        session(['advisor_id' => $request->advisorId]);
    
        // Return a success response
        return response()->json(['success' => true]);
    }
    
    




    public function acceptdiscoverycall($userId)
    {
        // Fetch the advisor details with relationships
        $advisor = AdvisorProfiles::where('user_id', $userId)
            ->first();
        $callLog = CallLog::where('receiver_id', $userId)->latest()->first();

        // Pass the advisor data to the view
        return view('web.pages.accept-call', compact('advisor', 'callLog'));
    }







    public function consultationcall()
    {
        // Get the advisor user_id from the session
    $advisorUserId = session('advisor_id'); // This should hold user_id

    // Check if the advisor user ID is available, else use the authenticated user's unique ID
    if (!$advisorUserId) {
        // Use the authenticated user's unique ID as the receiver ID fallback
        $advisorUserId = auth()->user()->unique_id;
    }

    // Fetch the advisor details based on the stored advisor user_id
    $advisor = AdvisorProfiles::with([
        'businessFunctionCategory',
        'subFunctionCategory1',
        'subFunctionCategory2',
    ])
    ->where('user_id', $advisorUserId) // Match with the user_id
    ->first();

    // Check if advisor was found or fallback user ID exists
    if (!$advisor) {
        return redirect()->back()->with('error', 'Advisor or user ID is not set.');
    }

    // Now, since we confirmed the advisor exists, we can safely access user_id
    $callLog = CallLog::where('receiver_id', $advisor->user_id)->latest()->first();

    // Pass the advisor data to the view
    return view('web.pages.consultation-call', compact('advisor', 'callLog'));
        
    }



    public function bookAppointment(Request $request)
{
    // Ensure user is authenticated
    if (Auth::check()) {
        // Validate the request data
        $validatedData = $request->validate([
            'advisor_nomination_id' => 'required|string',
            'day' => 'required|string',
            'time_slot' => 'required|string',
            'date' => 'required|date', // Ensure 'date' is a valid date
        ]);

        try {
            // Check if the slot is already booked with a status of 'Pending' or 'Upcoming'
            $existingBooking = AppointmentBooking::where('advisor_id', $validatedData['advisor_nomination_id'])
                ->where('day', $validatedData['day'])
                ->where('time_slot', $validatedData['time_slot'])
                ->whereIn('booking_status', ['Pending', 'Upcoming']) // Only consider these statuses as booked
                ->exists();

            if ($existingBooking) {
                return response()->json(['error' => 'This slot is already booked.'], 409);
            }

            // Retrieve advisor's rate and calculate 10%
            $advisor = AdvisorProfiles::where('advisor_id', $validatedData['advisor_nomination_id'])->firstOrFail();
            $deductionAmount = $advisor->conference_call_price_per_hour * 0.10;

            $user = Auth::user();
            if ($user->user_wallet_balance < $deductionAmount) {
                return response()->json(['error' => 'Insufficient wallet balance.'], 402);
            }

            // Deduct the amount from the user's wallet
            $user->user_wallet_balance -= $deductionAmount;
            $user->save();

            // Create new appointment booking
            $booking = new AppointmentBooking();
            $booking->booking_id = Str::random(9); // Generating unique booking id
            $booking->advisor_id = $validatedData['advisor_nomination_id'];
            $booking->user_id = $user->unique_id;
            $booking->day = $validatedData['day'];
            $booking->time_slot = $validatedData['time_slot'];
            $booking->status = false; // Status will be pending (false)
            $booking->is_booked = false;
            $booking->booking_date = $validatedData['date']; // Store the booking date
            $booking->booking_link = null; // You can set this if needed

            // Add the booking amount to the booking
            $booking->booking_amount = $deductionAmount; // Store the amount deducted

            $booking->save();

            // Record the transaction for the user
            WalletTransaction::create([
                'user_id' => $user->unique_id,
                'date' => now()->toDateString(),
                'time' => now()->toTimeString(),
                'status' => 'Booking 10% Deducted',
                'method' => 'booking fees',
                'amount' => $deductionAmount,
                'total_wallet_balance' => $user->user_wallet_balance,
            ]);

            return response()->json(['success' => 'Appointment booked successfully!']);
        } catch (\Exception $e) {
            // Log the error and return a response
            \Log::error('Error booking appointment: ' . $e->getMessage());
            return response()->json(['error' => 'An error occurred while booking the appointment.'], 500);
        }
    } else {
        return response()->json(['error' => 'Kindly Login First to Book Appointment'], 401);
    }
}



    public function aboutus()
    {
        return view('web.pages.aboutus');
    }

    public function blog()
    {
        return view('web.pages.blog');
    }

    public function contactus()
    {
        return view('web.pages.contactus');
    }

    public function contactstore(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Create a new Contact instance
        $contact = Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        // Optionally, you can add a success message or redirect the user with SweetAlert
        if ($contact) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function terms()
    {
        return view('landing.pages.terms');
    }

    public function privacy()
    {
        return view('landing.pages.privacy');
    }

    public function onboardpolicy()
    {
        return view('landing.pages.onboardpolicy');
    }

    public function shippingdeliverypolicy()
    {
        return view('landing.pages.shippingdeliverypolicy');
    }

    public function cancellationrefundpolicy()
    {
        return view('landing.pages.cancellationrefundpolicy');
    }
}
