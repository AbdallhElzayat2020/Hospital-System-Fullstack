<?php

use App\Http\Controllers\Dashboard\dashboardAdminController;
use App\Http\Controllers\Dashboard\SectionController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Backend  Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Dashboard Admin

Route::get('dashboard/admin', [dashboardAdminController::class, 'index'])->name('dashboard');





Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {


        //###########################################   start  Dashboard User #########################################

        Route::get('/dashboard/user', function () {

            return view('Dashboard.User.dashboard');
        })->middleware(['auth', 'verified'])->name('dashboard.user');

        //###########################################   End  Dashboard User ###########################################

        //###########################################   start  Dashboard Admin ########################################

        Route::get('/dashboard/admin', function () {

            return view('Dashboard.Admin.dashboard');
        })->middleware(['auth:admin', 'verified'])->name('dashboard.admin');


        //###########################################   End  Dashboard Admin ##########################################

        // sesond way
        // Route::middleware('auth:admin')->group(function () {


        //     Route::resource('sections', SectionController::class);
        // });

        Route::group(['middleware' => 'auth:admin'], function () {

            Route::resource('sections', SectionController::class);
        });

        // Required Auth Routes
        require __DIR__ . '/auth.php';
    }
);
