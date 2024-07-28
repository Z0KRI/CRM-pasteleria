<?php

use App\Helpers\PolymorphRouteValidator;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CostController;
use App\Http\Controllers\MeasurementUnitController;
use App\Http\Controllers\WarehouseController;
use Illuminate\Support\Facades\Route;

Route::apiResource('warehouses', WarehouseController::class)->except('index', 'store');

Route::get('warehouses/{model}/{modelId}', [WarehouseController::class, 'index'])
    ->where(PolymorphRouteValidator::UUID());

Route::post('warehouses/{model}/{modelId}', [WarehouseController::class, 'store'])
    ->where(PolymorphRouteValidator::UUID());

Route::apiResource('categories', CategoryController::class);
Route::apiResource('measurement_units', MeasurementUnitController::class);