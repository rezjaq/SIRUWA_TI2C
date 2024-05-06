<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RTController;
use App\Http\Controllers\RWController;
use App\Http\Controllers\Guest\DashboardWargaController as GuestDashboardWargaController;
use App\Http\Controllers\Guest\PengajuanSuratController as GuestPengajuanSuratController;
use App\Http\Controllers\Guest\BantuanSosial as GuestBantuanSosialController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\SuratController;
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


//login
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('proses_login', [AuthController::class, 'proses_login'])->name('proses_login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

// Setelah mendefinisikan rute login, baru kemudian Anda dapat menambahkan rute untuk akses yang memerlukan autentikasi.
// Pastikan bahwa rute-rute ini terletak setelah rute login.

Route::group(['middleware' => ['auth']], function () {
    // Rute yang memerlukan autentikasi
    // Rute untuk Warga
    Route::group(['middleware' => ['cek_login:warga']], function () {
        Route::get('/warga', [GuestDashboardWargaController::class, 'index'])->name('dashboard-warga');
        Route::get('/', [GuestDashboardWargaController::class, 'index']);
        Route::prefix('pengajuan_surat')->group(function () {
            Route::get('/surat-tetap', [GuestPengajuanSuratController::class, 'suratTetap'])->name('warga-tetap');
            Route::get('/surat-pindah', [GuestPengajuanSuratController::class, 'suratPindah'])->name('warga-pindah');
        });
        Route::get('/bansos', [GuestBantuanSosialController::class, 'index']);
    });

    // Rute untuk RT
    Route::group(['middleware' => ['cek_login:RT']], function () {
        Route::resource('RT', RTController::class);
    });

    // Rute untuk RW
    Route::group(['middleware' => ['cek_login:RW']], function () {
        Route::resource('RW', RWController::class);
    });
});




// -- Digunakan jika menggunakan password enkripsi.
// Route::group(['middleware' => 'auth'], function () {
//     Route::group(['middleware' => ['cek_login:RW']], function () {
//         Route::resource('RW', RWController::class);
//     });
//     Route::group(['middleware' => ['cek_login:RT']], function () {
//         Route::resource('RT', RTController::class);
//     });
//     Route::group(['middleware' => ['cek_login:warga']], function () {
//         Route::resource('warga', WargaController::class);
//     });
// });


// rute admin pengumuman
Route::get('/pengumuman', [PengumumanController::class, 'index'])->name('pengumuman');
Route::get('/pengumuman/create', [PengumumanController::class, 'create'])->name('pengumuman.create');
Route::get('/pengumuman/{id}', [PengumumanController::class, 'show'])->name('pengumuman.show');
Route::post('/pengumuman/store', [PengumumanController::class, 'store'])->name('pengumuman.store');
Route::get('/pengumuman/edit/{id}', [PengumumanController::class, 'edit'])->name('pengumuman.edit');
Route::put('/pengumuman/update/{id}', [PengumumanController::class, 'update'])->name('pengumuman.update');
Route::delete('/pengumuman/{id}', [PengumumanController::class, 'destroy'])->name('pengumuman.destroy');

//rute admin kegiatan
Route::get('/kegiatan', [KegiatanController::class, 'index'])->name('kegiatan.index');
Route::get('/kegiatan/create', [KegiatanController::class, 'create'])->name('kegiatan.create');
Route::post('/kegiatan', [KegiatanController::class, 'store'])->name('kegiatan.store');
Route::get('/kegiatan/{kegiatan}', [KegiatanController::class, 'show'])->name('kegiatan.show');
Route::get('/kegiatan/{kegiatan}/edit', [KegiatanController::class, 'edit'])->name('kegiatan.edit');
Route::put('/kegiatan/{kegiatan}', [KegiatanController::class, 'update'])->name('kegiatan.update');
Route::delete('/kegiatan/{kegiatan}', [KegiatanController::class, 'destroy'])->name('kegiatan.destroy');

// menu warga
// Route::get('/warga1', function () {
//     return view('warga.index');
// });

// Home Page or Landing Page
Route::get('/landing', [HomeController::class, 'index'])->name('home');

