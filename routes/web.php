<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('auth.login');
// });

Route::controller(AuthController::class)->group(function () {
    Route::get('/', 'login')->name('login');
    Route::post('/login-action', 'loginAction')->name('loginAction');
    Route::post('/logout','logout')->name('logout');
});

Route::controller(AdminController::class)->group(function () {
    Route::get('/dashboard-admin', 'dashboard')->name('dashboard-admin');
    Route::get('/data-hasil-analisa', 'analisa')->name('hasil-analisa');
});

Route::controller(StaffController::class)->group(function () {
    Route::get('/dashboard-stafflab', 'dashboard')->name('dashboard-lab');
    Route::get('/data-hasil-analisa', 'analisa')->name('data-hasil-analisa');
    Route::get('/add-data-anallisa-astm', 'addDataAnalisaAstm')->name('add-data-analisa-astm');
    Route::get('/add-data-anallisa-rapid', 'addDataAnalisaRapid')->name('add-data-analisa-rapid');
    Route::post('/tambah-analisa-rapid', 'inputAnalisaRapid')->name('input-analisa-rapid');
});