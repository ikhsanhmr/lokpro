<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BackendController;
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
        Route::get('/company/dashboard', [BackendController::class, 'index']);
    });
    Route::middleware('role:company')->group(function () {
        Route::get('/company/profile', [BackendController::class, 'profile']);
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



// BACKEND Marthin
Route::get('/dashboard', [BackendController::class, 'index']);
Route::get('/profile', [BackendController::class, 'profile']);

// BACKEND LANA
Route::middleware('auth')->group(function(){
//    Route::resource('/lowongan', PostingLowonganController::class);
});
