<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductionOrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderProductController;
use App\Http\Controllers\ProductionStationController;
use App\Http\Controllers\ProductionShiftController;
use App\Http\Controllers\ProductionLineController;
use App\Http\Controllers\ZipcodeController;
use App\Http\Controllers\SuburbController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'auth:api'], function() {
    Route::apiResource("customers", CustomerController::class);
    Route::apiResource("addresses", AddressController::class);
    Route::apiResource("productionorders", ProductionOrderController::class);
    Route::apiResource("productionstations", ProductionStationController::class);
    Route::apiResource("productionlines", ProductionLineController::class);
    Route::apiResource("productionshifts", ProductionShiftController::class);
    Route::apiResource("ordersproducts", OrderProductController::class);
    Route::apiResource("products", ProductController::class);
    Route::apiResource("users", UserController::class);
    Route::apiResource("catalogs/states", StateController::class);
    Route::apiResource("catalogs/cities", CityController::class);
    Route::apiResource("catalogs/zipcodes", ZipcodeController::class);
    Route::apiResource("catalogs/suburbs", SuburbController::class);
});

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [AuthController::class, 'login']);

    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('logout', [AuthController::class, 'logout']);
    });
});
