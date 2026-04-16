<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\PortfolioController;

use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\Frontend\HomeFrontController;


Route::get('/', [HomeFrontController::class, 'index'])->name('home');

Auth::routes();
    // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('blogs', BlogController::class);
    Route::resource('users', UserController::class);

    Route::get('/portfolio-list', [PortfolioController::class, 'index'])->name('portfolios.index');
    Route::get('/portfolio-create', [PortfolioController::class, 'create'])->name('portfolios.create');
    Route::post('/portfolio-store', [PortfolioController::class, 'store'])->name('portfolios.store');     
    Route::get('/portfolio-edit/{id}', [PortfolioController::class, 'edit'])->name('portfolios.edit');
    Route::put('/portfolio-update/{id}', [PortfolioController::class, 'update'])->name('portfolios.update');
    Route::delete('/portfolio-delete/{id}', [PortfolioController::class, 'destroy'])->name('portfolios.destroy');
    });

    Route::resource('testimonial', TestimonialController::class);
});

