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
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        if(env('API_TYPE', 'jwt')) {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/jwt.php'));
        }
        if(env('API_TYPE', 'sanctum')) {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/sanctum.php'));
        }
    }
}
