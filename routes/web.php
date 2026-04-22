<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServiceCategoryController;

use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\Frontend\HomeFrontController;
use App\Http\Controllers\Frontend\LeadController;


use App\Http\Controllers\LeadsController;
use App\Http\Controllers\AuthController;

Route::get('/', [HomeFrontController::class, 'index'])->name('home');
Route::get('lead/eternal', [LeadController::class, 'create'])->name('lead.form');
Route::post('lead/eternal', [LeadController::class, 'store'])->name('lead.store');
Auth::routes();
Route::get('/forgot-password', [AuthController::class, 'forgotForm'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');

Route::get('/verify-otp', [AuthController::class, 'showOtpForm'])->name('otp.form');
Route::post('/verify-otp', [AuthController::class, 'verifyOtp'])->name('otp.verify');

Route::get('/reset-password', [AuthController::class, 'showResetForm'])->name('password.reset.form');
Route::post('/update-password', [AuthController::class, 'updatePassword'])->name('password.update.custom');

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('blogs', BlogController::class);
    Route::resource('users', UserController::class);
    Route::resource('portfolios', PortfolioController::class);
    Route::resource('career', CareerController::class);
    Route::resource('service-category', ServiceCategoryController::class);

    Route::resource('leads', LeadsController::class);    
    Route::get('/check-lead', [LeadController::class, 'checkLead']);
    Route::post('/accept-lead/{id}', [LeadController::class, 'acceptLead']);
    Route::post('/skip-lead/{id}', [LeadController::class, 'skipLead']);


    Route::resource('testimonial', TestimonialController::class); 
    });

