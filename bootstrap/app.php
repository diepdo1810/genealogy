<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Console\Commands\SitemapGenerateCommand;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->trustProxies(at: '*');
        $middleware->web(append : [
            App\Http\Middleware\Localization::class,
            App\Http\Middleware\LogAllRequests::class,
        ]);

        // $middleware->alias([]);
    })
    ->withCommands([
        SitemapGenerateCommand::class,
    ])
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
