<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Account;

class AccountSeeder extends Seeder
{
    public function run(): void
    {
        Account::create([
            'name' => 'Syed',
            'accountType' => 'Cash',
            'balance' => 0
        ]);

        Account::create([
            'name' => 'Rafid',
            'accountType' => 'Bank',
            'balance' => 0
        ]);
    }
}
