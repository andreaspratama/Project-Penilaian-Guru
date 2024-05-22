<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\UnitController;
use App\Http\Controllers\Admin\TahunajaranController;
use App\Http\Controllers\Admin\GuruController;
use App\Http\Controllers\Admin\PenilaiController;
use App\Http\Controllers\Admin\IndikatornilaiController;
use App\Http\Controllers\Admin\KepribadianController;
use App\Http\Controllers\Penilaian\NilaiController;
use App\Http\Controllers\Penilaian\NilaikepribadianController;

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
//     return view('welcome');
// });

// LOGIN
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('prosLogin', [LoginController::class, 'prosLogin'])->name('prosLogin');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'auth'], function(){
    Route::prefix('dp3guru')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    
        // UNIT
        Route::get('deleteUnit/{id}', [UnitController::class, 'delete'])->name('delete');
        Route::resource('unit', UnitController::class);
    
        // TA
        Route::get('deleteTahunajaran/{id}', [TahunajaranController::class, 'delete'])->name('delete');
        Route::resource('tahunajaran', TahunajaranController::class);
    
        // GURU
        Route::get('deleteGuru/{id}', [GuruController::class, 'delete'])->name('delete');
        Route::resource('guru', GuruController::class);
    
        // PENILAI
        Route::get('deletePenilai/{id}', [PenilaiController::class, 'delete'])->name('delete');
        Route::resource('penilai', PenilaiController::class);
    
        // INDIKATORNILAI
        Route::get('deleteIndikator/{id}', [IndikatornilaiController::class, 'delete'])->name('delete');
        Route::resource('indikatornilai', IndikatornilaiController::class);
    
        // INDIKATOR NILAI
        // KEPRIBADIAN
        Route::get('deleteKepribadian/{id}', [KepribadianController::class, 'delete'])->name('delete');
        Route::resource('kepribadian', KepribadianController::class);
    
        // NILAI
        Route::get('ambilGuru', [NilaiController::class, 'ambilGuru'])->name('ambilGuru'); 
        Route::get('nilai', [NilaiController::class, 'index'])->name('nilai');
        Route::get('nilaiGuru', [NilaiController::class, 'nilaiGuru'])->name('nilaiGuru');
        Route::get('nilaiGr/{id}', [NilaiController::class, 'nilaiGr'])->name('nilaiGr');
        Route::get('prosNilaiGr/{idguru}/{idindikator}', [NilaiController::class, 'prosNilaiGr'])->name('prosNilaiGr');
        Route::post('guru/{idguru}/tambahNilai', [NilaiController::class, 'tambahNilai'])->name('tambahNilai');
        Route::get('prosEditNilaiGr/{idguru}/{idindikator}', [NilaiController::class, 'prosEditNilaiGr'])->name('prosEditNilaiGr');
        Route::post('guru/{idguru}/editNilai', [NilaiController::class, 'editNilai'])->name('editNilai');
        // NILAI KEPRIBADIAN
        // Route::get('nilaiKepribadian', [NilaikepribadianController::class, 'index'])->name('nilaiKepribadian');
        // Route::get('editNilai/{id}', [NilaikepribadianController::class, 'editNilai'])->name('editNilai');
        // Route::get('buatNilai', [NilaikepribadianController::class, 'buatNilai'])->name('buatNilai');
    });
});
