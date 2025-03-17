<?php

use Illuminate\Support\Facades\Route;
use OpenSpout\Common\Entity\Row;

Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/', [App\Http\Controllers\Dash\DashboardController::class, 'index'])->name('dashboard.index')->middleware('role:superadmin,user');
    Route::get('/profile', [App\Http\Controllers\Dash\DashboardController::class, 'profile'])->name('profile.index')->middleware('role:superadmin,user');
    Route::put('/profile', [App\Http\Controllers\Dash\DashboardController::class, 'profileUpdate'])->name('profile.update')->middleware('role:superadmin,user');
    Route::post('/profile/upload-avatar', [App\Http\Controllers\Dash\DashboardController::class, 'uploadAvatar'])->name('profile.uploadAvatar')->middleware('role:superadmin,user');
    Route::get('/password', [App\Http\Controllers\Dash\DashboardController::class, 'password'])->name('password.index')->middleware('role:superadmin,user');
    Route::put('/password', [App\Http\Controllers\Dash\DashboardController::class, 'passwordUpdate'])->name('password.update')->middleware('role:superadmin,user');

    
});