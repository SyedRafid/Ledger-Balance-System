<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LedgerController;
use App\Http\Controllers\AccountController;


Route::post('/ledger/transaction', [LedgerController::class, 'store']);
Route::get('/ledger/report/{account_id}', [LedgerController::class, 'report']);

Route::prefix('accounts')->group(function () {
    Route::post('/', [AccountController::class, 'store']);      // Create
    Route::get('/', [AccountController::class, 'index']);       // List all
    Route::get('/{id}', [AccountController::class, 'show']);    // Show single
    Route::put('/{id}', [AccountController::class, 'update']);  // Update
    Route::delete('/{id}', [AccountController::class, 'destroy']); // Delete
});

?>