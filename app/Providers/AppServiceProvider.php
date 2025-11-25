<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

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
//     if (app()->environment('local')) {
//         // Force HTTP in local development (fixes white screen)
//         URL::forceScheme('http');
//     } else {
//         // Force HTTPS in staging/production
//         URL::forceScheme('https');
//     }
}
}
