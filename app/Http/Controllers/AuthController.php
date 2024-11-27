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
use GuzzleHttp\Client;
use App\Models\AdvisorProfiles;
use App\Models\UserProfiles;
use Illuminate\Support\Facades\Log;
use App\Models\UserRegistration;

class AuthController extends Controller
{
    private $apiKey;
    private $appId;
    private $region;

    public function __construct()
    {
        $this->apiKey = env('COMETCHAT_API_KEY');
        $this->appId = env('COMETCHAT_APP_ID');
        $this->region = env('COMETCHAT_REGION');

        // // Debugging output
        // Log::info('CometChat API Auth Key: ' . $this->apiKey);
        // Log::info('CometChat App ID: ' . $this->appId);
        // Log::info('CometChat Region: ' . $this->region);
    }

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
                        $fail('The email has already been taken. Proceed with Login');
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

            // Call the authenticatecomet function after user creation
            $this->authenticatecomet($user);

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

                $user = User::find($userId);

                if ($user && $user->is_verified) {
                    $nomination = AdvisorNomination::where('user_id', $user->unique_id)->first();
                    if (!$nomination) {
                        return response()->json([
                            'status' => 'warning',
                            'message' => 'Fill out the nomination form to apply for the role of Advisor.',
                            'redirect' => route('advisor-nominations.create', ['userId' => $user->unique_id])
                        ]);
                    } elseif ($nomination->nomination_status == 'inprogress') {
                        return response()->json([
                            'status' => 'warning',
                            'message' => 'The Advisator team is currently reviewing your nomination. You will be notified if you are selected.',
                            'redirect' => route('home')
                        ]);
                    } elseif ($nomination->nomination_status == 'rejected') {
                        return response()->json([
                            'status' => 'warning',
                            'message' => 'The Advisator team had done reviewing your nomination. You are not selected as per our evaluation criteria.',
                            'redirect' => route('home')
                        ]);
                    } else {
                        return response()->json([
                            'status' => 'warning',
                            'message' => 'You Are Already Registered and Selected by our Advisator Team. Kindly Proceed to Login',
                            'redirect' => route('login')
                        ]);
                    }
                } else {
                    return response()->json([
                        'status' => 'warning',
                        'message' => 'Your account has already been created. Kindly proceed to the verification step.',
                        'verification_url' => url('verification/' . $userId)
                    ]);
                }
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
                if($user->usertype == 0)
                {
                    return response()->json(['success' => true, 'msg' => 'Email address has been verified', 'redirect' => route('user-registrations.create', ['userId' => $user->unique_id])]);
                } elseif ($user->usertype == 1) {
                    Auth::login($user);
                    return response()->json(['success' => true,'msg'=> 'Email address has been verified']);
                } elseif ($user->usertype == 2) {
                    return response()->json(['success' => true, 'msg' => 'Email address has been verified', 'redirect' => route('advisor-nominations.create', ['userId' => $user->unique_id])]);
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
        // Validate the incoming request for email and usertype
        $request->validate([
            'email' => 'string|email|required|max:100',
            'usertype' => 'required|integer', // Ensure that usertype is provided
        ]);

        // Fetch the user by email
        $user = User::where('email', $request->email)->first();

        // Check if user exists
        if (!$user) {
            // If user not found, redirect back with an error
            return back()->with('error', 'This email address does not exist in our system. Please try signing up');
        }

        /*
        // Match the usertype from the form with the user record
        if ($request->usertype == 0) {
            // For regular user (usertype == 0), check if the user profile exists in UserRegistration
            $userProfile = UserProfiles::where('user_id', $user->unique_id)->first();
            if (!$userProfile || $userProfile->is_deleted) {
                return back()->with('error', 'Your user profile is deactivated. Please contact administration.');
            }
        } elseif ($request->usertype == 2) {
            // For advisor (usertype == 2), check if the advisor profile exists in AdvisorProfiles
            $advisorProfile = AdvisorProfiles::where('user_id', $user->unique_id)->first();
            if (!$advisorProfile || $advisorProfile->is_deleted) {
                return back()->with('error', 'Your advisor profile is deactivated. Please contact administration.');
            }
        } else {
            // Handle other user types if needed (you could add more checks or simply return an error)
            return back()->with('error', 'Invalid user type. Please contact administration.');
        }
        */

        // Proceed with the authentication flow if the profile is valid
        $this->authenticatecomet($user);

        // Send OTP and redirect to verification page
        $this->sendOtp($user);
        return redirect("/verification-login/" . $user->id);
    }






