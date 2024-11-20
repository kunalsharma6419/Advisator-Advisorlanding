<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\WalletTransaction;

class TransactionController extends Controller
{
    public function transactionhistory(Request $request)
    {
        // Get the authenticated user's ID
        $userId = Auth::user()->unique_id; // Alternatively, use auth()->user()->id;

        // Get the search term and filter from the request
        $searchTerm = $request->input('search', '');
        $dateFilter = $request->input('date_filter', 'all');

        // Build the query for transactions for the authenticated user
        $query = WalletTransaction::where('user_id', $userId); // Filter by user_id

        // Apply search filter
        if ($searchTerm) {
            $query->where(function ($query) use ($searchTerm) {
                $query->where('status', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('method', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('amount', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('created_at', 'LIKE', '%' . $searchTerm . '%'); // Adjust fields as necessary
            });
        }

        // Apply date filter
        if ($dateFilter != 'all') {
            $dateLimit = now()->subMonths($dateFilter);
            $query->where('created_at', '>=', $dateLimit);
        }

        // Get paginated results
        $transactions = $query->paginate(10); // Adjust the number of items per page as necessary

        return view('user.pages.transactionhistory', compact('transactions', 'searchTerm', 'dateFilter'));
    }
}
