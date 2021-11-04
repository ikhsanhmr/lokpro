<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

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
// Route::view('/dashboard', 'backend.backend')->name('dashboard');
Route::get('some', [FrontendController::class, 'test']);

// BACKEND Marthin
Route::get('/dashboard', [BackendController::class, 'index']);
Route::get('/profile', [BackendController::class, 'profile']);
Route::get('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'register']);
Route::get('/logout', [AuthController::class, 'logout']);
