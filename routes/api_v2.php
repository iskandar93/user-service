<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\V2\UserController;
use App\Http\Controllers\API\V2\AuthenticateController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:api');

Route::post('login', [AuthenticateController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::controller(UserController::class)->group(function () {
        Route::get('/user/{id}', 'show');
        Route::get('/user/recommend/playlist/{id}', 'recommendUser');
        Route::get('/user/subscription/{id}', 'subscriptionUser');
    });
});
