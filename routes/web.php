<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RTController;
use App\Http\Controllers\RWController;
use App\Http\Controllers\Guest\DashboardWargaController as GuestDashboardWargaController;
use App\Http\Controllers\Guest\PengajuanSuratController as GuestPengajuanSuratController;
use App\Http\Controllers\Guest\BantuanSosial as GuestBantuanSosialController;
use App\Http\Controllers\HomeController;
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

// menu warga
// Route::get('/warga1', function () {
//     return view('warga.index');
// });

// Home Page or Landing Page
Route::get('/landing', [HomeController::class, 'index'])->name('home');