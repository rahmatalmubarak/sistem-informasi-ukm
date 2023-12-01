<?php

use App\Http\Controllers\ArsipController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\OrmawaController;
use App\Http\Controllers\PendaftarController;
use App\Http\Controllers\PostinganController;
use App\Http\Controllers\StatusLaporanController;
use App\Http\Controllers\UserController;
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

// Landing Page
Route::get('/', function() {
    return redirect()->route('landing_page');
});
Route::get('/home', [LandingPageController::class, 'index'])->name('landing_page');


// Auth
Route::get('/dashboard/login', [AuthController::class, 'index'])->name('auth.login');
Route::post('/dashboard/login/process', [AuthController::class, 'login'])->name('auth.process');
Route::get('/dashboard/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::get('/registrasi/create', [PendaftarController::class, 'create'])->name('pendaftar.create');
Route::post('/registrasi/store', [PendaftarController::class, 'store'])->name('pendaftar.store');

Route::middleware(['auth', 'role:admin'])->group(function () {
    // Pendaftar
    Route::get('/dashboard/pendaftar', [PendaftarController::class, 'index'])->name('pendaftar.index');
    Route::get('/dashboard/pendaftar/cari', [PendaftarController::class, 'cari'])->name('pendaftar.cari');
    Route::delete('/dashboard/pendaftar/{id}/delete', [PendaftarController::class, 'destroy'])->name('pendaftar.delete');
    Route::get('/dashboard/pendaftar/{id}/detail', [PendaftarController::class, 'show'])->name('pendaftar.detail');
    Route::get('/dashboard/pendaftar/{id}/edit', [PendaftarController::class, 'edit'])->name('pendaftar.edit');
    Route::put('/dashboard/pendaftar/{id}/update', [PendaftarController::class, 'update'])->name('pendaftar.update');
    Route::put('/dashboard/pendaftar/finish', [PendaftarController::class, 'finish'])->name('pendaftar.finish');

    // Laporan
    Route::get('/dashboard/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/dashboard/laporan/create', [LaporanController::class, 'create'])->name('laporan.create');
    Route::get('/dashboard/laporan/cari', [LaporanController::class, 'cari'])->name('laporan.cari');
    Route::post('/dashboard/laporan/store', [LaporanController::class, 'store'])->name('laporan.store');
    Route::get('/dashboard/laporan/{id}/edit', [LaporanController::class, 'edit'])->name('laporan.edit');
    Route::put('/dashboard/laporan/{id}/update', [LaporanController::class, 'update'])->name('laporan.update');
    Route::delete('/dashboard/laporan/{id}/delete', [LaporanController::class, 'destroy'])->name('laporan.delete');
    Route::get('/dashboard/laporan/{id}/detail', [LaporanController::class, 'show'])->name('laporan.detail');
    Route::get('/dashboard/laporan/{id}/download', [LaporanController::class, 'download'])->name('laporan.download');


    // Kegiatan
    Route::get('/dashboard/kegiatan', [KegiatanController::class, 'index'])->name('kegiatan.index');
    Route::get('/dashboard/kegiatan/create', [KegiatanController::class, 'create'])->name('kegiatan.create');
    Route::get('/dashboard/kegiatan/cari', [KegiatanController::class, 'cari'])->name('kegiatan.cari');
    Route::post('/dashboard/kegiatan/store', [KegiatanController::class, 'store'])->name('kegiatan.store');
    Route::get('/dashboard/kegiatan/{id}/edit', [KegiatanController::class, 'edit'])->name('kegiatan.edit');
    Route::put('/dashboard/kegiatan/{id}/update', [KegiatanController::class, 'update'])->name('kegiatan.update');
    Route::delete('/dashboard/kegiatan/{id}/delete', [KegiatanController::class, 'destroy'])->name('kegiatan.delete');
    Route::get('/dashboard/kegiatan/{id}/detail', [KegiatanController::class, 'show'])->name('kegiatan.detail');


    // Arsip
    Route::get('/dashboard/arsip', [ArsipController::class, 'index'])->name('arsip.index');
    Route::get('/dashboard/arsip/create', [ArsipController::class, 'create'])->name('arsip.create');
    Route::get('/dashboard/arsip/cari', [ArsipController::class, 'cari'])->name('arsip.cari');
    Route::post('/dashboard/arsip/store', [ArsipController::class, 'store'])->name('arsip.store');
    Route::get('/dashboard/arsip/{id}/edit', [ArsipController::class, 'edit'])->name('arsip.edit');
    Route::put('/dashboard/arsip/{id}/update', [ArsipController::class, 'update'])->name('arsip.update');
    Route::delete('/dashboard/arsip/{id}/delete', [ArsipController::class, 'destroy'])->name('arsip.delete');
    Route::get('/dashboard/arsip/{id}/detail', [ArsipController::class, 'show'])->name('arsip.detail');


    // Postingan
    Route::get('/dashboard/postingan', [PostinganController::class, 'index'])->name('postingan.index');
    Route::get('/dashboard/postingan/create', [PostinganController::class, 'create'])->name('postingan.create');
    Route::get('/dashboard/postingan/cari', [PostinganController::class, 'cari'])->name('postingan.cari');
    Route::post('/dashboard/postingan/store', [PostinganController::class, 'store'])->name('postingan.store');
    Route::get('/dashboard/postingan/{id}/edit', [PostinganController::class, 'edit'])->name('postingan.edit');
    Route::put('/dashboard/postingan/{id}/update', [PostinganController::class, 'update'])->name('postingan.update');
    Route::delete('/dashboard/postingan/{id}/delete', [PostinganController::class, 'destroy'])->name('postingan.delete');
    Route::get('/dashboard/postingan/{id}/detail', [PostinganController::class, 'show'])->name('postingan.detail');
});

Route::middleware(['auth', 'role:super admin'])->group(function() {

    // User
    Route::get('/dashboard/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/dashboard/user/create', [UserController::class, 'create'])->name('user.create');
    Route::get('/dashboard/user/cari', [UserController::class, 'cari'])->name('user.cari');
    Route::post('/dashboard/user/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/dashboard/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/dashboard/user/{id}/update', [UserController::class, 'update'])->name('user.update');
    Route::delete('/dashboard/user/{id}/delete', [UserController::class, 'destroy'])->name('user.delete');
    Route::get('/dashboard/user/{id}/detail', [UserController::class, 'show'])->name('user.detail');
    
    // Ormawa
    Route::get('/dashboard/ormawa', [OrmawaController::class, 'index'])->name('ormawa.index');
    Route::get('/dashboard/ormawa/create', [OrmawaController::class, 'create'])->name('ormawa.create');
    Route::get('/dashboard/ormawa/cari', [OrmawaController::class, 'cari'])->name('ormawa.cari');
    Route::post('/dashboard/ormawa/store', [OrmawaController::class, 'store'])->name('ormawa.store');
    Route::get('/dashboard/ormawa/{id}/edit', [OrmawaController::class, 'edit'])->name('ormawa.edit');
    Route::put('/dashboard/ormawa/{id}/update', [OrmawaController::class, 'update'])->name('ormawa.update');
    Route::delete('/dashboard/ormawa/{id}/delete', [OrmawaController::class, 'destroy'])->name('ormawa.delete');
    Route::get('/dashboard/ormawa/{id}/detail', [OrmawaController::class, 'show'])->name('ormawa.detail');

    // Arsip
    Route::get('/dashboard/arsip/{id}/download', [ArsipController::class, 'download'])->name('arsip.download');
});
Route::middleware(['auth', 'role:super admin'])->group(function() {

    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard');
    
    // Arsip
    Route::get('/dashboard/arsip/cari', [ArsipController::class, 'cari'])->name('arsip.cari');

    // Status Laporan
    Route::get('/dashboard/status-laporan/{id}/edit', [StatusLaporanController::class, 'edit'])->name('status_laporan.edit');
    Route::put('/dashboard/status-laporan/{id}/update', [StatusLaporanController::class, 'update'])->name('status_laporan.update');
    Route::get('/dashboard/status-laporan', [StatusLaporanController::class, 'index'])->name('status_laporan.index');
    Route::get('/dashboard/status-laporan/cari', [StatusLaporanController::class, 'cari'])->name('status_laporan.cari');
    Route::get('/dashboard/status-laporan/{id}/detail', [StatusLaporanController::class, 'show'])->name('status_laporan.detail');

});

Route::middleware(['auth', 'role:calon pendaftar'])->group(function() {
});




