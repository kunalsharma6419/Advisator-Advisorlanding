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
use App\Mail\AdvisorNominationMail;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdminNominationNotification;

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
            'document_path' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'other_industry' => 'nullable|string|max:255',
            'nomination_reason' => 'nullable|string',
            'nomination_status' => 'nullable|in:inprogress,selected,rejected',
            'is_terms_accept' => 'required|boolean',  // Add this validation
        ]);
    
        // Check if the advisor has already submitted a nomination
        $existingNomination = AdvisorNomination::where('user_id', $request->user_id)
            ->where('nomination_status', 'inprogress')
            ->first();
    
        if ($existingNomination) {
            return response()->json([
                'success' => false,
                'msg' => 'You have already filled the nomination form. Kindly wait for the advisor team to review it.',
                'redirect' => route('home'),
            ]);
        }
    
        // Handle new industry
        $industry = $request->industry;
        if ($request->filled('other_industry')) {
            $newIndustry = IndustryVertical::create(['name' => $request->other_industry]);
            $industry[] = $newIndustry->id;
        }
    
        // Store the advisor nomination
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
            'industry_ids' => $industry,
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
            'is_terms_accept' => $request->has('is_terms_accept'),  // Store the terms acceptance
        ]);
    
        // Handle document upload
        if ($request->hasFile('document_path')) {
            $documentPath = $request->file('document_path')->store('documents', 'public');
            $advisor->update(['document_path' => $documentPath]);
        }
    
        // Handle availability
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
    
        // Send email to advisor and admin
        Mail::to($advisor->email)->send(new AdvisorNominationMail($advisor));
        $admin = User::where('usertype', 1)->first();
        Mail::to($admin->email)->send(new AdminNominationNotification($advisor));
    
        return response()->json(['success' => true,'msg'=> 'Nomination created successfully.', 'redirect' => route('home')]);
    }
    

}
