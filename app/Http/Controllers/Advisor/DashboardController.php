<?php

namespace App\Http\Controllers\Advisor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdvisorProfiles;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $advisor = AdvisorProfiles::with('bankDetails')->where('user_id', Auth::user()->unique_id)->firstOrFail();
        $completionPercentage = $advisor->calculateCompletionPercentage();
        $feedbackTableExists = Schema::hasTable('feedbacks'); // Replace 'feedbacks' with your table name

        if ($feedbackTableExists) {
            // Fetch feedback data
            $feedbackData = Feedback::all(); // Adjust as needed
        } else {
            $feedbackData = null;
        }
        // Check if the 'bookings' table exists
        $bookingsTableExists = Schema::hasTable('bookings'); // Replace 'bookings' with your table name

        if ($bookingsTableExists) {
            // Fetch upcoming bookings data
            $upcomingBookings = Booking::where('date', '>', now())->orderBy('date')->get();
        } else {
            $upcomingBookings = null;
        }

        // Check if the 'earnings' table exists and fetch data
        $earningsTableExists = Schema::hasTable('earnings');
        if ($earningsTableExists) {
            $earningsData = Earning::all(); // Adjust as needed
        } else {
            $earningsData = null;
        }

        // Check if the 'advisory_hours' table exists and fetch data
        $advisoryHoursTableExists = Schema::hasTable('advisory_hours');
        if ($advisoryHoursTableExists) {
            $advisoryHoursData = AdvisoryHour::all(); // Adjust as needed
        } else {
            $advisoryHoursData = null;
        }

        // Check if the 'clients' table exists and fetch data
        $clientsTableExists = Schema::hasTable('clients');
        if ($clientsTableExists) {
            $clientsData = Client::all(); // Adjust as needed
        } else {
            $clientsData = null;
        }
        return view('advisor.pages.dashboard', compact('advisor', 'completionPercentage', 'feedbackData', 'upcomingBookings', 'earningsData', 'advisoryHoursData', 'clientsData'));
    }

    public function reviewssummary()
    {
        $advisor = AdvisorProfiles::with('bankDetails')->where('user_id', Auth::user()->unique_id)->firstOrFail();
        // Check if the 'feedback' table exists and fetch data
        $feedbackTableExists = Schema::hasTable('feedback');
        $feedbackData = $feedbackTableExists ? Feedback::all() : null;

        return view('advisor.pages.reviewssummary', compact('advisor','feedbackData'));
    }

    public function mybookings()
    {
        $advisor = AdvisorProfiles::with('bankDetails')->where('user_id', Auth::user()->unique_id)->firstOrFail();
       // Check if the 'bookings' table exists
        $bookingsTableExists = Schema::hasTable('bookings'); // Replace 'bookings' with your table name

        if ($bookingsTableExists) {
            // Fetch upcoming bookings data
            $bookings = Booking::where('date', '>', now())->orderBy('date')->get();
        } else {
            $bookings = null;
        }

        return view('advisor.pages.mybookings', compact('advisor', 'bookings'));
    }

    public function myearnings()
    {
        $advisor = AdvisorProfiles::with('bankDetails')->where('user_id', Auth::user()->unique_id)->firstOrFail();
        // Check if the 'earnings' table exists and fetch data
        $earningsTableExists = Schema::hasTable('earnings');
        if ($earningsTableExists) {
            $earningsData = Earning::all(); // Adjust as needed
        } else {
            $earningsData = null;
        }
        return view('advisor.pages.myearnings', compact('advisor', 'earningsData'));
    }

}
