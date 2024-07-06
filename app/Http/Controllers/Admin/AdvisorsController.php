<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdvisorNomination;
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
        $advisors = AdvisorNomination::query();

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
        $totaladvisors = AdvisorNomination::where('nomination_status', 'selected')->count();

        $recentlySelectedDate = Carbon::now()->subDays(7);
        $newprofiles = AdvisorNomination::where('nomination_status', 'selected')
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
        $advisor = AdvisorNomination::with(['businessFunctionCategory', 'subFunctionCategory1', 'subFunctionCategory2'])->findOrFail($id);
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
}
