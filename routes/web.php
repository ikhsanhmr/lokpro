<?php

use App\Http\Controllers\company\DashboardController;
use App\Http\Controllers\company\ProfilController;
use App\Http\Controllers\PostingLowonganController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FrontendController;

use App\Http\Controllers\Jobseeker\{
    JobseekerDashboardController,
    JobseekerProfileController,
};
//use App\Http\Controllers\PostingLowonganController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::view('/', 'frontend.template.frontend')->name('frontend');

Route::group(['middleware' => 'auth'], function () {
    Route::middleware('role:company')->group(function () {
        Route::get('/company/Management', [DashboardController::class, 'index']);
        Route::get('/company/dashboard', [DashboardController::class, 'index']);
        Route::get('/company/profile', [ProfilController::class, 'index']);
        Route::post('/company/profile', [ProfilController::class, 'edit']);
        Route::post('/company/sosmed', [ProfilController::class, 'sosmed']);
        Route::post('/company/email', [ProfilController::class, 'email']);
        Route::post('/company/contact', [ProfilController::class, 'contact']);
        Route::post('/company/logo', [ProfilController::class, 'logo']);
        Route::resource('/lowongan', PostingLowonganController::class);
    });
});

Route::group(['prefix' => 'jobseeker', 'middleware' => 'auth', 'role' => 'jobseeker'], function () {
    Route::get('/dashboard', [
        JobseekerDashboardController::class, 'index'
    ])->name('jobseeker.dashboard');

    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', [
            JobseekerProfileController::class, 'index'
        ])->name('jobseeker.profile.index');
    });
});

// BACKEND LANA
Route::middleware('auth')->group(function () {
    //    Route::resource('/lowongan', PostingLowonganController::class);
});
