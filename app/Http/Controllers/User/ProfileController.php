<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\UserProfiles;
use App\Models\BusinessFunctionCategory;
use App\Models\SubFunctionCategory;
use App\Models\IndustryVertical;
use App\Models\User;
use App\Models\UserRegistration;
use App\Models\CustomerSupportTicket;
use App\Mail\TicketSubmitted;
use Illuminate\Support\Facades\Mail;

class ProfileController extends Controller
{
    public function myprofile()
    {
        $userprofile = UserRegistration::where('user_id', Auth::user()->unique_id)->firstOrFail();
        $industries = IndustryVertical::all();

        return view('user.pages.myprofile', [
            'user' => Auth::user(),
            'userprofile' => $userprofile,
            'industries' => $industries,
        ]);
    }

    public function profileupdate(Request $request)
    {
        $user = Auth::user();
        $userregistration = UserRegistration::where('user_id', $user->unique_id)->firstOrFail();
        $userprofile = UserProfiles::firstOrNew(['user_id' => $user->unique_id]);

        // Validate incoming request data
        $request->validate([
            'photo' => 'nullable|image|max:2048', // Adjust max file size as needed
            'full_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'mobile_number' => 'required|string|max:20',
            'location' => 'nullable|string|max:255',
            'industries.*' => 'nullable|exists:industry_verticals,id',
            'about' => 'nullable|string',
            'is_founder' => 'nullable|boolean',
        ]);

        // Handle photo upload
        if ($request->hasFile('photo')) {
            if ($userprofile->profile_photo_path) {
                Storage::delete($userprofile->profile_photo_path);
            }
            $photoPath = $request->file('photo')->store('profile-photos', 'public');
            $userregistration->profile_photo_path = $photoPath;
            $userprofile->profile_photo_path = $photoPath;
            $user->profile_photo_path = $photoPath;
            $user->save();
        }

        // Update UserRegistration data
        $userregistration->full_name = $request->input('full_name');
        $userregistration->email = $request->input('email');
        $userregistration->mobile_number = $request->input('mobile_number');
        $userregistration->location = $request->input('location');
        $userregistration->about = $request->input('about');
        $userregistration->is_founder = $request->input('is_founder');

        // Update user profile data
        $userprofile->full_name = $request->input('full_name');
        $userprofile->email = $request->input('email');
        $userprofile->mobile_number = $request->input('mobile_number');
        $userprofile->location = $request->input('location');
        $userprofile->about = $request->input('about');
        $userprofile->is_founder = $request->input('is_founder');

        // Sync industries in UserRegistration
        if ($request->has('industries')) {
            $userregistration->industry_ids = $request->input('industries');
        } else {
            $userregistration->industry_ids = [];
        }

        // Sync industries in User Profile
        if ($request->has('industries')) {
            $userprofile->industry_ids = $request->input('industries');
        } else {
            $userprofile->industry_ids = [];
        }

        // Convert JSON strings to arrays if needed
        $userregistration->industry_ids = json_decode($request->input('industries', '[]'));
        $userprofile->industry_ids = json_decode($request->input('industries', '[]'));

            // Calculate and update profile completion percentage
            $profileCompletionPercentage = $userprofile->calculateCompletionPercentage();
            $userprofile->profile_completion_percentage = $profileCompletionPercentage;

        // Save user profile and user registrations
        $userregistration->save();
        $userprofile->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    public function ticketstore(Request $request)
    {
        $user = Auth::user();
        $userprofile = UserProfiles::where('user_id', $user->unique_id)->firstOrFail();
        $request->validate([
            'subject' => 'required|string|max:255',
            'description' => 'required|string',
            'attachment' => 'nullable|file|max:10240' // max 10MB file size
        ]);

        // Prepare ticket data
       $ticketData = [
            'user_id' => $user->unique_id,
            'subject' => $request->input('subject'),
            'description' => $request->input('description'),
        ];


        // Handle attachment upload
        if ($request->hasFile('attachment')) {
            $attachmentPath = $request->file('attachment')->store('attachments', 'public');
            // $path = $image->store('highlighted-images', 'public');
            $ticketData['attachment'] = $attachmentPath;
        }

        // Create the ticket
        CustomerSupportTicket::create($ticketData);
        // Send email notification to admin
        $admin = User::where('usertype', 1)->first();
        if ($admin) {
            Mail::to($admin->email)->send(new TicketSubmitted($ticketData));
        }

        return redirect()->back()->with('success', 'Ticket submitted successfully!');
    }

}
