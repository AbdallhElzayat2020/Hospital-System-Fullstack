<?php

use App\Http\Controllers\Dashboard\dashboardAdminController;

use Illuminate\Support\Facades\Route;

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

Route::get('dashboard/admin', [dashboardAdminController::class,'index'])->name('dashboard');





// Dashboard User

Route::get('/dashboard/user', function () {

    return view('Dashboard.User.dashboard');

})->middleware(['auth', 'verified'])->name('dashboard.user');








require __DIR__.'/auth.php';
