<?php

use App\Http\Controllers\company\DashboardController;
use App\Http\Controllers\company\ProfilController;
use App\Http\Controllers\PostingLowonganController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\company\JobController;
use App\Http\Controllers\FrontendController;

use App\Http\Controllers\Jobseeker\{
    JobseekerDashboardController,
    JobseekerProfileController,
    MyApplicationController,
    VacanciController,
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
        // for dashboard company
        Route::get('/company/dashboard', [DashboardController::class, 'index']);

        // for profile company
        Route::get('/company/Management', [ProfilController::class, 'index']);
        Route::get('/company/profile', [ProfilController::class, 'index']);
        Route::post('/company/profile', [ProfilController::class, 'edit']);
        Route::post('/company/sosmed', [ProfilController::class, 'sosmed']);
        Route::post('/company/email', [ProfilController::class, 'email']);
        Route::post('/company/contact', [ProfilController::class, 'contact']);
        Route::post('/company/logo', [ProfilController::class, 'logo']);
        //for job company
        Route::get('/company/See_All_Job', [JobController::class, 'index']);
        Route::get('/company/Post_Job', [JobController::class, 'post']);
        Route::post('/company/Post_Job', [JobController::class, 'save_post']);
        Route::resource('/company/lowongan', PostingLowonganController::class);
    });
});

Route::group(['middleware' => 'auth'], function () {
    Route::middleware('role:jobseeker')->group(function () {
        // for lowongan jobseeker
        Route::view('jobseeker/job_vacanci', 'backend/jobseeker/job_vacanci', ['nav_tree' => '']);
        Route::get('/jobseeker/job_detail', [VacanciController::class, 'detail_job']);
        Route::post('/jobseeker/job_detail', [VacanciController::class, 'save_pelamar']);
        Route::get('/jobseeker/waiting_for_confirmate', [MyApplicationController::class, 'belum']);
        Route::get('/jobseeker/confirmed', [MyApplicationController::class, 'sudah']);
        Route::get('/jobseeker/rejected', [MyApplicationController::class, 'ditolak']);
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
