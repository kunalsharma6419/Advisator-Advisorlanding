<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\EmailVerification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Mail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use App\Models\AdvisorNomination;

class AuthController extends Controller
{
    public function loadRegister()
    {
        return view('auth.register');
    }

    // public function studentRegister(Request $request)
    // {
    //     $request->validate([
    //         'full_name' => 'string|required|min:2',
    //         'email' => 'string|email|required|max:100|unique:users',
    //         // 'phone_number' => [
    //         //     'required',
    //         //     function ($attribute, $value, $fail) {
    //         //         if (strlen($value) !== 10) {
    //         //             $fail('The phone number must be 10 digits.');
    //         //         }
    //         //         if (!preg_match('/^\d+$/', $value)) { // Ensures only digits
    //         //             $fail('The phone number must only contain digits.');
    //         //         }
    //         //         if (User::where('phone_number', $value)->exists()) { // Assuming User model
    //         //             $fail('The phone number has already been taken.');
    //         //         }
    //         //     },
    //         // ],
    //         'phone_number' => [
    //             'required',
    //             function ($attribute, $value, $fail) {
    //                 // Regular expression to match country code followed by phone number
    //                 if (!preg_match('/^\+\d{1,3}\d{10}$/', $value)) {
    //                     $fail('The phone number must be in the format +[country code][10 digit number].');
    //                     return;
    //                 }

    //                 // Extract the actual phone number without the country code for uniqueness check
    //                 $phoneNumberWithoutCountryCode = substr($value, -10);

    //                 // Ensure the phone number part is exactly 10 digits
    //                 if (strlen($phoneNumberWithoutCountryCode) !== 10) {
    //                     $fail('The phone number part must be 10 digits.');
    //                     return;
    //                 }

    //                 // Ensure only digits in the phone number part
    //                 if (!preg_match('/^\d{10}$/', $phoneNumberWithoutCountryCode)) {
    //                     $fail('The phone number must only contain digits after the country code.');
    //                     return;
    //                 }

    //                 // Check for uniqueness, assuming User model exists
    //                 if (User::where('phone_number', $value)->exists()) {
    //                     $fail('The phone number has already been taken.');
    //                 }
    //             },
    //         ],
    //         'usertype' => 'required|integer',
    //     ]);

    //     $user = new User;
    //     $user->full_name = $request->full_name;
    //     $user->email = $request->email;
    //     $user->phone_number = $request->phone_number;
    //     $user->usertype = $request->usertype;
    //     // Generate a unique 'unique_id' with initial 4 characters and 4 random numbers
    //     $uniqueId = substr($request->full_name, 0, 4) . rand(1000, 9999);
    //     $collisionCount = 0;
    //     while (User::where('unique_id', $uniqueId)->exists()) {
    //         // If a collision occurs, generate a new random number
    //         $uniqueId = substr($request->full_name, 0, 4) . rand(1000, 9999);
    //         $collisionCount++;

    //         // Implement a safety measure to prevent infinite loop in case of extreme collision
    //         if ($collisionCount >= 10) {
    //             throw new RuntimeException('Failed to generate unique ID after multiple attempts.');
    //         }
    //     }

    //     $user->unique_id = $uniqueId;
    //     // dd($user);
    //     $user->save();

    //     // Send OTP
    //     $this->sendOtp($user);

