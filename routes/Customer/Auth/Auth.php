<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\Auth\AuthController;
use App\Http\Controllers\Customer\DashboardController;


Route::middleware(['customernotauth'])->group(function () {
    Route::get('/register', [AuthController::class, 'register'])->name('customer.register');
    Route::post('/register/submit', [AuthController::class, 'registerSubmit'])->name('customer.register.Submit');
    Route::get('/login', [AuthController::class, 'login'])->name('customer.login');
    Route::post('/login/submit', [AuthController::class, 'loginSubmit'])->name('customer.login.Submit');
});

Route::get('/logout', [AuthController::class, 'customerLogout'])->name('customer.logout');






