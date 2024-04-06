<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\DashboardController;




Route::middleware(['customerauth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('customer.dashboard');
});




