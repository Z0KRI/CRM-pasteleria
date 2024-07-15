<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmploymentController;
use App\Http\Controllers\StoreController;

@include('auth.routes.php');
@include('common.routes.php');

Route::apiResource('employees', EmployeeController::class);
Route::apiResource('employments', EmploymentController::class);
Route::apiResource('stores', StoreController::class);