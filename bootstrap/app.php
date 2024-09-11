<?php

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\BuyerMiddleware;
use App\Http\Middleware\ClientMiddleware;
use App\Http\Middleware\EmployeeMiddleware;
use App\Http\Middleware\SellerMiddleware;
use App\Http\Middleware\UserMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        using: function () {
            Route::group([], base_path("routes/web/admin/admin.php"));
            Route::group([], base_path("routes/web/frontend/frontend.php"));
        }
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'admin' => AdminMiddleware::class,
            // 'seller' => SellerMiddleware::class,
            // 'employee' => EmployeeMiddleware::class,
            // 'buyer' => BuyerMiddleware::class,
            // 'client' => ClientMiddleware::class,
            // 'user' => UserMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
