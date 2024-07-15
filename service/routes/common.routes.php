<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CityController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ZipCodeController;


Route::apiResource('stores', StoreController::class);

Route::apiResource('states', StateController::class)->except('update');
Route::apiResource('cities', CityController::class)->except('update');
Route::apiResource('zip-codes', ZipCodeController::class)->except('update');
