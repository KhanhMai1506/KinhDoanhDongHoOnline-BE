<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'NhanVienMiddle'    =>  \App\Http\Middleware\NhanVienMiddleware::class,
            'DaiLyMiddle'    =>  \App\Http\Middleware\DaiLyMiddleware::class,
            'KhachHangMiddle'    =>  \App\Http\Middleware\KhachHangMiddleware::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
