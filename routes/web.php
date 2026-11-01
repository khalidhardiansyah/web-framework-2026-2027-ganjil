<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegister'])
        ->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::middleware('auth')->group(function () {
    Route::view('/home', 'home')->name('home');
    Route::view('/about', 'about')->name('about');
    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

    // Menu & Halaman Khusus Administrator
    Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
        Route::view('/dashboard', 'admin.dashboard')->name('dashboard');
    });

    // Menu & Halaman Khusus Manager & Admin
    Route::middleware('role:admin,manager')->prefix('manager')->name('manager.')->group(function () {
        Route::view('/dashboard', 'manager.dashboard')->name('dashboard');
    });
});
