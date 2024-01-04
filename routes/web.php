<?php

use App\Http\Controllers\ArsipController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InformasiOrmawaController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\OrmawaController;
use App\Http\Controllers\PendaftarController;
use App\Http\Controllers\PesanController;
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
Route::get('/postingan', [LandingPageController::class, 'postingan'])->name('landing_page.postingan-ormawa');
Route::get('/ormawa', [LandingPageController::class, 'ormawa'])->name('landing_page.ormawa');
Route::get('/pengurus/pengurus-periode', [LandingPageController::class, 'pengurus'])->name('landing_page.pengurus');
Route::get('/kontak', [LandingPageController::class, 'kontak'])->name('landing_page.kontak');
Route::get('/postingan/read-postingan/{id}', [LandingPageController::class, 'read_postingan'])->name('landing_page.read_postingan');
Route::get('/home/pencarian/postingan', [LandingPageController::class, 'cari'])->name('landing_page.postingan.cari');
Route::get('/pengurus/daftar-pengurus', [LandingPageController::class, 'daftar_pengurus'])->name('landing_page.daftar_pengurus');
Route::get('/pengurus/daftar-pengurus/cari', [LandingPageController::class, 'cari_pengurus'])->name('landing_page.cari_pengurus');
Route::get('/ormawa/{id}/open-recruitment', [LandingPageController::class, 'open_recruitment'])->name('landing_page.open-recruitment');
Route::get('/ormawa/{id}/pendaftaran', [LandingPageController::class, 'pendaftaran'])->name('landing_page.pendaftaran');
Route::get('/detail-ormawa/{slug}', [LandingPageController::class, 'detail_ormawa'])->name('landing_page.detail_ormawa');
Route::post('/kontak/store', [LandingPageController::class, 'message'])->name('landing_page.message');

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
    Route::get('/dashboard/pendaftar/{id}/download', [PendaftarController::class, 'download'])->name('pendaftar.download');
    Route::put('/dashboard/pendaftar/{id}/status-change', [PendaftarController::class, 'status'])->name('pendaftar.status');

    // Postingan
    Route::get('/dashboard/postingan', [PostinganController::class, 'index'])->name('postingan.index');
    Route::get('/dashboard/postingan/create', [PostinganController::class, 'create'])->name('postingan.create');
    Route::get('/dashboard/postingan/cari', [PostinganController::class, 'cari'])->name('postingan.cari');
    Route::post('/dashboard/postingan/store', [PostinganController::class, 'store'])->name('postingan.store');
    Route::get('/dashboard/postingan/{id}/edit', [PostinganController::class, 'edit'])->name('postingan.edit');
    Route::put('/dashboard/postingan/{id}/update', [PostinganController::class, 'update'])->name('postingan.update');
    Route::delete('/dashboard/postingan/{id}/delete', [PostinganController::class, 'destroy'])->name('postingan.delete');
    Route::get('/dashboard/postingan/{id}/detail', [PostinganController::class, 'show'])->name('postingan.detail');
    Route::post('/dashboard/postingan/remove-image', [PostinganController::class, 'removeImage'])->name('postingan.remove-image');

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

    // Pesan
    Route::get('/dashboard/pesan', [PesanController::class, 'index'])->name('pesan.index');
    Route::get('/dashboard/pesan/cari', [PesanController::class, 'cari'])->name('pesan.cari');
    Route::delete('/dashboard/pesan/{id}/delete', [PesanController::class, 'destroy'])->name('pesan.delete');
    Route::get('/dashboard/pesan/{id}/read', [PesanController::class, 'read'])->name('pesan.read');
    Route::get('/dashboard/pesan/{id}/detail', [PesanController::class, 'show'])->name('pesan.detail');

    // Kegiatan
    Route::post('/dashboard/kegiatan/store', [KegiatanController::class, 'store'])->name('kegiatan.store');
    Route::get('/dashboard/kegiatan/{id}/edit', [KegiatanController::class, 'edit'])->name('kegiatan.edit');
    Route::put('/dashboard/kegiatan/{id}/update', [KegiatanController::class, 'update'])->name('kegiatan.update');
    Route::delete('/dashboard/kegiatan/{id}/delete', [KegiatanController::class, 'destroy'])->name('kegiatan.delete');
    Route::get('/dashboard/kegiatan/{id}/detail', [KegiatanController::class, 'detail'])->name('kegiatan.detail');

    // Arsip
    Route::post('/dashboard/arsip/store', [ArsipController::class, 'store'])->name('arsip.store');
    Route::get('/dashboard/arsip/{id}/edit', [ArsipController::class, 'edit'])->name('arsip.edit');
    Route::put('/dashboard/arsip/{id}/update', [ArsipController::class, 'update'])->name('arsip.update');
    Route::delete('/dashboard/arsip/{id}/delete', [ArsipController::class, 'destroy'])->name('arsip.delete');
    Route::get('/dashboard/arsip/{id}/detail', [ArsipController::class, 'show'])->name('arsip.detail');
});


