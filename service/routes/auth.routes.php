<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;


Route::prefix('auth')->group(function () {
    Route::post('sign-in', [AuthController::class, 'SignIn']);
    Route::post('sign-out', [AuthController::class, 'SignOut']);
});
