<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('user.pages.dashboard');
    }

    public function myprofile()
    {
        return view('user.pages.myprofile');
    }

    public function mywallet()
    {
        return view('user.pages.mywallet');
    }

    public function mybookings()
    {
        return view('user.pages.mybookings');
    }

    public function transactionhistory()
    {
        return view('user.pages.transactionhistory');
    }
}
