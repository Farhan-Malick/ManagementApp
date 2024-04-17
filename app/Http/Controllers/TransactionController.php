<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function index()
    {
        // Fetch transactions from the database
        $transactions = Transaction::with('client')->get(); // Assuming you have a relationship defined between Transaction and Client models

        // Pass transactions data to the view
        return view('transactions.index', compact('transactions'));
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'amount' => 'required|numeric|min:0',
            'date' => 'required|date',
        ]);
        
        // Create the transaction
        Transaction::create([
            'client_id' => $request->client_id,
            'amount' => $request->amount,
            'date' => $request->date,
        ]);

        return redirect()->back()->with('Transactionsuccess', 'Transaction created successfully.');
    }
}
