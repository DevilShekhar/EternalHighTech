<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\Frontend\HomeFrontController;

Route::get('/', [HomeFrontController::class, 'index'])->name('home');

Auth::routes();
    // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('blogs', BlogController::class);
    Route::resource('users', UserController::class);
    Route::resource('testimonial', TestimonialController::class);
});

