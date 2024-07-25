<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
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
    Route::get('/hasil-analisa-lab', 'analisa')->name('hasil-analisa-lab');
    Route::get('/add-report-analisa/rapid/{id}', 'analisaReportRapid')->name('add-report-analisa-rapid');
    Route::get('/add-report-analisa/astm/{id}', 'analisaReportAstm')->name('add-report-analisa-astm');
    Route::post('/create-report/rapid{id}', 'inputReportRapid')->name('input-report-rapid');
    Route::post('/create-report/astm{id}', 'inputReportAstm')->name('input-report-astm');
    Route::get('/report-success/{id}/page={page}', 'successCreateReport')->name('success-report');
    Route::get('/preview/report-rapid/pdf/{id}/page={page}', 'printPreviewRapid')->name('print-preview-rapid');
    Route::get('/preview/report-astm/pdf/{id}/page={page}', 'printPreviewAstm')->name('print-preview-astm');
});

Route::controller(StaffController::class)->group(function () {
    Route::get('/dashboard-stafflab', 'dashboard')->name('dashboard-lab');
    Route::get('/data-hasil-analisa', 'analisa')->name('data-hasil-analisa');
    Route::get('/add-data-anallisa-astm', 'addDataAnalisaAstm')->name('add-data-analisa-astm');
    Route::get('/add-data-anallisa-rapid', 'addDataAnalisaRapid')->name('add-data-analisa-rapid');
    Route::post('/tambah-analisa-rapid', 'inputAnalisaRapid')->name('input-analisa-rapid');
    Route::post('/tambah-analisa-astm', 'inputAnalisaAstm')->name('input-analisa-astm');
    Route::get('/edit-data-analisa-rapid{id}', 'editAnalisaRapid')->name('edit-rapid-analisa');
    Route::get('/edit-data-analisa-astm{id}', 'editAnalisaAstm')->name('edit-astm-analisa');
    Route::patch('/update-rapid{id}', 'updateRapid')->name('update-rapid');
    Route::patch('/update-astm{id}', 'updateAstm')->name('update-astm');
    Route::get('/delete-analisa/{id}', 'deleteAnalisa')->name('delete-analisa');
});

Route::get('/data-report-of-analysis', [Controller::class, 'dataReport'])->name('data-report');