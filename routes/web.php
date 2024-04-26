<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\UnitController;
use App\Http\Controllers\Admin\TahunajaranController;
use App\Http\Controllers\Admin\GuruController;
use App\Http\Controllers\Admin\PenilaiController;
use App\Http\Controllers\Penilaian\NilaiController;

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

Route::get('/', function () {
    return view('welcome');
});

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

    // NILAI
    Route::get('ambilGuru', [NilaiController::class, 'ambilGuru'])->name('ambilGuru'); 
    Route::get('nilai', [NilaiController::class, 'index'])->name('nilai');
});
