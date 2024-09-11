<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest', 'web'])->group(function () {
    Route::get('/forget-password-otp/{type}', [AuthController::class, 'forgetOtp'])->name('forget.password.otp');
    Route::post('/forget-password-otp-submit', [AuthController::class, 'forgetOtpSubmit'])->name('forget.password.otp.submit');
    Route::get('/update-password/{type}', [AuthController::class, 'updatePassword'])->name('update.password');
    Route::post('/update-password/submit', [AuthController::class, 'updatePasswordSubmit'])->name('update.password.submit');
});
