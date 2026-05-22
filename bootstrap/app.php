<?php

use Illuminate\Database\QueryException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Symfony\Component\HttpFoundation\Response;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->render(function (Throwable $exception, $request) {
            if ($exception instanceof QueryException && str_contains($exception->getMessage(), 'no such table')) {
                $table = null;

                if (preg_match('/no such table: ([A-Za-z0-9_]+)/', $exception->getMessage(), $matches)) {
                    $table = $matches[1];
                }

                return response()->view('errors.missing-table', [
                    'table' => $table,
                ], Response::HTTP_SERVICE_UNAVAILABLE);
            }

            return null;
        });
    })->create();
