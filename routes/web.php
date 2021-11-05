<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BackendController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PostingLowonganController;

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
Route::middleware('auth')->group(function () {
    Route::view('/dashboard', 'backend.backend')->name('dashboard');
});

Auth::routes();
// BACKEND Marthin
Route::get('/dashboard', [BackendController::class, 'index']);
Route::get('/profile', [BackendController::class, 'profile']);

// BACKEND LANA
Route::middleware('auth')->group(function(){
    Route::resource('/lowongan', PostingLowonganController::class);
});
