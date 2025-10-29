<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Store a newly created account.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'accountType' => 'required|in:Cash,Bank',
            'balance' => 'nullable|numeric|min:0',
        ]);

        // Step 1: Create account
        $account = Account::create([
            'name' => $validated['name'],
            'accountType' => $validated['accountType'],
            'balance' => $validated['balance'] ?? 0,
        ]);

        // Step 2: If initial balance > 0, log a debit transaction
        if (!empty($validated['balance']) && $validated['balance'] > 0) {
            \App\Models\Transaction::create([
                'account_id' => $account->id,
                'type' => 'debit',
                'amount' => $validated['balance'],
                'note' => 'Initial Deposit',
            ]);
        }

        return response()->json([
            'message' => 'Account created successfully',
            'account' => $account
        ], 201);
    }

    /**
     * Display all accounts.
     */
    public function index()
    {
        $accounts = Account::all();
        return response()->json($accounts);
    }

    /**
     * Display a specific account with its transactions.
     */
    public function show($id)
    {
        $account = Account::with('transactions')->findOrFail($id);
        return response()->json($account);
    }

    /**
     * Update an account’s name or type.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'accountType' => 'sometimes|in:Cash,Bank',
        ]);

        $account = Account::findOrFail($id);
        $account->update($validated);

        return response()->json([
            'message' => 'Account updated successfully',
            'account' => $account
        ]);
    }

    /**
     * Delete an account.
     */
    public function destroy($id)
    {
        $account = Account::findOrFail($id);
        $account->delete();

        return response()->json(['message' => 'Account deleted successfully']);
    }
}
