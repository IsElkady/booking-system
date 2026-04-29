<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [AuthController::class, 'showLogin'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::get('/search', [SearchController::class, 'show']);
    Route::post('/search', [SearchController::class, 'search']);

    Route::post('/hotels',[HotelController::class,'store'])->name('web.hotels.store');
    Route::get('/hotels',[HotelController::class,'index'])->name('web.hotels.index');

    Route::get('/rooms',[RoomController::class,'index'])->name('web.rooms.index');
    Route::post('/rooms',[RoomController::class,'store'])->name('web.rooms.store');
});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware('auth');
