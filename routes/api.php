<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\HotelController;
use App\Http\Controllers\Api\RoomController;
use App\Http\Controllers\Api\SearchController;
use Illuminate\Support\Facades\Route;

Route::get('/test', function () {
    return response()->json(['message' => 'API works']);
});
//Route::prefix("v1")->group(function(){
    Route::post('/login', [AuthController::class, 'login']);
//});
Route::middleware('auth:sanctum')->group(function(){
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/hotels', [HotelController::class, 'index'])->name('hotels.index');
    Route::post('/hotels', [HotelController::class, 'store'])->name('hotels.store');
    Route::post('/rooms', [RoomController::class, 'store']);
    Route::get('/rooms', [RoomController::class, 'index']);
    Route::get('/search', [SearchController::class, 'index']);
});
