<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DeseasesController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

// Auth routes
Auth::routes(['register' => false]);

// Website Pages
Route::get('/', [HomeController::class,'index'])->name('home.index');

// Dashboard routes
Route::group(['prefix' => 'dashboard', 'middleware' =>'auth'], function() {
    // Dashboard Page
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Patient Routes
    // TODO Patients Crud
    Route::resource('patients', PatientController::class);
    Route::resource('deseases', DeseasesController::class);
    Route::resource('users', UsersController::class);

    // Deseases Routes
    // TODO Deseases Crud

});
Route::resource('deseases', DeseasesController::class);