<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1','namespace' => 'App\Http\Controllers\Api'], function () {
    // Products Routes
    Route::get("get_products", [App\Http\Controllers\Api\ProductsController::class, 'get_products']);
    Route::get("get_product_by_id", [App\Http\Controllers\Api\ProductsController::class, 'get_product_by_id']);

    // Contact Routes
    Route::post("send_message", [App\Http\Controllers\Api\MessageController::class, 'send_message']);
});
