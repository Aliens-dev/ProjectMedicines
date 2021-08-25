<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DeseasesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\WilayaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

// Auth routes
Auth::routes(['register' => false]);

// Dashboard routes
Route::group(['prefix' => 'dashboard', 'middleware' =>'auth'], function() {
    // Dashboard Page
    Route::redirect('/', 'dashboard/patients')->name('dashboard');
    Route::resource('patients', PatientController::class);
    Route::post('patients/{id}/submit-injection', [PatientController::class,'submitInjection'])->name('patients.injection');
    Route::resource('deseases', DeseasesController::class);
    Route::resource('users', UsersController::class);
    Route::get('/search','App\Http\Controllers\PatientController@search')->name('patients.search');
    Route::get('/searchDesease','App\Http\Controllers\DeseasesController@search')->name('deseases.search');
    Route::get('/settings', [UsersController::class, 'settings'])->name('settings');
    Route::get('/update-password', [ChangePasswordController::class, 'index'])->name('changePassword.index');
    Route::post('/update-password', [ChangePasswordController::class, 'changePassword'])->name('changePassword.update');
    Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
});

Route::get('/wilayas', [WilayaController::class,'index']);
Route::get('/wilayas/{num}', [WilayaController::class,'cities']);
