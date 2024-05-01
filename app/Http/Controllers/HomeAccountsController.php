<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Transaction;
use App\Models\Expense;

class HomeAccountsController extends Controller
{
    public function index()
    {
        $clients = Client::orderBy('id', 'desc')->get();
        $transactions = Transaction::orderBy('id', 'desc')->with('client')->get();
        $expenses = Expense::orderBy('id', 'desc')->with('transaction')->get();
        return view('HomeAccounts.HomeAccountInDetail', compact('clients', 'transactions', 'expenses'));
    }
    // public function HomeAccounts()
    // {
    //     $clients = Client::orderBy('id', 'desc')->get();
    //     $transactions = Transaction::orderBy('id', 'desc')->with('client')->get();
    //     $expenses = Expense::orderBy('id', 'desc')->with('transaction')->get();
        
    //     return view('HomeAccounts.HomeAccounts', compact('clients', 'transactions', 'expenses'));
    // }


    public function HomeAccounts(Request $request)
{
    $clientsQuery = Client::orderBy('id', 'desc');
    $transactionsQuery = Transaction::orderBy('id', 'desc')->with('client');
    $expensesQuery = Expense::orderBy('id', 'desc')->with('transaction');

    // Search functionality
    if ($request->has('search')) {
        $searchTerm = $request->input('search');
        $clientsQuery->where('name', 'like', '%' . $searchTerm . '%');
        $transactionsQuery->whereHas('client', function ($query) use ($searchTerm) {
            $query->where('name', 'like', '%' . $searchTerm . '%');
        });
    }

    // Retrieve data from queries
    $clients = $clientsQuery->get();
    $transactions = $transactionsQuery->get();
    $expenses = $expensesQuery->get();

    return view('HomeAccounts.HomeAccounts', compact('clients', 'transactions', 'expenses'));
}

    // public function HomeAccounts(Request $request)
    // {
    //     $clientsQuery = Client::orderBy('id', 'desc');
    //     $transactionsQuery = Transaction::orderBy('id', 'desc')->with('client');
    //     $expensesQuery = Expense::orderBy('id', 'desc')->with('transaction');
    
    //     // Search functionality
    //     if ($request->has('search')) {
    //         $searchTerm = $request->input('search');
    //         $clientsQuery->where('name', 'like', '%' . $searchTerm . '%');
    //         $transactionsQuery->whereHas('client', function ($query) use ($searchTerm) {
    //             $query->where('name', 'like', '%' . $searchTerm . '%');
    //         });
    //     }
    
    //     // Filter by date if a date is provided
    //     if ($request->has('date')) {
    //         $date = $request->input('date');
    //         $transactionsQuery->whereDate('date', $date);
    //         $expensesQuery->whereDate('date', $date);
    //     }
    
    //     // Paginate the results
    //     $clients = $clientsQuery;
    //     $transactions = $transactionsQuery;
    //     $expenses = $expensesQuery;
    
    //     return view('HomeAccounts.HomeAccounts', compact('clients', 'transactions', 'expenses'));
    // }
    

    
}
