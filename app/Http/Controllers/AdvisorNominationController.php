<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdvisorNomination;
use App\Models\User;
use App\Models\BusinessFunctionCategory;
use App\Models\SubFunctionCategory;
use App\Models\Availabilities;
use App\Models\IndustryVertical;
use App\Models\GeographyLocation;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class AdvisorNominationController extends Controller
{
    public function create($userId)
    {
        $user = User::where('unique_id', $userId)->firstOrFail();
        $businessFunctionCategories = BusinessFunctionCategory::all();
        $industries = IndustryVertical::all();
        $geographies = GeographyLocation::all();
        return view('auth.advisornomination', compact('user','businessFunctionCategories','industries','geographies'));
    }


    public function getByBusinessFunctionCategory($id)
    {
        return response()->json(SubFunctionCategory::where('business_function_category_id', $id)->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'location' => 'required|string|max:255',
            'linkedin_profile' => 'nullable|string|max:255',
            'business_function_category_id' => 'required|exists:business_function_categories,id',
            'sub_function_category_id_1' => 'nullable|exists:sub_function_categories,id',
            'sub_function_category_id_2' => 'nullable|exists:sub_function_categories,id',
            'industry' => 'nullable|array|max:3',
            'industry.*' => 'string|max:255',
            'geography' => 'nullable|array|max:3',
            'geography.*' => 'string|max:255',
            'nominee_qualification' => 'nullable|string|max:255',
            'nominee_experience' => 'nullable|integer',
            'nominee_skills' => 'nullable|string',
            'discovery_call_price_per_minute' => 'nullable|numeric|min:0',
            'discovery_call_price_per_hour' => 'nullable|numeric|min:0',
            'conference_call_price_per_minute' => 'nullable|numeric|min:0',
            'conference_call_price_per_hour' => 'nullable|numeric|min:0',
            'chat_price_per_minute' => 'nullable|numeric|min:0',
            'chat_price_per_hour' => 'nullable|numeric|min:0',
            'nomination_reason' => 'nullable|string',
            'nomination_status' => 'nullable|in:inprogress,selected,rejected',
        ]);

        $user = User::where('unique_id', $request->user_id)->firstOrFail();

        $advisor = AdvisorNomination::create([
            'nominee_id' => Str::random(12),
            'user_id' => $request->user_id,
            'full_name' => $request->full_name,
            'email' => $request->email,
            'mobile_number' => $request->mobile_number,
            'location' => $request->location,
            'linkedin_profile' => $request->linkedin_profile,
            'business_function_category_id' => $request->business_function_category_id,
            'sub_function_category_id_1' => $request->sub_function_category_id_1,
            'sub_function_category_id_2' => $request->sub_function_category_id_2,
            'industry_ids' => $request->industry,
            'geography_ids' => $request->geography,
            'nominee_qualification' => $request->nominee_qualification,
            'nominee_experience' => $request->nominee_experience,
            'discovery_call_price_per_minute' => $request->discovery_call_price_per_minute,
            'discovery_call_price_per_hour' => $request->discovery_call_price_per_hour,
            'conference_call_price_per_minute' => $request->conference_call_price_per_minute,
            'conference_call_price_per_hour' => $request->conference_call_price_per_hour,
            'chat_price_per_minute' => $request->chat_price_per_minute,
            'chat_price_per_hour' => $request->chat_price_per_hour,
            'nomination_reason' => $request->nomination_reason,
            'nomination_status' => 'inprogress',
        ]);

        $availabilityData = json_decode($request->availability, true);
        foreach ($availabilityData as $day => $timeSlots) {
            foreach ($timeSlots as $timeSlot) {
                Availabilities::create([
                    'advisor_nomination_id' => $advisor->nominee_id,
                    'day' => $day,
                    'time_slot' => $timeSlot,
                    'availability_status' => true,
                ]);
            }
        }

        // return redirect()->back()->with('success', 'Nomination created successfully.');
        return response()->json(['success' => true,'msg'=> 'Nomination created successfully.', 'redirect' => route('home')]);
    }

}
