<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.pages.dashboard');
    }

    public function contactqueries()
    {
        $entriesPerPage = request('entries', 10);
        $search = request('search');
        $contacts = Contact::query();

        if ($search) {
            $contacts->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', '%' . $search . '%')
                    ->orWhere('email', 'LIKE', '%' . $search . '%');
            });
        }

        $contacts = $contacts->paginate($entriesPerPage);

        return view('admin.pages.contactqueries', compact('contacts', 'search'));
    }
}
