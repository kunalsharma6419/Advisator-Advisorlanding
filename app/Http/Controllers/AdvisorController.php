<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdvisorController extends Controller
{
    public function dashboard()
    {
        return view('advisor.pages.dashboard');
    }

    public function myprofile()
    {
        return view('advisor.pages.myprofile');
    }

    public function reviewssummary()
    {
        return view('advisor.pages.reviewssummary');
    }

    public function mybookings()
    {
        return view('advisor.pages.mybookings');
    }

    public function myearnings()
    {
        return view('advisor.pages.myearnings');
    }

    public function advisornomination()
    {
        return view('auth.advisornomination');
    }
}
