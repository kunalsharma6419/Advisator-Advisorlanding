<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserRegistration;
use App\Models\User;
use App\Models\BusinessFunctionCategory;
use App\Models\SubFunctionCategory;
use App\Models\IndustryVertical;
use App\Models\GeographyLocation;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class UserRegistrationController extends Controller
{
    public function create($userId)
    {
        $user = User::where('unique_id', $userId)->firstOrFail();
        $businessFunctionCategories = BusinessFunctionCategory::all();
        $industries = IndustryVertical::all();
        $geographies = GeographyLocation::all();
        return view('auth.userregistration', compact('user','businessFunctionCategories','industries','geographies'));
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
            'business_function_category_id' => 'nullable|exists:business_function_categories,id',
            'sub_function_category_id_1' => 'nullable|exists:sub_function_categories,id',
            'sub_function_category_id_2' => 'nullable|exists:sub_function_categories,id',
            'industry' => 'nullable|array|max:3',
            'industry.*' => 'string|max:255',
            'geography' => 'nullable|array|max:3',
            'geography.*' => 'string|max:255',
            'other_industry' => 'nullable|string|max:255',
            'is_terms_accept' => 'required|boolean|in:1', // Validates that the checkbox is checked
        ]);
    
        $user = User::where('unique_id', $request->user_id)->firstOrFail();
        // Handle new industry
        $industry = $request->industry;
        if ($request->filled('other_industry')) {
            $newIndustry = IndustryVertical::create(['name' => $request->other_industry]);
            $industry[] = $newIndustry->id;
        }
    
        // Create the user registration
        $advisor = UserRegistration::create([
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
            'is_terms_accept' => $request->is_terms_accept, // Store the terms acceptance flag
        ]);
    
        return response()->json(['success' => true,'msg'=> 'User Registration filled successfully.', 'redirect' => route('home')]);
    }
    
}
