<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmploymentController;

Route::apiResource('employees', EmployeeController::class);
Route::apiResource('employments', EmploymentController::class);
