<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/test', function () {
    return response()->json(['message' => 'API works']);
});
//Route::prefix("v1")->group(function(){
    Route::post('/login', [AuthController::class, 'login']);
//});
Route::middleware('auth:sanctum')->group(function(){
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/hotels');
    Route::post('/hotels');
    Route::post('/rooms');
    Route::get('/search');
});
