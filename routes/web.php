<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductsController;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');



Route::middleware('admin')->group(function () {
    Route::get('/admin-dashboard', function () { 
        return "Admin Only";
    });
});


Route::resource('users', UserController::class)->middleware('admin');

require __DIR__ . '/auth.php';

// Product routes - only logged in users can access
Route::middleware(['auth'])->group(function () {
    Route::resource('products', ProductsController::class);
});