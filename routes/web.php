<?php

use App\Http\Controllers\GajiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('pages.auth.auth-login');
});

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);

// Menggunakan route grup dengan middleware 'auth' untuk halaman yang membutuhkan autentikasi
Route::middleware(['auth'])->group(function () {
    // Halaman Home setelah login
    Route::get('home', function () {
        return view('pages.dashboard', ['type_menu' => 'home']);
    })->name('home');
    // Rute logout
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    // Resource controller untuk 'users'
    Route::resource('users', UserController::class);
    Route::resource('gaji', GajiController::class);
});
