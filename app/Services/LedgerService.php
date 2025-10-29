<?php

namespace App\Services;

use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

class LedgerService
{
    /**
     * Create a transaction and update account balance
     *
     * @param array $data ['account_id' => int, 'type' => 'debit|credit', 'amount' => float, 'note' => string]
     * @return Transaction
     */
    public function addTransaction(array $data): Transaction
    {
        // transaction to ensure data integrity
        return DB::transaction(function () use ($data) {

            $account = Account::findOrFail($data['account_id']);

            // Create transaction
            $transaction = Transaction::create($data);

            // Update balance
            if ($data['type'] === 'debit') {
                $account->balance += $data['amount'];
            } elseif ($data['type'] === 'credit') {
                $account->balance -= $data['amount'];
            }

            $account->save();

            return $transaction;
        });
    }
    
}
