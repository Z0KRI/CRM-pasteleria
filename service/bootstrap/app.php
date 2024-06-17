<?php

use Illuminate\Http\Request;

use App\Http\Traits\ErrorHandler;

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->api(prepend: [
            \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
        ]);

        $middleware->alias([
            'permission' => \Spatie\Permission\Middleware\PermissionMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (Throwable $e, Request $request) {
            $dataValidated = ErrorHandler::validateException($e, $request);
            $response = [
                "http" => [
                    "status" => $dataValidated['code'],
                    "message" => $dataValidated['message'],
                    "method" => $request->getMethod(),
                    "success" => false
                ],
                "errors" => $dataValidated['errors'],
            ];
            return response()->json($response, $dataValidated['code']);
        });
    })->create();
