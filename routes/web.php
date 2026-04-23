<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServiceCategoryController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\ReminderController;
use App\Http\Controllers\CompleteLeadController;
use App\Http\Controllers\Frontend\HomeFrontController;
use App\Http\Controllers\Frontend\LeadController;
use App\Http\Controllers\HomeBannerController;  
use App\Http\Controllers\Auth\ForgotPasswordOtpController;


use App\Http\Controllers\LeadsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;

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
  

    Route::resource('services', ServiceController::class);
    
     
    Route::resource('testimonial', TestimonialController::class);
    Route::post('/leads/{id}/followup', [LeadsController::class, 'storeFollowup'])->name('leads.followup.store'); 
    Route::get('/check-followups', [LeadsController::class, 'checkFollowups']);

    Route::get('/reminders', [ReminderController::class, 'index'])->name('reminders.list');
    Route::get('/completed', [CompleteLeadController::class, 'index'])->name('completed.list');
    Route::get('/completed/{id}', [CompleteLeadController::class, 'show'])->name('completed.show');
    Route::get('/filter-leads', [LeadsController::class, 'filterList'])->name('filter.leads');
    Route::get('/leads-inprogress', [LeadsController::class, 'inprogress'])->name('leads.inprogress');
    Route::resource('home-banner', HomeBannerController::class);
    

    Route::get('/users/{id}/profile', [UserController::class, 'show'])->name('users.profile');
 
    Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
});
});