Route::middleware(['auth', 'role:super admin'])->group(function() {
    // User
    Route::get('/dashboard/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/dashboard/user/cari', [UserController::class, 'cari'])->name('user.cari');
    Route::post('/dashboard/user/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/dashboard/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/dashboard/user/{id}/update', [UserController::class, 'update'])->name('user.update');
    Route::delete('/dashboard/user/{id}/delete', [UserController::class, 'destroy'])->name('user.delete');
    Route::get('/dashboard/user/{id}/detail', [UserController::class, 'show'])->name('user.detail');

    // Ormawa
    Route::get('/dashboard/ormawa', [OrmawaController::class, 'index'])->name('ormawa.index');
    Route::get('/dashboard/ormawa/cari', [OrmawaController::class, 'cari'])->name('ormawa.cari');
    Route::post('/dashboard/ormawa/store', [OrmawaController::class, 'store'])->name('ormawa.store');
    Route::get('/dashboard/ormawa/{id}/edit', [OrmawaController::class, 'edit'])->name('ormawa.edit');
    Route::put('/dashboard/ormawa/{id}/update', [OrmawaController::class, 'update'])->name('ormawa.update');
    Route::delete('/dashboard/ormawa/{id}/delete', [OrmawaController::class, 'destroy'])->name('ormawa.delete');
    Route::get('/dashboard/ormawa/{id}/detail', [OrmawaController::class, 'show'])->name('ormawa.detail');

    // Informasi Ormawa
    Route::get('/dashboard/informasi-ormawa/{id}/show', [InformasiOrmawaController::class, 'show'])->name('informasi-ormawa.show');
    Route::put('/dashboard/informasi-ormawa/{id}/update', [InformasiOrmawaController::class, 'update'])->name('informasi-ormawa.update');

    // Status Laporan
    Route::get('/dashboard/status-laporan/{id}/edit', [StatusLaporanController::class, 'edit'])->name('status_laporan.edit');
    Route::put('/dashboard/status-laporan/{id`}/update', [StatusLaporanController::class, 'update'])->name('status_laporan.update');
    Route::put('/dashboard/status-laporan/{id}/update-catatan', [StatusLaporanController::class, 'updateCatatan'])->name('status_laporan.update-catatan');
    Route::put('/dashboard/status-laporan/{id}/update-sk', [StatusLaporanController::class, 'updateSK'])->name('status_laporan.update-sk');
    Route::put('/dashboard/status-laporan/{id}/update-status', [StatusLaporanController::class, 'updateStatus'])->name('status_laporan.update-status');
    Route::get('/dashboard/status-laporan', [StatusLaporanController::class, 'index'])->name('status_laporan.index');
    Route::get('/dashboard/status-laporan/cari', [StatusLaporanController::class, 'cari'])->name('status_laporan.cari');
    Route::get('/dashboard/status-laporan/{id}/download', [StatusLaporanController::class, 'download'])->name('status_laporan.download');

    // Kegiatan
    Route::get('/dashboard/kegiatan', [KegiatanController::class, 'index'])->name('kegiatan.index');
    Route::get('/dashboard/kegiatan/cari-ormawa', [KegiatanController::class, 'cariOrmawa'])->name('kegiatan.cari-ormawa');

    // Kegiatan
    Route::get('/dashboard/ormawa/{id}/kegiatan', [KegiatanController::class, 'kegiatan'])->name('kegiatan.ormawa.kegiatan');
    Route::get('/dashboard/kegiatan/cari-kegiatan', [KegiatanController::class, 'cariKegiatan'])->name('kegiatan.cari-kegiatan');

    // Arsip
    Route::get('/dashboard/arsip', [ArsipController::class, 'index'])->name('arsip.index');
    Route::get('/dashboard/arsip/create', [ArsipController::class, 'create'])->name('arsip.create');
    Route::get('/dashboard/arsip/cari', [ArsipController::class, 'cari'])->name('arsip.cari');

});

Route::middleware(['auth', 'role:super admin,admin'])->group(function() {
    // Kegiatan
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/ormawa/{id}/kegiatan', [KegiatanController::class, 'kegiatan'])->name('kegiatan.ormawa.kegiatan');
    Route::get('/dashboard/kegiatan/cari-kegiatan', [KegiatanController::class, 'cariKegiatan'])->name('kegiatan.cari-kegiatan');

    // Arsip
    Route::get('/dashboard/arsip', [ArsipController::class, 'index'])->name('arsip.index');
    Route::get('/dashboard/arsip/create', [ArsipController::class, 'create'])->name('arsip.create');
    Route::get('/dashboard/arsip/cari', [ArsipController::class, 'cari'])->name('arsip.cari');
    Route::get('/dashboard/arsip/{id}/download', [ArsipController::class, 'download'])->name('arsip.download');

    // Status laporan

    Route::get('/dashboard/status-laporan/{id}/detail', [StatusLaporanController::class, 'show'])->name('status_laporan.detail');
});


