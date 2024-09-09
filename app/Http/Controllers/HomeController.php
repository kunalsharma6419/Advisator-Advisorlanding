<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Contact;

class HomeController extends Controller
{
    public function redirect()
    {
        $usertype = Auth::user()->usertype;

        if($usertype=='1')
        {
            return view('admin.pages.dashboard');
            // return redirect()->route('advisatoradmin.dashboard');
        } elseif($usertype=='2') {
            return view('advisaor.pages.dashboard');
        } else {
            return view('landing.index');
        }
    }

    public function home()
    {
        return view('landing.index');
    }

    public function consultadvisor()
    {
        return view('web.pages.consultadvisor');
    }

    public function aboutus()
    {
        return view('web.pages.aboutus');
    }

    public function blog()
    {
        return view('web.pages.blog');
    }

    public function contactus()
    {
        return view('web.pages.contactus');
    }

    public function contactstore(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Create a new Contact instance
        $contact = Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        // Optionally, you can add a success message or redirect the user with SweetAlert
        if ($contact) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function terms()
    {
        return view('landing.pages.terms');
    }

    public function privacy()
    {
        return view('landing.pages.privacy');
    }

    public function onboardpolicy()
    {
        return view('landing.pages.onboardpolicy');
    }

    public function shippingdeliverypolicy()
    {
        return view('landing.pages.shippingdeliverypolicy');
    }

    public function cancellationrefundpolicy()
    {
        return view('landing.pages.cancellationrefundpolicy');
    }
}
