<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserProfiles; // Import UserProfiles model
use App\Models\user; // Import UserProfiles model

class UsersController extends Controller
{
    // Index method to display the user accounts page
    public function index()
    {
        $entriesPerPage = request('entries', 10);
        $search = request('search');

        // Fetch all users or apply necessary filters (you can add pagination or sorting as needed)
        $users = UserProfiles::withTrashed(); // Ensure trashed records are included in the results

        if ($search) {
            $users->where(function ($query) use ($search) {
                $query->where('user_id', 'LIKE', '%' . $search . '%')
                    ->orWhere('full_name', 'LIKE', '%' . $search . '%')
                    ->orWhere('email', 'LIKE', '%' . $search . '%')
                    ->orWhere('mobile_number', 'LIKE', '%' . $search . '%')
                    ->orWhere('location', 'LIKE', '%' . $search . '%');
            });
        }

        // Paginate the results
        $users = $users->paginate($entriesPerPage);

        // Calculate the total number of users
        $totalUsers = UserProfiles::count();

        // Calculate newly added profiles in the last 7 days
        $recentlyAddedDate = \Carbon\Carbon::now()->subDays(7);
        $newProfiles = UserProfiles::where('created_at', '>=', $recentlyAddedDate)->count();

        // Return the view with the users data
        return view('admin.pages.useraccounts.index', compact('users', 'search', 'totalUsers', 'newProfiles'));
    }

    
    public function userDestroy($user_id)
    {
        // Find the user by unique_id (as foreign key reference)
        $user = User::where('unique_id', $user_id)->first();
    
        if ($user) {
            // Soft delete the associated AdvisorProfile
            $UserProfiles = UserProfiles::where('user_id', $user->unique_id)->first();
    
            if ($UserProfiles) {
                $UserProfiles->delete(); // Soft delete the advisor profile
            }
    
          
    
            return redirect()->route('advisatoradmin.useraccounts.list')
                             ->with('success', 'User profile Disabled successfully.');
        } else {
            return redirect()->route('advisatoradmin.useraccounts.list')
                             ->with('error', 'User not found.');
        }
    }

    
    public function userRestore($user_id)
    {
        // Find the user by unique_id or user_id (if applicable)
        $user = User::withTrashed()->where('unique_id', $user_id)->first();
    
        if ($user) {
            // Restore the associated AdvisorProfile (searching by user_id)
            $UserProfiles = UserProfiles::withTrashed()->where('user_id', $user->unique_id)->first();
    
            if ($UserProfiles) {
                $UserProfiles->restore(); // Restore the advisor profile
            }
    
    
            return redirect()->route('advisatoradmin.useraccounts.list')
                             ->with('success', 'User profile Enable successfully.');
        } else {
            return redirect()->route('advisatoradmin.useraccounts.list')
                             ->with('error', 'User not found.');
        }
    }
    







    
}
