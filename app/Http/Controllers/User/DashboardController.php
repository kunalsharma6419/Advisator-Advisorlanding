<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserProfiles;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\WalletRecharge;
use App\Models\AppointmentBooking;
use Illuminate\Support\Facades\Session;
use App\Models\EmailVerification;
use Illuminate\Support\Facades\Log;
use Mail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use App\Models\AdvisorNomination;
use App\Models\AdvisorEvaluation;

use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $user = UserProfiles::where('user_id', Auth::user()->unique_id)->firstOrFail();
        $completionPercentage = $user->calculateCompletionPercentage();
        
        // Update the profile completion percentage column in the database
        $user->profile_completion_percentage = $completionPercentage;
        $user->save();
        
        // Define the fields based on the migration schema
        $fields = [
            'full_name' => 'Full Name',
            'email' => 'Email',
            'mobile_number' => 'Mobile Number',
            'location' => 'Location',
            'is_founder' => 'Founder Status',
            'about' => 'Business Description',
            'industry_ids' => 'Industry',
            'profile_photo_path' => 'Profile Image'
        ];
        
        $missingFields = [];
        
        // Loop through each field and check if it's filled
        foreach ($fields as $field => $label) {
            if (empty($user->{$field})) {
                $missingFields[] = $label;
            }
        }
        
        // Fetch wallet insights for the authenticated user
        $walletRecharges = WalletRecharge::where('user_id', Auth::user()->unique_id)
            ->join('wallet_plans', 'wallet_recharges.plan_id', '=', 'wallet_plans.id')
            ->select('wallet_recharges.plan_id', 'wallet_plans.plan_name', DB::raw('SUM(wallet_recharges.amount) as total_amount'), DB::raw('COUNT(*) as total_transactions'))
            ->groupBy('wallet_recharges.plan_id', 'wallet_plans.plan_name')
            ->get();
        
        // Prepare data for the chart
        $walletchartData = [];
        foreach ($walletRecharges as $recharge) {
            $walletchartData[] = [
                'plan' => $recharge->plan_name,
                'value' => $recharge->total_amount
            ];
        }
        
        // Check if any wallet insights exist
        $hasWalletInsights = $walletRecharges->isNotEmpty();
       
        $advisoryHoursTableExists = Schema::hasTable('advisory_hours');
        if ($advisoryHoursTableExists) {
            $advisoryHoursData = AdvisoryHour::all(); // Adjust as needed
        } else {
            $advisoryHoursData = null;
        }
    
        $upcomingBookings = AppointmentBooking::where('user_id', Auth::user()->unique_id)
        ->where('booking_status', 'Pending')
        ->orderBy('booking_date', 'asc')
        ->get();
    
    // Set to null if there are no upcoming bookings
    if ($upcomingBookings->isEmpty()) {
        $upcomingBookings = null;
    }
    
        // Fetch the top 3 advisors based on overall_score, including their full name and image
        $topAdvisors = AdvisorEvaluation::orderBy('overall_score', 'desc')
            ->limit(3)
            ->join('advisor_profiles', 'advisor_profiles.advisor_id', '=', 'advisor_evaluations.advisor_nomination_id')
            ->select('advisor_profiles.full_name', 'advisor_profiles.profile_photo_path', 'advisor_evaluations.overall_score')
            ->get();
        
        // Pass the relevant data to the view
        return view('user.pages.dashboard', compact('user', 'completionPercentage', 'missingFields', 'advisoryHoursData', 'walletchartData', 'hasWalletInsights', 'upcomingBookings', 'topAdvisors'));
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
    $data['title'] = 'Verify Your Email to Complete the Account Deletion Process';
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
            // Soft delete the user profile (if it exists) using unique_id
            DB::transaction(function () use ($User) {
                // Check if the user profile exists using unique_id
                $userProfile = UserProfiles::where('user_id', $User->unique_id)->first();
                if ($userProfile) {
                    // Soft delete the user profile if it exists
                    $userProfile->delete();  // Soft delete, do not delete user account
                }
            });

            // Logout the user and clear session
            Auth::guard('web')->logout();
            Session::flush();

            return response()->json(['success' => true, 'msg' => 'Your profile has been deleted. You have been logged out.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => 'Failed to delete profile. Please try again.']);
        }
    } else {
        return response()->json(['success' => false, 'msg' => 'Invalid or expired OTP.']);
    }
}



// public function userRestore($user_id)
// {
//     // Find the user by user_id (unique_id in users table)
//     $user = User::withTrashed()->where('unique_id', $user_id)->first();

//     if ($user) {
//         $user->restore();
//         return redirect()->route('advisatoradmin.advisoraccounts.list')
//                          ->with('success', 'User restored successfully.');
//     } else {
//         return redirect()->route('advisatoradmin.advisoraccounts.list')
//                          ->with('error', 'User not found.');
//     }
// }


    
    
    
}
