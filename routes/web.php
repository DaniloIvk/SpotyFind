<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LocaleSwitcherController;
use App\Http\Controllers\ParkingPlaceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('welcome');

// Auth routes
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'show'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
});

Route::middleware(['auth:web'])->group(function () {
//  Logout route
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//  Locale switcher
    Route::get('locale/{locale}', LocaleSwitcherController::class)->name('locale.switch');

//  Profile routes
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

//  Users
    Route::resource('/users', UserController::class)->names('users');

//  Parking places
    Route::resource('/parking-places', ParkingPlaceController::class)->names('parking-places');
});
