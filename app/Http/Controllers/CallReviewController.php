<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdvisorProfiles;
use App\Models\CallReview;
use Illuminate\Support\Facades\Session;

class CallReviewController extends Controller
{
    // Save the advisor ID for review
    public function saveAdvisorIdForReview(Request $request)
    {
        $request->validate([
            'advisor_id' => 'required|string',
        ]);

        // Store the advisor_id in session
        Session::put('advisor_id', $request->advisor_id);

        return response()->json([
            'message' => 'Advisor ID stored successfully',
            'redirect_url' => route('call.review.index'),
        ], 200);
    }

    // Show the review form
    public function index(Request $request)
    {
        // Retrieve the advisor ID from the session
        $advisorId = Session::get('advisor_id');

        // Fetch the advisor profile using the user_id (advisor_id in session corresponds to user_id in AdvisorProfiles)
        $advisorProfile = AdvisorProfiles::where('user_id', $advisorId)->first();

        // If the advisor profile is not found, redirect with an error
        if (!$advisorProfile) {
            return redirect()->route('home')->withErrors('Advisor not found.');
        }

        // Set advisor name and profile image with a fallback
        $advisorName = $advisorProfile->name;
        $advisorImage = $advisorProfile->profile_photo_path
            ? asset('storage/' . $advisorProfile->profile_photo_path)
            : asset('src/assets/advisorgeneral.webp');

        return view('web.pages.call_review', compact('advisorName', 'advisorId', 'advisorImage', 'advisorProfile'));
    }


    // Store the review
    public function store(Request $request)
    {
        // Validate the incoming data
        $request->validate([
            'overall_experience' => 'required|numeric|between:1,5',
            'reliability' => 'required|numeric|between:1,5',
            'affordability' => 'required|numeric|between:1,5',
            'relevance_to_problem' => 'required|numeric|between:1,5',
            'review' => 'required|string',
            'advisor_id' => 'required|string|exists:advisor_profiles,user_id',  // Validate advisor_id exists in advisor_profiles table by user_id
        ]);

        // Fetch the advisor ID from the advisor_profiles table based on user_id
        $advisor = AdvisorProfiles::where('user_id', $request->advisor_id)->first();

        if (!$advisor) {
            return redirect()->back()->withErrors('Advisor not found.');
        }

        // Create a new CallReview record
        CallReview::create([
            'user_id' => auth()->user()->unique_id,
            'advisor_id' => $advisor->advisor_id,  // Now using advisor_id from the advisor_profiles table
            'overall_experience' => $request->overall_experience,
            'reliability' => $request->reliability,
            'affordability' => $request->affordability,
            'relevance_to_problem' => $request->relevance_to_problem,
            'review' => $request->review,
        ]);

        // Redirect to the home page with a success message
        return redirect()->route('home')->with('success', 'Thank you for your feedback!');
    }
}
