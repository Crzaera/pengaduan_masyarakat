<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\KelolaPengaduanController;
use App\Http\Controllers\TanggapanController;
use App\Http\Controllers\LaporanPengaduanController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\LoginController;

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
Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/register', function(){
    return view('auth.register');
});

Route::post('/register/proses', [LoginController::class, 'registrasi'])->name('proses.register');

Route::post('/login/proses', [LoginController::class, 'login'])->name('proses.login');


Route::group(['middleware' => 'auth'], function() {
    Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('dashboard');
    Route::get('/lihat-tanggapan/{id_pengaduan}', [TanggapanController::class, 'lihatTanggapan'])->name('lihat.tanggapan');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::group(['middleware' => ['auth','ceklevel:admin,petugas']], function() {
    
    Route::get('/kelola-pengaduan/notvalid', [KelolaPengaduanController::class, 'notValid'])->name('pengaduan.notvalid');
    Route::get('/kelola-pengaduan/proses-validasi/{id_pengaduan}', [KelolaPengaduanController::class, 'prosesValidasi'])->name('pengaduan.proses.validasi');

    Route::get('/detail-pengaduan/{id_pengaduan}', [PengaduanController::class, 'detailPengaduan'])->name('detail.pengaduan');

    Route::get('/kelola-pengaduan/valid', [KelolaPengaduanController::class, 'valid'])->name('pengaduan.valid');
    Route::get('/kelola-pengaduan/proses-verifikasi/{id_pengaduan}', [KelolaPengaduanController::class, 'prosesVerifikasi'])->name('pengaduan.proses.verifikasi');
    Route::get('/kelola-pengaduan/tolak/{id_pengaduan}', [KelolaPengaduanController::class, 'tolak'])->name('pengaduan.tolak');

    Route::get('/tanggapan/{id_pengaduan}', [TanggapanController::class, 'index'])->name('tanggapan');
    Route::post('/tanggapan/proses', [TanggapanController::class, 'prosesTanggapan'])->name('proses.tanggapan');

    Route::get('/kelola-pengaduan/proses', [KelolaPengaduanController::class, 'proses'])->name('pengaduan.proses');
    Route::get('/kelola-pengaduan/proses-selesai/{id_pengaduan}', [KelolaPengaduanController::class, 'prosesSelesai'])->name('pengaduan.proses.selesai');

});

Route::group(['middleware' => ['auth','ceklevel:masyarakat']], function() {
    Route::get('/pengaduan', [PengaduanController::class, 'index'])->name('pengaduan');
    Route::post('/pengaduan/tambah', [PengaduanController::class, 'tambah'])->name('tambah.pengaduan');
});

Route::group(['middleware' => ['auth','ceklevel:admin']], function() {
    Route::get('/petugas', [PetugasController::class, 'index'])->name('petugas');
    Route::get('/petugas/tambah', [PetugasController::class, 'tambah'])->name('tambah.petugas');
    Route::post('/petugas/proses-tambah', [PetugasController::class, 'prosesTambah'])->name('proses.tambah.petugas');
    Route::get('/petugas/hapus/{id}', [PetugasController::class, 'hapus'])->name('hapus.petugas');

    Route::get('/kelola-pengaduan/selesai', [KelolaPengaduanController::class, 'selesai'])->name('pengaduan.selesai');
    Route::get('/kelola-pengaduan/ditolak', [KelolaPengaduanController::class, 'ditolak'])->name('pengaduan.ditolak');

    Route::get('/laporan-pengaduan', [LaporanPengaduanController::class, 'index'])->name('laporan.pengaduan');
    Route::get('/laporan-pengaduan/filter', [LaporanPengaduanController::class, 'filter'])->name('filter.laporan.pengaduan');
    Route::get('/laporan-pengaduan/reset-filter', [LaporanPengaduanController::class, 'resetFilter'])->name('reset.filter');
    Route::get('/laporan-pengaduan/cetak-pdf', [LaporanPengaduanController::class, 'cetakPdf'])->name('cetak.laporan.pengaduan');
});