    public function authenticatecomet(User $user)
    {
        $client = new Client();
        $url = "https://{$this->appId}.api-{$this->region}.cometchat.io/v3.0/users";

        // Construct the request body
        $body = json_encode([
            'uid' => $user->unique_id,
            'name' => $user->full_name,
            'metadata' => [
                '@private' => [
                    'email' => $user->email,
                    'contactNumber' => preg_replace('/^\+91[-\s]?/', '', $user->phone_number) // Default or passed contact number
                ]
            ]
        ]);

        try {
            // Check if user already exists
                $existingUser = $client->request('GET', "{$url}/{$user->unique_id}", [
                    'headers' => [
                        'accept' => 'application/json',
                        'apikey' => env('COMETCHAT_API_KEY')
                    ],
                ]);

            // If the user exists, return success response
            if ($existingUser->getStatusCode() == 200) {
                return response()->json([
                    'success' => true,
                    'message' => 'User already exists in CometChat.',
                    'data' => json_decode($existingUser->getBody(), true),
                ]);
            }
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            // Check if the user does not exist (404 Not Found)
            if ($e->getResponse()->getStatusCode() == 404) {
                // Proceed to create a new user if not found
                try {
                    $response = $client->request('POST', "https://{$this->appId}.api-{$this->region}.cometchat.io/v3.0/users", [
                        'body' => $body,
                        'headers' => [
                            'accept' => 'application/json',
                            'content-type' => 'application/json',
                            'apikey' => $this->apiKey,
                        ],
                    ]);

                    return response()->json([
                        'success' => true,
                        'message' => 'User created successfully in CometChat.',
                        'data' => json_decode($response->getBody(), true),
                    ]);
                } catch (RequestException $e) {
                    // Log and return error response if user creation fails
                    Log::error('CometChat API Error: ' . $e->getMessage());
                    return response()->json(['error' => 'Failed to create user in CometChat.'], 500);
                }
            } else {
                // Log and return any other API errors
                Log::error('CometChat API Error: ' . $e->getMessage());
                return response()->json(['error' => 'Failed to check user existence in CometChat.'], 500);
            }
        }
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

            // Condition for test user
            if ($request->email == 'testuser@gmail.com' && $request->otp == '333444') {
                Auth::login($user);
                return response()->json(['success' => true, 'msg' => 'Test user logged in successfully', 'usertype' => $user->usertype]);
            }
            $currentTime = time();
            $time = $otpData->created_at;

            if($currentTime >= $time && $time >= $currentTime - (90+5)){//90 seconds
                User::where('id',$user->id)->update([
                    'is_verified' => 1
                ]);
                if($user->usertype == 0 || $user->usertype == 1)
                {
                    Auth::login($user);
                    return response()->json(['success' => true, 'msg' => 'Email address has been verified', 'usertype' => $user->usertype]);
                } elseif ($user->usertype == 2) {
                    $nomination = AdvisorNomination::where('user_id', $user->unique_id)->first();
                    if (!$nomination) {
                        return response()->json([
                            'success' => true,
                            'msg' => 'Fill out the nomination form to apply for the role of Advisor.',
                            'redirect' => route('advisor-nominations.create', ['userId' => $user->unique_id])
                        ]);
                    } elseif ($nomination->nomination_status == 'inprogress') {
                        return response()->json([
                            'success' => true,
                            'msg' => 'The Advisator team is currently reviewing your nomination. You will be notified if you are selected',
                            'redirect' => route('home')
                        ]);
                    } elseif ($nomination->nomination_status == 'rejected') {
                        return response()->json([
                            'success' => true,
                            'msg' => 'The Advisator team had done reviewing your nomination. You are not selected as per our evaluation criteria.',
                            'redirect' => route('home')
                        ]);
                    } else {
                        Auth::login($user);
                        // return response()->json(['success' => true, 'msg' => 'Email address has been verified']);
                        return response()->json(['success' => true, 'msg' => 'Email address has been verified', 'redirect' => route('advisor.dashboard')]);
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

    /**
     * Toggle between Client and Advisor dashboard.
     */
    public function toggleUsertype(Request $request)
    {
        $user = Auth::user();

        // Check if the user is switching to advisor
        if ($user->usertype == 0) {
            // Check if the user has a nomination in the AdvisorNomination table
            $nomination = AdvisorNomination::where('user_id', $user->unique_id)->first();

            if ($nomination) {
                // If nomination exists, check its status
                if ($nomination->nomination_status == 'selected') {
                    // Ensure advisor profile is active
                    $advisorProfile = AdvisorProfiles::where('user_id', $user->unique_id)->first();
                    if ($advisorProfile && !$advisorProfile->is_deleted) {
                        // Switch usertype to advisor if profile is active
                        $user->usertype = 2;
                        $user->save();

                        return redirect()->route('advisor.dashboard')->with('success', 'You are now switched to the Advisor dashboard.');
                    } else {
                        // Profile is inactive or missing
                        return back()->with('error', 'Your advisor account is deactivated. Please contact administration.');
                    }
                } elseif ($nomination->nomination_status == 'inprogress') {
                    return back()->with('warning', 'Your nomination is in review.');
                } else {
                    return back()->with('error', 'Your nomination is rejected. Please reapply after 6 months.');
                }
            } else {
                // No nomination found, redirect to fill the nomination form
                return redirect()->route('advisor-nominations.create', ['userId' => $user->unique_id])
                                 ->with('info', 'Fill out the nomination form to apply for the role of Advisor.');
            }
        }

        // Check if the user is switching to client
        if ($user->usertype == 2) {
            // Check if the user profile is completed and active in the UserRegistration table
            $userProfile = UserProfiles::where('user_id', $user->unique_id)->first();

            if ($userProfile && !$userProfile->is_deleted) {
                // Switch usertype to client if profile is active
                $user->usertype = 0;
                $user->save();

                return redirect()->route('user.myprofile')->with('success', 'You are now switched to the Client dashboard.');
            } else {
                // Profile is inactive or missing
                return back()->with('error', 'Your client account is deactivated. Please contact administration.');
            }
        }

        // If no valid switch, return an error message
        return back()->with('error', 'User type switch failed due to missing or inactive profile.');
    }


}