    //     return redirect("/verification/".$user->id);
    // }
    public function studentRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'full_name' => 'string|required|min:2',
            'email' => [
                'string',
                'email',
                'required',
                'max:100',
                function ($attribute, $value, $fail) {
                    $user = User::where('email', $value)->first();
                    if ($user && !$user->is_verified) {
                        throw new \Exception('exists:' . $user->id); // Throw exception with existing unverified user ID
                    } elseif ($user) {
                        $fail('The email has already been taken.');
                    }
                }
            ],
            'phone_number' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (!preg_match('/^\+\d{1,3}\d{10}$/', $value)) {
                        $fail('The phone number must be in the format +[country code][10 digit number].');
                        return;
                    }
                    $phoneNumberWithoutCountryCode = substr($value, -10);
                    if (strlen($phoneNumberWithoutCountryCode) !== 10) {
                        $fail('The phone number part must be 10 digits.');
                        return;
                    }
                    if (!preg_match('/^\d{10}$/', $phoneNumberWithoutCountryCode)) {
                        $fail('The phone number must only contain digits after the country code.');
                        return;
                    }
                    $user = User::where('phone_number', $value)->first();
                    if ($user && !$user->is_verified) {
                        throw new \Exception('exists:' . $user->id); // Throw exception with existing unverified user ID
                    } elseif ($user) {
                        $fail('The phone number has already been taken.');
                    }
                },
            ],
            'usertype' => 'required|integer',
        ]);

        try {
            if ($validator->fails()) {
                $errors = $validator->errors();
                if ($errors->has('email') || $errors->has('phone_number')) {
                    throw new \Exception($errors->first());
                }
            }

            // Attempt to create a new user
            $user = new User;
            $user->full_name = $request->full_name;
            $user->email = $request->email;
            $user->phone_number = $request->phone_number;
            $user->usertype = $request->usertype;
            $uniqueId = substr($request->full_name, 0, 4) . rand(1000, 9999);
            $collisionCount = 0;
            while (User::where('unique_id', $uniqueId)->exists()) {
                $uniqueId = substr($request->full_name, 0, 4) . rand(1000, 9999);
                $collisionCount++;
                if ($collisionCount >= 10) {
                    throw new \RuntimeException('Failed to generate unique ID after multiple attempts.');
                }
            }
            $user->unique_id = $uniqueId;
            $user->save();

            $this->sendOtp($user);

            return response()->json([
                'status' => 'success',
                'message' => 'You account has been successfully created. Proceed to verify email address.',
                'verification_url' => url('verification/' . $user->id)
            ]);
        } catch (\Exception $e) {
            if (strpos($e->getMessage(), 'exists:') === 0) {
                // Extract user ID from exception message
                $userId = substr($e->getMessage(), strlen('exists:'));

                return response()->json([
                    'status' => 'warning',
                    'message' => 'Your account has already been created. Kindly proceed to the verification step.',
                    'verification_url' => url('verification/' . $userId)
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => $e->getMessage()
                ]);
            }
        }
    }


    public function sendOtp($user)
    {
        $otp = rand(100000, 999999);
        $time = time();

        EmailVerification::updateOrCreate(
            ['email' => $user->email],
            [
                'email' => $user->email,
                'otp' => $otp,
                'created_at' => $time
            ]
        );

        $data['email'] = $user->email;
        $data['title'] = 'Email Verification';
        $data['body'] = 'Your OTP is: ' . $otp;

        Mail::send('auth.mailVerification', ['data' => $data], function($message) use ($data) {
            $message->to($data['email'])->subject($data['title']);
        });
    }

    public function verification($id)
    {
        $user = User::where('id',$id)->first();
        if(!$user || $user->is_verified == 1){
            return redirect('/');
        }
        $email = $user->email;

        $this->sendOtp($user);//OTP SEND

        return view('auth.verification', compact('email'));
    }

    public function verifiedOtp(Request $request)
    {
        $user = User::where('email',$request->email)->first();
        $otpData = EmailVerification::where('otp',$request->otp)->first();
        if(!$otpData){
            return response()->json(['success' => false,'msg'=> 'You entered wrong OTP']);
        }
        else{

            $currentTime = time();
            $time = $otpData->created_at;

            if($currentTime >= $time && $time >= $currentTime - (90+5)){//90 seconds
                User::where('id',$user->id)->update([
                    'is_verified' => 1
                ]);
                if($user->usertype == 0 || $user->usertype == 1)
                {
                    Auth::login($user);
                    return response()->json(['success' => true,'msg'=> 'Mail has been verified']);
                } elseif ($user->usertype == 2) {
                    return response()->json(['success' => true, 'msg' => 'Mail has been verified', 'redirect' => route('advisor-nominations.create', ['userId' => $user->unique_id])]);
                } else {
                    return response()->json(['success' => false, 'msg' => 'Something went wrong']);
                }
            }
            else{
                return response()->json(['success' => false,'msg'=> 'Your OTP has been Expired']);
            }

        }
    }

    public function resendOtp(Request $request)
    {
        $user = User::where('email',$request->email)->first();
        $otpData = EmailVerification::where('email',$request->email)->first();

        $currentTime = time();
        $time = $otpData->created_at;

        if($currentTime >= $time && $time >= $currentTime - (90+5)){//90 seconds
            return response()->json(['success' => false,'msg'=> 'Please try after some time']);
        }
        else{

            $this->sendOtp($user);//OTP SEND
            return response()->json(['success' => true,'msg'=> 'OTP has been sent']);
        }
    }

    public function loadDashboard()
    {
        if(Auth::user()){
            return view('dashboard');
        }
        return redirect('/');
    }

    public function loadLogin()
    {
        if (Auth::user()) {
            return redirect('/dashboard');
        }
        return view('auth.login');
    }

    public function userLogin(Request $request)
    {
        $request->validate([
            'email' => 'string|email|required|max:100',
        ]);
        $user = User::where('email', $request->email)->first();

        if ($user) {
            $this->sendOtp($user);
            return redirect("/verification-login/".$user->id);
        }

        return back()->with('error', 'Email is incorrect');
    }

    public function verificationLogin($id)
    {
        $user = User::findOrFail($id);
        return view('auth.verification-login', compact('user'));
    }

    public function verifiedLoginOtp(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        $otpData = EmailVerification::where('email', $request->email)->latest()->first();

        if(!$otpData){
            return response()->json(['success' => false,'msg'=> 'You entered wrong OTP']);
        }
        else{

            $currentTime = time();
            $time = $otpData->created_at;

            if($currentTime >= $time && $time >= $currentTime - (90+5)){//90 seconds
                User::where('id',$user->id)->update([
                    'is_verified' => 1
                ]);
                if($user->usertype == 0 || $user->usertype == 1)
                {
                    Auth::login($user);
                    return response()->json(['success' => true,'msg'=> 'Login Success, Mail has been verified']);
                } elseif ($user->usertype == 2) {
                    $nomination = AdvisorNomination::where('user_id', $user->unique_id)->first();
                    if (!$nomination) {
                        return response()->json([
                            'success' => true,
                            'msg' => 'Kindly fill the nomination form to apply for the role of advisor',
                            'redirect' => route('advisor-nominations.create', ['userId' => $user->unique_id])
                        ]);
                    } elseif ($nomination->nomination_status == 'inprogress') {
                        return response()->json([
                            'success' => true,
                            'msg' => 'The Advisator team is currently reviewing your nomination. You will be notified if you are selected',
                            'redirect' => route('home')
                        ]);
                    } else {
                        Auth::login($user);
                        return response()->json(['success' => true, 'msg' => 'Login Success, Mail has been verified']);
                    }
                } else {
                    return response()->json(['success' => false, 'msg' => 'Something went wrong']);
                }
            }
            else{
                return response()->json(['success' => false,'msg'=> 'Your OTP has been Expired']);
            }

        }
    }
}
