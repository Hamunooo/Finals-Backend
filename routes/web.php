<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
