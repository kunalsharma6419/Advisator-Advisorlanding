<?php

namespace App\Http\Controllers\Advisor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdvisorProfiles;
use App\Models\UserProfiles;
use App\Models\AppointmentBooking;
use App\Models\AdvisorNomination;
use Illuminate\Support\Facades\Auth;
use App\Models\CallReview;
use App\Models\WalletTransaction;
use Illuminate\Support\Facades\Session;
use App\Models\user;
use Mail;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use App\Models\EmailVerification;
use Illuminate\Support\Facades\Schema;
use App\Models\WalletWithdrawal;

use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $advisor = AdvisorProfiles::with('bankDetails', 'businessFunctionCategory')->where('user_id', Auth::user()->unique_id)->firstOrFail();
        $completionPercentage = $advisor->calculateCompletionPercentage();

        // Update the profile completion percentage column in the database
        $advisor->profile_completion_percentage = $completionPercentage;
        $advisor->save();
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


        $callReviews = CallReview::where('advisor_id', $advisor->advisor_id)
            ->orderBy('overall_experience', 'desc') // Order by overall experience for top reviews
            ->get(['user_id', 'advisor_id', 'overall_experience', 'reliability', 'affordability', 'relevance_to_problem']);

        // Calculate the averages
        $averageOverallExperience = $callReviews->avg('overall_experience');
        $averageReliability = $callReviews->avg('reliability');
        $averageAffordability = $callReviews->avg('affordability');
        $averageRelevanceToProblem = $callReviews->avg('relevance_to_problem');

        return view('advisor.pages.dashboard', compact(
            'advisor',

            'completionPercentage',
            'averageOverallExperience',
            'averageReliability',
            'averageAffordability',
            'averageRelevanceToProblem',
            'callReviews',
            'completionPercentage',
            'feedbackData',
            'upcomingBookings',
            'earningsData',
            'advisoryHoursData',
            'clientsData'
        ));
    }


    public function reviewssummary(Request $request)
    {
        $advisor = AdvisorProfiles::with('bankDetails', 'businessFunctionCategory')
            ->where('user_id', Auth::user()->unique_id)
            ->firstOrFail();

        // Initialize feedback query with advisor ID filter
        $feedbackQuery = CallReview::where('advisor_id', $advisor->advisor_id)
            ->orderBy('overall_experience', 'desc')
            ->select(['user_id', 'advisor_id', 'overall_experience', 'reliability', 'affordability', 'relevance_to_problem', 'created_at', 'review']);

        // Apply time-based filtering if a filter is selected
        if ($request->has('filter')) {
            switch ($request->input('filter')) {
                case '1_month':
                    $feedbackQuery->where('created_at', '>=', now()->subMonth());
                    break;
                case '6_months':
                    $feedbackQuery->where('created_at', '>=', now()->subMonths(6));
                    break;
                case '1_year':
                    $feedbackQuery->where('created_at', '>=', now()->subYear());
                    break;
            }
        }

        // Paginate feedback data
        $feedbackData = $feedbackQuery->paginate(10); // Adjust items per page as necessary

        return view('advisor.pages.reviewssummary', compact('advisor', 'feedbackData'));
    }

    public function mybookings(Request $request)
    {
        // Fetch the advisor nomination profile based on the authenticated user ID
        $advisor = AdvisorNomination::where('user_id', Auth::user()->unique_id)->firstOrFail();
    
        // Fetch the search term from the request
        $searchTerm = $request->input('search', '');
    
        // Build the query for bookings linked to this advisor's nominee_id
        $query = AppointmentBooking::with('userProfile') // Assuming 'userProfile' is the relationship to the client
            ->where('advisor_id', $advisor->nominee_id);
    
        // Apply search filter
        if ($searchTerm) {
            $query->where(function ($query) use ($searchTerm) {
                $query->where('booking_date', 'LIKE', '%' . $searchTerm . '%')
                      ->orWhereHas('userProfile', function ($q) use ($searchTerm) {
                          $q->where('full_name', 'LIKE', '%' . $searchTerm . '%') // Assuming 'name' is a column in the UserProfile model
                            ->orWhere('email', 'LIKE', '%' . $searchTerm . '%'); // Adjust fields as necessary
                      });
            });
        }
    
        // Get results
        $bookings = $query->orderBy('booking_date', 'asc')->get();
    
        // Return the view with the bookings and advisor profile
        return view('advisor.pages.mybookings', compact('advisor', 'bookings', 'searchTerm'));
    }
    

    public function updateBookingStatus(Request $request, $id)
    {
        // Retrieve the advisor based on the authenticated user
        $advisor = AdvisorNomination::where('user_id', auth()->user()->unique_id)->first();
    
        if (!$advisor) {
            return redirect()->back()->with('error', 'Advisor profile not found.');
        }
    
        // Retrieve the appointment booking by booking_id and advisor_id
        $booking = AppointmentBooking::where('booking_id', $id)
            ->where('advisor_id', $advisor->nominee_id)
            ->first();
    
        if (!$booking) {
            return redirect()->back()->with('error', 'Booking not found or unauthorized.');
        }
    
        if ($request->has('accept')) {
            // Mark the booking as upcoming and add the booking amount to the advisor’s wallet
            $booking->booking_status = 'Upcoming';
    
            // Add booking amount to advisor's wallet
            $advisorUser = User::where('unique_id', $advisor->user_id)->first();
    
            if ($advisorUser) {
                $advisorUser->advisor_wallet_balance += $booking->booking_amount;
                $advisorUser->save();
                $advisorUpdatedBalance = number_format($advisorUser->advisor_wallet_balance, 2);
            } else {
                return redirect()->back()->with('error', 'Advisor not found or unable to add the booking amount.');
            }
        } elseif ($request->has('reject')) {
            if ($booking->booking_status === 'Pending') {
                $booking->booking_status = 'Rejected';
    
                // Directly add the refund amount back to the user's wallet
                $transaction = WalletTransaction::where('user_id', $booking->user_id)
                    ->where('status', 'Booking 10% Deducted')
                    ->where('method', 'booking fees')
                    ->orderBy('created_at', 'desc')
                    ->first();
    
                if ($transaction && $transaction->amount > 0) {
                    $user = User::where('unique_id', $booking->user_id)->first();
    
                    if ($user) {
                        $user->user_wallet_balance += $transaction->amount;
                        $user->save();
    
                        // Record the refund transaction
                        WalletTransaction::create([
                            'user_id' => $user->unique_id,
                            'date' => now()->toDateString(),
                            'time' => now()->toTimeString(),
                            'status' => 'Booking 10% Refunded',
                            'method' => 'booking refund',
                            'amount' => $transaction->amount,
                            'total_wallet_balance' => $user->user_wallet_balance,
                        ]);
                    } else {
                        return redirect()->back()->with('error', 'User not found.');
                    }
                }
            } elseif ($booking->booking_status === 'Upcoming') {
                $booking->booking_status = 'Rejected';
    
                // Deduct the refund amount from the advisor’s wallet and add it back to the user's wallet
                $transaction = WalletTransaction::where('user_id', $booking->user_id)
                    ->where('status', 'Booking 10% Deducted')
                    ->where('method', 'booking fees')
                    ->orderBy('created_at', 'desc')
                    ->first();
    
                if ($transaction && $transaction->amount > 0) {
                    $user = User::where('unique_id', $booking->user_id)->first();
    
                    if ($user) {
                        $user->user_wallet_balance += $transaction->amount;
                        $user->save();
    
                        WalletTransaction::create([
                            'user_id' => $user->unique_id,
                            'date' => now()->toDateString(),
                            'time' => now()->toTimeString(),
                            'status' => 'Booking 10% Refunded',
                            'method' => 'booking refund',
                            'amount' => $transaction->amount,
                            'total_wallet_balance' => $user->user_wallet_balance,
                        ]);
    
                        $advisorUser = User::where('unique_id', $advisor->user_id)->first();
    
                        if ($advisorUser && $advisorUser->advisor_wallet_balance >= $transaction->amount) {
                            $advisorUser->advisor_wallet_balance -= $transaction->amount;
                            $advisorUser->save();
    
                            WalletTransaction::create([
                                'user_id' => $advisorUser->unique_id,
                                'date' => now()->toDateString(),
                                'time' => now()->toTimeString(),
                                'status' => 'Booking 10% Refunded',
                                'method' => 'booking refund',
                                'amount' => $transaction->amount,
                                'total_wallet_balance' => $advisorUser->advisor_wallet_balance,
                            ]);
    
                            $advisorUpdatedBalance = number_format($advisorUser->advisor_wallet_balance, 2);
                        } else {
                            return redirect()->back()->with('error', 'Insufficient balance in advisor’s wallet for refund deduction.');
                        }
                    } else {
                        return redirect()->back()->with('error', 'User not found.');
                    }
                }
            }
        }
    
        $booking->save();
    
        return redirect()->back()->with('success', 'Booking status updated successfully.' . (isset($advisorUpdatedBalance) ? ' Advisor wallet balance: ' . $advisorUpdatedBalance : ''));
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
        $withdrawalRequests = WalletWithdrawal::where('advisor_profile_id', $advisor->advisor_id)->get();
        return view('advisor.pages.myearnings', compact('advisor', 'earningsData', 'withdrawalRequests'));
    }

    public function requestWithdrawal(Request $request)
    {
        $request->validate([
            'withdraw_amount' => 'required|numeric|min:100|max:' . Auth::user()->advisor_wallet_balance,
            'bank_account_number' => 'required|string',
            'bank_ifsc' => 'required|string',
        ]);

        $advisorProfile = AdvisorProfiles::where('user_id', Auth::user()->unique_id)->first();

        WalletWithdrawal::create([
            'advisor_profile_id' => $advisorProfile->advisor_id,
            'withdraw_amount' => $request->withdraw_amount,
            'bank_account_number' => $request->bank_account_number,
            'bank_ifsc' => $request->bank_ifsc,
        ]);

        // Deduct the wallet balance
        $user = Auth::user();
        $user->advisor_wallet_balance -= $request->withdraw_amount;
        $user->save();

        return redirect()->back()->with('success', 'Withdrawal request submitted successfully. Once Advisator Team approves your request your withdrawal amount will be credited to your bank');
    }


    
    public function sendDeleteAccountOtp(Request $request)
{
    $user = Auth::user();

    // Generate and save OTP
    $otp = random_int(100000, 999999);
    $time = time();
    $otpData = EmailVerification::updateOrCreate(
        ['email' => $user->email],
        ['otp' => $otp, 'created_at' => $time]
    );

    $data['email'] = $user->email;
    $data['title'] = 'Email Verification';
    $data['body'] = 'Your OTP is: ' . $otp;

    try {
        // Send OTP email
        Mail::send('auth.mailVerification', ['data' => $data], function ($message) use ($data) {
            $message->to($data['email'])->subject($data['title']);
        });

        // Flash success message to session
        session()->flash('success', 'OTP has been sent to your email.');
    } catch (\Exception $e) {
        Log::error("Failed to send OTP email: " . $e->getMessage());

        // Flash error message to session
        session()->flash('error', 'Failed to send OTP. Try again.');
    }

    // You can redirect back to the previous page or any other page
    return back();
}

