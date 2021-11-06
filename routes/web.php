
<?php

use App\Http\Controllers\company\DashboardController;
use App\Http\Controllers\company\ProfilController;
use Illuminate\Support\Facades\Auth;
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

Route::group(['middleware' => 'auth'], function () {
    Route::middleware('role:jobseeker')->group(function () {
        Route::view('jobseeker/dashboard', 'backend.backend')->name('jobseeker.dashboard');
    });
    Route::middleware('role:company')->group(function () {
        Route::get('/company/dashboard', [DashboardController::class, 'index']);
        Route::get('/company/profile', [ProfilController::class, 'index']);
        Route::post('/company/profile', [ProfilController::class, 'edit']);
        Route::post('/company/sosmed', [ProfilController::class, 'sosmed']);
        Route::post('/company/email', [ProfilController::class, 'email']);
        Route::post('/company/contact', [ProfilController::class, 'contact']);
        Route::post('/company/logo', [ProfilController::class, 'logo']);
    });
});

Auth::routes();
