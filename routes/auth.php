<?php

use App\Models\Link;
use App\Models\Audit;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\RegisterController;

Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'index'])
        ->name('login');
    Route::post('login', [LoginController::class, 'store']);
});

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisterController::class, 'create'])->name('register');
    Route::post('register', [RegisterController::class, 'store'])->name('register.store');
});

Route::middleware('guest')->group(function () {
    Route::get('forgot_password', [PasswordController::class, 'forgot_password'])->name('password.forgot');
    Route::post('forgot_password', [PasswordController::class, 'store'])->name('password.store');
    Route::get('new_password', [PasswordController::class, 'new_password'])->name('password.new');
    Route::post('new_password', [PasswordController::class, 'store_new'])->name('password.new.store');
});

Route::middleware('auth')->group(function () {
    Route::get('logout', LogoutController::class)->name('logout');
});
