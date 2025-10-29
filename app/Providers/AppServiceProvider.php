<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton('ledger', function ($app) {
            return new \App\Services\LedgerService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Load Ledger Facade alias manually 
        if (!class_exists('Ledger')) {
            class_alias(\App\Facades\Ledger::class, 'Ledger');
        }

        // Load API routes manually
        Route::prefix('api')
            ->middleware('api')
            ->group(base_path('routes/api.php'));
    }
}
