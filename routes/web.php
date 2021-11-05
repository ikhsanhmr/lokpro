<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::view('/', 'frontend.template.frontend')->name('frontend');

Route::group(['middleware' => 'auth'], function(){
    Route::middleware('role:jobseeker')->group(function(){
        Route::view('jobseeker/dashboard', 'backend.backend')->name('jobseeker.dashboard');
    });
    Route::middleware('role:company')->group(function () {
        Route::get('/company/dashboard', [BackendController::class, 'index']);
    });
    Route::middleware('role:company')->group(function () {
        Route::get('/company/profile', [BackendController::class, 'profile']);
    });
});

Auth::routes();
