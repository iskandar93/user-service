<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\AuthenticateController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:api');

Route::post('login', [AuthenticateController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::get('/user/{id}', [UserController::class, 'show']);
});
