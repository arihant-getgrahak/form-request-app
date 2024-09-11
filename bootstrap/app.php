<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // i want here is to check custom_auth is used to view custom_auth/dashboard
        $middleware->redirectTo(
            guests: '/auth/login',
            users: '/dashboard',
        );
        $middleware->alias(
            [
                "custom_auth.users" => \App\Http\Middleware\Custom_Auth::class
            ]

        );
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
