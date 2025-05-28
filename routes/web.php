<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AbsensiSiswaController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\BkDashboardController;
use App\Http\Controllers\WakasekKurikulumController;
use App\Http\Controllers\AdminGuruController;
//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth', 'role:guru_pengajar'])->group(function () {
    Route::get('/guru/dashboard', [GuruController::class, 'index'])->name('guru.dashboard');
    Route::get('/guru/kelas/{tingkat}', [GuruController::class, 'listSubkelas'])->name('guru.kelas.sub');
    Route::get('/guru/absensi/{kelas_id}', [GuruController::class, 'absenForm'])->name('guru.absen.form');
    Route::post('/guru/absensi/{kelas_id}', [GuruController::class, 'absenSimpan'])->name('guru.absen.simpan');
    Route::get('/guru/form-bolos', [GuruController::class, 'formBolos'])->name('guru.form.bolos');
    Route::post('/guru/form-bolos', [GuruController::class, 'simpanBolos'])->name('guru.bolos.simpan');
    Route::get('/guru/get-subkelas/{kelas}', [GuruController::class, 'getSubkelas']);
    Route::get('/guru/get-siswa/{kelas_id}', [GuruController::class, 'getSiswa']);
});

Route::middleware(['auth', 'role:guru_bk'])->group(function () {
    Route::get('/bk/dashboard', [BkDashboardController::class, 'index'])->name('bk.dashboard');
    Route::get('/bk/kelas', [AbsensiSiswaController::class, 'kelasList'])->name('bk.kelas');
    Route::get('/bk/kelas/{kelas}/sub', [AbsensiSiswaController::class, 'listSubKelas'])->name('bk.kelas.listSub');
    Route::get('bk/kelas/{kelas_id}', [AbsensiSiswaController::class, 'listAbsensiByKelas'])->name('bk.kelas.detail');
    Route::get('/bk/kelas/{kelas_id}/tanggal/{tanggal}', [AbsensiSiswaController::class, 'listByTanggal'])->name('bk.kelas.tanggal');
    Route::get('/bk/absensi/create/{siswa_id}/{tanggal}', [AbsensiSiswaController::class, 'create'])->name('bk.absensi.create');
    Route::post('/bk/absensi/store', [AbsensiSiswaController::class, 'store'])->name('bk.absensi.store');
    Route::get('/bk/absensi/{id}/edit', [AbsensiSiswaController::class, 'edit'])->name('bk.absensi.edit');
    Route::put('/bk/absensi/{id}', [AbsensiSiswaController::class, 'update'])->name('bk.absensi.update');
    Route::get('bk/monitoring-bolos', [BkDashboardController::class,'bolos'])->name('bk.bolos.index');
});

Route::middleware(['auth', 'role:wakasek_kesiswaan'])->group(function () {
    Route::get('/dashboard/wakasek-kesiswaan', fn() => view('dashboard.wakasek-kesiswaan'));
});

Route::middleware(['auth', 'role:wakasek_kurikulum'])->group(function () {
    Route::get('/wakasek/dashboard', [WakasekKurikulumController::class, 'dashboard'])->name('wakasek.dashboard');

    Route::get('/wakasek/absensi-guru', [WakasekKurikulumController::class, 'absenGuruForm'])->name('wakasek.absen.guru');
    Route::post('/wakasek/absensi-guru', [WakasekKurikulumController::class, 'simpanAbsenGuru'])->name('wakasek.absen.guru.simpan');

    Route::get('/wakasek/monitoring-guru', [WakasekKurikulumController::class, 'monitoringGuru'])->name('wakasek.monitoring.guru');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard/admin', fn() => view('dashboard.admin'));
    Route::resource('guru', AdminGuruController::class)->names('admin.guru');
});

Route::get('/test-auth', function () {
    return auth()->user(); // Apakah ini mengembalikan user atau null?
});
