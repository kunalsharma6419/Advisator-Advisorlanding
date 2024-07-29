<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdvisorNomination;
use App\Models\AdvisorEvaluation;
use App\Models\AdvisorProfiles;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdvisorSelected;
use App\Mail\AdvisorRejected;

class NominationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $entriesPerPage = request('entries', 10);
    //     $search = request('search');
    //     $nominations = AdvisorNomination::with('evaluations');

    //     if ($search) {
    //         $nominations->where(function ($query) use ($search) {
    //             $query->where('nominee_id', 'LIKE', '%' . $search . '%')
    //                 ->orWhere('full_name', 'LIKE', '%' . $search . '%')
    //                 ->orWhere('email', 'LIKE', '%' . $search . '%')
    //                 ->orWhere('mobile_number', 'LIKE', '%' . $search . '%')
    //                 ->orWhere('location', 'LIKE', '%' . $search . '%')
    //                 ->orWhere('user_id', 'LIKE', '%' . $search . '%');
    //         });
    //     }

    //     // Order nominations by most recent (created_at DESC)
    //     $nominations->orderBy('created_at', 'DESC');

    //     $nominations = $nominations->paginate($entriesPerPage);
    //     $inProgressCount = AdvisorNomination::where('nomination_status', 'inprogress')->count();
    //     $selectedCount = AdvisorNomination::where('nomination_status', 'selected')->count();
    //     $rejectedCount = AdvisorNomination::where('nomination_status', 'rejected')->count();

    //     return view('admin.pages.nominations.index', compact('nominations', 'search', 'inProgressCount', 'selectedCount', 'rejectedCount'));
    // }
    public function index()
    {
        $entriesPerPage = request('entries', 10);
        $search = request('search');
        $status = request('status');
        $dateFrom = request('date_from');
        $dateTo = request('date_to');

        $nominations = AdvisorNomination::with('evaluations');

        if ($search) {
            $nominations->where(function ($query) use ($search) {
                $query->where('nominee_id', 'LIKE', '%' . $search . '%')
                    ->orWhere('full_name', 'LIKE', '%' . $search . '%')
                    ->orWhere('email', 'LIKE', '%' . $search . '%')
                    ->orWhere('mobile_number', 'LIKE', '%' . $search . '%')
                    ->orWhere('location', 'LIKE', '%' . $search . '%')
                    ->orWhere('user_id', 'LIKE', '%' . $search . '%');
            });
        }

        if ($status) {
            $nominations->where('nomination_status', $status);
        }

        if ($dateFrom && $dateTo) {
            $nominations->whereBetween('created_at', [$dateFrom, $dateTo]);
        } elseif ($dateFrom) {
            $nominations->whereDate('created_at', '>=', $dateFrom);
        } elseif ($dateTo) {
            $nominations->whereDate('created_at', '<=', $dateTo);
        }

        // Order nominations by most recent (created_at DESC)
        $nominations->orderBy('created_at', 'DESC');

        $nominations = $nominations->paginate($entriesPerPage);
        $inProgressCount = AdvisorNomination::where('nomination_status', 'inprogress')->count();
        $selectedCount = AdvisorNomination::where('nomination_status', 'selected')->count();
        $rejectedCount = AdvisorNomination::where('nomination_status', 'rejected')->count();

        return view('admin.pages.nominations.index', compact('nominations', 'search', 'status', 'dateFrom', 'dateTo', 'inProgressCount', 'selectedCount', 'rejectedCount'));
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
     * @param  int  $nomination_id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nomination = AdvisorNomination::with(['businessFunctionCategory', 'subFunctionCategory1', 'subFunctionCategory2'])->findOrFail($id);
        $industries = $nomination->getIndustries();
        $geographies = $nomination->getGeographies();

        return view('admin.pages.nominations.show', compact('nomination', 'industries', 'geographies'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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

    public function showEvaluationForm($id)
    {
        $nomination = AdvisorNomination::findOrFail($id);

        return view('admin.pages.nominations.evaluate', compact('nomination'));
    }


    // public function evaluateNomination(Request $request, $id)
    // {
    //     $nomination = AdvisorNomination::findOrFail($id);
    //     $evaluation = AdvisorEvaluation::create([
    //         'advisor_nomination_id' => $nomination->nominee_id,
    //         'experience_score' => $request->input('experience_score'),
    //         'expertise_score' => $request->input('expertise_score'),
    //         'linkedin_score' => $request->input('linkedin_score'),
    //         'availability_score' => $request->input('availability_score'),
    //         'industry_recognition_score' => $request->input('industry_recognition_score'),
    //         'recommendations_score' => $request->input('recommendations_score'),
    //         'content_leadership_score' => $request->input('content_leadership_score'),
    //         'connections_score' => $request->input('connections_score'),
    //     ]);

    //     // Calculate the overall score
    //     $overall_score = (
    //         $evaluation->experience_score * 0.15 +
    //         $evaluation->expertise_score * 0.20 +
    //         $evaluation->linkedin_score * 0.10 +
    //         $evaluation->availability_score * 0.15 +
    //         $evaluation->industry_recognition_score * 0.15 +
    //         $evaluation->recommendations_score * 0.15 +
    //         $evaluation->content_leadership_score * 0.05 +
    //         $evaluation->connections_score * 0.05
    //     );

    //     // Assign the overall score to the evaluation model
    //     $evaluation->overall_score = $overall_score;

    //     // Update the status of the related AdvisorNomination
    //     if ($overall_score >= 3) {
    //         $nomination->nomination_status = 'selected';
    //     } else {
    //         $nomination->nomination_status = 'rejected';
    //     }
    //     $nomination->save();

    //     $message = ($nomination->nomination_status == 'selected')
    //         ? 'Nomination for ' . $nomination->full_name . ' is now selected.'
    //         : 'Nomination for ' . $nomination->full_name . ' is rejected.';

    //     $messageType = ($nomination->nomination_status == 'selected') ? 'success' : 'error';

    //     return redirect()->route('advisatoradmin.nominations.list')
    //         ->with($messageType, $message)
    //         ->with('nomination_full_name', $nomination->full_name)
    //         ->with('nomination_status', $nomination->nomination_status);
    // }
    public function evaluateNomination(Request $request, $id)
    {
        $nomination = AdvisorNomination::findOrFail($id);
        // dd($nomination);

        // Check if an evaluation already exists for this nomination
        $existingEvaluation = AdvisorEvaluation::where('advisor_nomination_id', $nomination->nominee_id)->first();

        if ($existingEvaluation && $nomination->nomination_status === 'selected') {
            // If evaluation exists and status is selected, show warning message
            $message = 'Evaluation has already been done for ' . $nomination->full_name . ' and status is selected.';

            return redirect()->back()
                ->with('warning', $message)
                ->with('nomination_full_name', $nomination->full_name)
                ->with('nomination_status', $nomination->nomination_status);
        }

        // Calculate the overall score
        $overall_score = (
            $request->input('experience_score') * 0.15 +
            $request->input('expertise_score') * 0.20 +
            $request->input('linkedin_score') * 0.10 +
            $request->input('availability_score') * 0.15 +
            $request->input('industry_recognition_score') * 0.15 +
            $request->input('recommendations_score') * 0.15 +
            $request->input('content_leadership_score') * 0.05 +
            $request->input('connections_score') * 0.05
        );

        if ($existingEvaluation && $nomination->nomination_status === 'rejected') {
            // If evaluation exists and status is rejected, update the existing evaluation
            $existingEvaluation->update([
                'experience_score' => $request->input('experience_score'),
                'expertise_score' => $request->input('expertise_score'),
                'linkedin_score' => $request->input('linkedin_score'),
                'availability_score' => $request->input('availability_score'),
                'industry_recognition_score' => $request->input('industry_recognition_score'),
                'recommendations_score' => $request->input('recommendations_score'),
                'content_leadership_score' => $request->input('content_leadership_score'),
                'connections_score' => $request->input('connections_score'),
                'overall_score' => $overall_score,
            ]);
        } else {
            // Create a new evaluation record if it doesn't exist or status is selected
            $evaluation = AdvisorEvaluation::create([
                'advisor_nomination_id' => $nomination->nominee_id,
                'experience_score' => $request->input('experience_score'),
                'expertise_score' => $request->input('expertise_score'),
                'linkedin_score' => $request->input('linkedin_score'),
                'availability_score' => $request->input('availability_score'),
                'industry_recognition_score' => $request->input('industry_recognition_score'),
                'recommendations_score' => $request->input('recommendations_score'),
                'content_leadership_score' => $request->input('content_leadership_score'),
                'connections_score' => $request->input('connections_score'),
                'overall_score' => $overall_score,
            ]);
        }

        // Update the status of the related AdvisorNomination
        if ($overall_score >= 3) {
            $nomination->nomination_status = 'selected';
            $advisor = AdvisorProfiles::create([
                'advisor_id' => $nomination->nominee_id,
                'user_id' => $nomination->user_id,
                'full_name' => $nomination->full_name,
                'email' => $nomination->email,
                'mobile_number' => $nomination->mobile_number,
                'location' => $nomination->location,
                'linkedin_profile' => $nomination->linkedin_profile,
                'business_function_category_id' => $nomination->business_function_category_id,
                'sub_function_category_id_1' => $nomination->sub_function_category_id_1,
                'sub_function_category_id_2' => $nomination->sub_function_category_id_2,
                'industry_ids' => $nomination->industry_ids,
                'geography_ids' => $nomination->geography_ids,
                'advisor_qualification' => $nomination->nominee_qualification,
                'advisor_experience' => $nomination->nominee_experience,
                'discovery_call_price_per_minute' => $nomination->discovery_call_price_per_minute,
                'discovery_call_price_per_hour' => $nomination->discovery_call_price_per_hour,
                'conference_call_price_per_minute' => $nomination->conference_call_price_per_minute,
                'conference_call_price_per_hour' => $nomination->conference_call_price_per_hour,
                'chat_price_per_minute' => $nomination->chat_price_per_minute,
                'chat_price_per_hour' => $nomination->chat_price_per_hour,
                'nomination_status' => $nomination->nomination_status,
            ]);

            // Send the email
            Mail::to($advisor->email)->send(new AdvisorSelected($advisor));

        } else {
            $nomination->nomination_status = 'rejected';
            // Send the email for rejection
            Mail::to($nomination->email)->send(new AdvisorRejected($nomination));
        }
        $nomination->save();

        $message = ($nomination->nomination_status == 'selected')
            ? 'Nomination for ' . $nomination->full_name . ' is now selected.'
            : 'Nomination for ' . $nomination->full_name . ' is rejected.';

        $messageType = ($nomination->nomination_status == 'selected') ? 'success' : 'error';

        return redirect()->route('advisatoradmin.nominations.list')
            ->with($messageType, $message)
            ->with('nomination_full_name', $nomination->full_name)
            ->with('nomination_status', $nomination->nomination_status);
    }

}
