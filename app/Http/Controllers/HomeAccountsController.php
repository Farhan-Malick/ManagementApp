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
        $clients = Client::all();
        $transactions = Transaction::with('client')->get();
        $expenses = Expense::with('transaction')->get();
        return view('HomeAccounts.HomeAccountInDetail', compact('clients', 'transactions', 'expenses'));
       
    }
    public function HomeAccounts()
    {
        $clients = Client::all();
        $transactions = Transaction::with('client')->get();
        $expenses = Expense::with('transaction')->get();

        return view('HomeAccounts.HomeAccounts', compact('clients', 'transactions', 'expenses'));
    }
}
