<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EmployeeController;

@include('auth.routes.php');

Route::apiResource('employees', EmployeeController::class);
