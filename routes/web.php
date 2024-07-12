<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\PimpinanController;
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

// Login
Route::get('/', [AuthController::class, 'index'])->name('index');
Route::post('/loginPost', [AuthController::class, 'loginPost'])->name('loginPost');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Register
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/registerPost', [AuthController::class, 'registerPost'])->name('registerPost');

// Dashboard routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/dataPeserta', [AdminController::class, 'dataPeserta'])->name('admin.dataPeserta');
    Route::get('/admin/downloadRekap', [AdminController::class, 'downloadRekap'])->name('admin.downloadRekap');
    Route::get('/admin/exportRekap', [AdminController::class, 'exportRekap'])->name('admin.exportRekap');
    Route::get('/admin/detailPendaftaran/{id}', [AdminController::class, 'detailPendaftaran'])->name('admin.detailPendaftaran');
    Route::get('/admin/downloadSingle/{id}', [AdminController::class, 'downloadSingle'])->name('admin.downloadSingle');
    Route::get('/admin/profileSekolah', [AdminController::class, 'profileSekolah'])->name('admin.profileSekolah');
    Route::post('/admin/addProfileSekolah', [AdminController::class, 'addProfileSekolah'])->name('admin.addProfileSekolah');
    Route::post('/admin/updateProfileSekolah', [AdminController::class, 'updateProfileSekolah'])->name('admin.updateProfileSekolah');
});

Route::middleware(['auth', 'pimpinan'])->group(function () {
    Route::get('/pimpinan/dashboard', [PimpinanController::class, 'dashboard'])->name('pimpinan.dashboard');
    Route::get('/pimpinan/dataPeserta', [PimpinanController::class, 'dataPeserta'])->name('pimpinan.dataPeserta');
    Route::get('/pimpinan/downloadRekap', [PimpinanController::class, 'downloadRekap'])->name('pimpinan.downloadRekap');
    Route::get('/pimpinan/exportRekap', [PimpinanController::class, 'exportRekap'])->name('pimpinan.exportRekap');
    Route::get('/pimpinan/detailPendaftaran/{id}', [PimpinanController::class, 'detailPendaftaran'])->name('pimpinan.detailPendaftaran');
    Route::get('/pimpinan/downloadSingle/{id}', [PimpinanController::class, 'downloadSingle'])->name('pimpinan.downloadSingle');
});

Route::middleware(['auth', 'peserta'])->group(function () {
    Route::get('/peserta/dashboard', [PesertaController::class, 'dashboard'])->name('peserta.dashboard');

    Route::get('/peserta/dataPribadi', [PesertaController::class, 'dataPribadi'])->name('peserta.dataPribadi');
    Route::post('/peserta/addDataPribadi', [PesertaController::class, 'addDataPribadi'])->name('peserta.addDataPribadi');
    Route::post('/peserta/updateDataPribadi', [PesertaController::class, 'updateDataPribadi'])->name('peserta.updateDataPribadi');
    
    Route::get('/peserta/dataPendukung', [PesertaController::class, 'dataPendukung'])->name('peserta.dataPendukung');
    Route::post('/peserta/addDataPendukung', [PesertaController::class, 'addDataPendukung'])->name('peserta.addDataPendukung');
    Route::post('/peserta/updateDataPendukung', [PesertaController::class, 'updateDataPendukung'])->name('peserta.updateDataPendukung');
    
    Route::get('/peserta/dataOrangTua', [PesertaController::class, 'dataOrangTua'])->name('peserta.dataOrangTua');
    Route::post('/peserta/addDataOrangTua', [PesertaController::class, 'addDataOrangTua'])->name('peserta.addDataOrangTua');
    Route::post('/peserta/updateDataOrangTua', [PesertaController::class, 'updateDataOrangTua'])->name('peserta.updateDataOrangTua');
});