public function resendDeleteAccountOtp(Request $request)
{
    $user = Auth::user();

    // Generate a new OTP
    $otp = random_int(100000, 999999);
    $time = time();
    $otpData = EmailVerification::updateOrCreate(
        ['email' => $user->email],
        ['otp' => $otp, 'created_at' => $time]
    );

    $data['email'] = $user->email;
    $data['title'] = 'Resend OTP for Account Deletion';
    $data['body'] = 'Your OTP is: ' . $otp;

    try {
        // Send OTP email
        Mail::send('auth.mailVerification', ['data' => $data], function ($message) use ($data) {
            $message->to($data['email'])->subject($data['title']);
        });

        return response()->json(['success' => true, 'msg' => 'OTP has been resent to your email.']);
    } catch (\Exception $e) {
        Log::error("Failed to resend OTP email: " . $e->getMessage());
        return response()->json(['success' => false, 'msg' => 'Failed to resend OTP. Try again.']);
    }
}

public function verifyDeleteAccountOtp(Request $request)
{
    $User = Auth::user();

    $otpData = EmailVerification::where('email', $User->email)
        ->where('otp', $request->otp)
        ->first();

    // Check if OTP is valid and not expired (within 2 minutes)
    if ($otpData && Carbon::parse($otpData->created_at)->addMinutes(2)->isFuture()) {
        try {
            // Soft delete the advisor profile (if it exists) using unique_id
            DB::transaction(function () use ($User) {
                // Find the advisor profile using unique_id
                $advisorProfile = AdvisorProfiles::where('user_id', $User->unique_id)->first();
                if ($advisorProfile) {
                    // Delete the advisor profile if it exists
                    $advisorProfile->delete();
                }
            });

            // Logout user and clear session
            Auth::guard('web')->logout();
            Session::flush();

            return response()->json(['success' => true, 'msg' => 'Your advisor profile has been deleted.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => 'Failed to delete advisor profile. Please try again.']);
        }
    } else {
        return response()->json(['success' => false, 'msg' => 'Invalid or expired OTP.']);
    }
}






}
