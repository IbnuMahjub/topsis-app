<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataKaryawanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TopsisController;
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
//     return view('login', [
//         'title' => 'Login'
//     ]);
// });

Route::get('/', [LoginController::class, 'index'])->name('login');

Route::post('/update-theme', [HomeController::class, 'setTheme'])->name('theme.update');

// Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::post('/logout', [LoginController::class, 'logout']);

// Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
// Route::get('/topsis', [TopsisController::class, 'index']);
// Route::get('/karyawan', [DataKaryawanController::class, 'karyawan']);
// Route::get('/data_karyawan', [DataKaryawanController::class, 'data_karywan']);
// Route::get('/karyawan/{id}/edit/', [DataKaryawanController::class, 'editKaryawan']);
// Route::post('/karyawan', [DataKaryawanController::class, 'karyawan_store'])->name('karyawan.store');
// Route::put('/karyawan/{id}', [DataKaryawanController::class, 'karyawan_update'])->name('karyawan.update');
// Route::delete('/karyawan/{id}', [DataKaryawanController::class, 'karyawan_delete'])->name('karyawan.delete');


// Route::get('/kriteria', [DataKaryawanController::class, 'kriteria']);
// Route::get('/data_kriteria', [DataKaryawanController::class, 'getKriteria']);
// Route::get('/kriteria/{id}/edit/', [DataKaryawanController::class, 'editKriteria']);
// Route::post('/kriteria', [DataKaryawanController::class, 'kriteria_store'])->name('kriteria.store');
// Route::put('/kriteria/{id}', [DataKaryawanController::class, 'kriteria_update'])->name('kriteria.update');
// Route::delete('/kriteria/{id}', [DataKaryawanController::class, 'kriteria_delete'])->name('kriteria.delete');


Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/topsis', [TopsisController::class, 'index']);
    Route::get('/karyawan', [DataKaryawanController::class, 'karyawan']);
    Route::get('/data_karyawan', [DataKaryawanController::class, 'data_karywan']);
    Route::get('/karyawan/{id}/edit/', [DataKaryawanController::class, 'editKaryawan']);
    Route::post('/karyawan', [DataKaryawanController::class, 'karyawan_store'])->name('karyawan.store');
    Route::put('/karyawan/{id}', [DataKaryawanController::class, 'karyawan_update'])->name('karyawan.update');
    Route::delete('/karyawan/{id}', [DataKaryawanController::class, 'karyawan_delete'])->name('karyawan.delete');


    Route::get('/kriteria', [DataKaryawanController::class, 'kriteria']);
    Route::get('/data_kriteria', [DataKaryawanController::class, 'getKriteria']);
    Route::get('/kriteria/{id}/edit/', [DataKaryawanController::class, 'editKriteria']);
    Route::post('/kriteria', [DataKaryawanController::class, 'kriteria_store'])->name('kriteria.store');
    Route::put('/kriteria/{id}', [DataKaryawanController::class, 'kriteria_update'])->name('kriteria.update');
    Route::delete('/kriteria/{id}', [DataKaryawanController::class, 'kriteria_delete'])->name('kriteria.delete');
});
