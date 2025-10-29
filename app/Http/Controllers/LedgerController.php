<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ledger; 

class LedgerController extends Controller
{
    /**
     * Create a new transaction
     */
    public function store(Request $request)
    {
        // Validate input
        $data = $request->validate([
            'account_id' => 'required|integer|exists:accounts,id',
            'type'       => 'required|in:debit,credit',
            'amount'     => 'required|numeric|min:0.01',
            'note'       => 'nullable|string|max:255',
        ]);

        // Add transaction via Facade
        $transaction = \App\Facades\Ledger::addTransaction($data);

        return response()->json([
            'message'     => 'Transaction added successfully',
            'transaction' => $transaction
        ], 201);
    }

    /**
     * Get ledger report for an account
     */
    public function report($accountId)
    {
        $account = \App\Models\Account::findOrFail($accountId);

        // Calculate totals
        $totalDebit  = $account->transactions()->where('type', 'debit')->sum('amount');
        $totalCredit = $account->transactions()->where('type', 'credit')->sum('amount');

        return response()->json([
            'account'        => $account->name,
            'total_debit'    => $totalDebit,
            'total_credit'   => $totalCredit,
            'current_balance' => $account->balance,
        ]);
    }
}
