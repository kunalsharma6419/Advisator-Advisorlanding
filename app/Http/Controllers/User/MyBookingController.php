<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AppointmentBooking;
use Illuminate\Support\Facades\Auth;

class MyBookingController extends Controller
{
    public function mybookings(Request $request)
    {
        // Retrieve the unique_id of the authenticated user
        $userUniqueId = Auth::user()->unique_id;

        // Start query with base condition to filter by authenticated user's unique ID
        $query = AppointmentBooking::where('user_id', $userUniqueId);

        // Apply search filter
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('booking_id', 'like', '%' . $request->input('search') . '%')
                ->orWhere('advisor_id', 'like', '%' . $request->input('search') . '%');
            });
        }

        // Apply date filter
        if ($request->filled('date_filter')) {
            $now = now();
            switch ($request->input('date_filter')) {
                case '1_month':
                    $query->where('booking_date', '>=', $now->subMonth());
                    break;
                case '6_months':
                    $query->where('booking_date', '>=', $now->subMonths(6));
                    break;
                case '1_year':
                    $query->where('booking_date', '>=', $now->subYear());
                    break;
            }
        }

        // Paginate the filtered bookings, 10 per page
        $bookings = $query->paginate(10);
        // Retrieve upcoming bookings for the user with pagination (5 per page)
        $upcomingBookings = AppointmentBooking::where('user_id', $userUniqueId)
            ->where('booking_status', 'Upcoming')
            ->orderBy('created_at', 'desc')
            ->paginate(5, ['*'], 'upcomingPage');

        // If no 'Upcoming' bookings are found, load 'Pending' bookings
        if ($upcomingBookings->isEmpty()) {
            $upcomingBookings = AppointmentBooking::where('user_id', $userUniqueId)
                ->where('booking_status', 'Pending')
                ->orderBy('created_at', 'desc')
                ->paginate(5, ['*'], 'upcomingPage');
        }

        // Retrieve past bookings for the user with pagination (5 per page)
        $bookingHistory = AppointmentBooking::where('user_id', $userUniqueId)
            ->whereIn('booking_status', ['Completed', 'Rejected'])
            ->orderBy('created_at', 'desc')
            ->paginate(5, ['*'], 'historyPage');

        // Pass the bookings and selected filters to the view
        return view('user.pages.mybookings', compact('bookings','upcomingBookings', 'bookingHistory'));
    }

    public function cancelAppointment($id)
    {
        // Retrieve the appointment
        $booking = AppointmentBooking::where('booking_id', $id)->first();

        // Check if the booking exists and the user is authorized to cancel it
        if ($booking && $booking->user_id === auth()->user()->unique_id) {
            // Update booking status to 'Rejected'
            $booking->booking_status = 'Rejected';
            $booking->save();

            // You can add additional code here if necessary, e.g., to log the action

            return redirect()->back()->with('success', 'Appointment cancelled successfully.');
        } else {
            return redirect()->back()->with('error', 'Unable to cancel the appointment.');
        }
    }

}
