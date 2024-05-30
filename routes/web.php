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

        Route::get('prosNilaiGr/{idguru}', [NilaiController::class, 'prosNilaiGr'])->name('prosNilaiGr');

        Route::get('nilaiGrDetail/{id}', [NilaiController::class, 'nilaiGrDetail'])->name('nilaiGrDetail');

        Route::get('nilaiGrEdit/{id}', [NilaiController::class, 'nilaiGrEdit'])->name('nilaiGrEdit'); // Edit nilai per guru

        Route::post('guru/{idguru}/tambahNilai', [NilaiController::class, 'tambahNilaiKs'])->name('tambahNilai'); // Tambah nilai untuk ks

        Route::post('guru/{idguru}/editNilaiKsAdmin', [NilaiController::class, 'editNilaiKsAdmin'])->name('editNilaiKsAdmin'); // Edit nilai ks dari admin

        Route::post('guru/{idguru}/tambahNilaiWaka', [NilaiController::class, 'tambahNilaiWaka'])->name('tambahNilaiWaka'); // Tambah nilai untuk wakakur

        Route::post('guru/{idguru}/editNilaiWakaAdmin', [NilaiController::class, 'editNilaiWakaAdmin'])->name('editNilaiWakaAdmin'); // Tambah nilai wakakur dari admin

        Route::post('guru/{idguru}/tambahNilaiOs', [NilaiController::class, 'tambahNilaiSo'])->name('tambahNilaiOs'); // Tambah nilai untuk orangtua/siswa

        Route::post('guru/{idguru}/editNilaiOsAdmin', [NilaiController::class, 'editNilaiSoAdmin'])->name('editNilaiOsAdmin'); // Edit nilai orangtua/siswa dari admin

        Route::post('guru/{idguru}/tambahNilaiRk', [NilaiController::class, 'tambahNilaiRk'])->name('tambahNilaiRk'); // Tambah nilai untuk rekan kerja

        Route::post('guru/{idguru}/editNilaiRkAdmin', [NilaiController::class, 'editNilaiRkAdmin'])->name('editNilaiRkAdmin'); // Edit nilai rekan kerja dari admin

        Route::post('guru/{idguru}/tambahNilaiDs', [NilaiController::class, 'tambahNilaiDs'])->name('tambahNilaiDs'); // Tambah nilai untuk diri sendiri

        Route::post('guru/{idguru}/editNilaiDsAdmin', [NilaiController::class, 'editNilaiDsAdmin'])->name('editNilaiDsAdmin'); // Edit nilai diri sendiri dari admin
    });
});
