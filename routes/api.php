<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StatusController;
use \App\Http\Controllers\DishesController;
use \App\Http\Controllers\ClientsController;
use \App\Http\Controllers\BoardsController;
use \App\Http\Controllers\OrdersController;

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

Route::group(['prefix' => 'v1'], function () {

    Route::post('/login', [AuthController::class, 'login']);

    Route::group(['middleware' => ['auth:sanctum']], function () {

        Route::post('/logout', [AuthController::class, 'logout']);

        Route::get('/status/list', [StatusController::class, 'list']);

        Route::group(['middleware' => ['role:Waiter|Administrator']], function () {
            Route::get('/clients/list', [ClientsController::class, 'list']);
            Route::apiResource('clients', \ClientsController::class);

            Route::get('/boards/list', [BoardsController::class, 'list']);
            Route::get('/dishes/list', [DishesController::class, 'list']);
        });

        Route::group(['middleware' => ['role:Administrator']], function () {
            Route::apiResource('boards', \BoardsController::class);
            Route::apiResource('dishes', \DishesController::class);
            Route::apiResource('orders', \OrdersController::class);
        });

        Route::group(['prefix' => 'waiter', 'middleware' => ['role:Waiter']], function () {
            Route::apiResource('orders', \WaiterOrdersController::class);
        });

        Route::group(['prefix' => 'cooker', 'middleware' => ['role:Cooker']], function () {
            Route::apiResource('orders', \CookerOrdersController::class);
        });
    });
});

Route::fallback(function () {
    return response()->json(['error' => 'Route not found.'], 404);
});
