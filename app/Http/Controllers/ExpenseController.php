<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Transaction;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'transaction_id' => 'required|exists:transactions,id',
            'amount' => 'required|numeric|min:0',
            'description' => 'required|string',
            'date' => 'required|date',
        ]);
        
        // Check if the sum of existing expenses is already equal to the transaction amount
        $transaction = Transaction::findOrFail($request->transaction_id);
        $totalExpenses = $transaction->expenses->sum('amount');
        $remainingAmount = $transaction->amount - $totalExpenses;
    
        if ($request->amount > $remainingAmount) {
            return redirect()->back()->with('error', 'Expense amount exceeds remaining transaction amount.');
        }
        
        // Create the expense
        Expense::create([
            'transaction_id' => $request->transaction_id,
            'amount' => $request->amount,
            'description' => $request->description,
            'date' => $request->date,
        ]);
        
        return redirect()->back()->with('success', 'Expense created successfully.');
    }

}
