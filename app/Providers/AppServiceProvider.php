<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Service\AuthInterface;
use App\Service\CustomAuth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AuthInterface::class, CustomAuth::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
