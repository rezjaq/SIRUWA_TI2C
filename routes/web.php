<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RT\DashboardController as RTDashboardController;
use App\Http\Controllers\RT\PengumumanController as RTPengumumanController;
use App\Http\Controllers\RT\KegiatanController as RTKegiatanController;
use App\Http\Controllers\RT\KeluargaController as RTKeluargaController;
use App\Http\Controllers\RT\WargaController as RTWargaController;
use App\Http\Controllers\RT\PengaduanController as RTPengaduanController;
use App\Http\Controllers\Guest\DashboardWargaController as GuestDashboardWargaController;
use App\Http\Controllers\Guest\PengajuanSuratController as GuestPengajuanSuratController;
use App\Http\Controllers\Guest\BantuanSosial as GuestBantuanSosialController;
use App\Http\Controllers\Guest\DataDiriController as GuestDataDiriController;
use App\Http\Controllers\Guest\umkm as GuestUmkmController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\RW\DashboardRwController as RwDashboardController;
use App\Http\Controllers\RW\PengumumanController as RwPengumumanController;
use App\Http\Controllers\RW\KegiatanController as RwKegiatanController;
use App\Http\Controllers\RW\KeluargaController as RwKeluargaController;
use App\Http\Controllers\RW\WargaController as RwWargaController;
use App\Http\Controllers\SuratController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::get('/check-login', function () {
    return response()->json(['logged_in' => Auth::check()]);
});
Route::post('proses_login', [AuthController::class, 'proses_login'])->name('proses_login');
Route::post('/change-password', [AuthController::class, 'changePassword'])->name('change-password');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

// Setelah mendefinisikan rute login, baru kemudian Anda dapat menambahkan rute untuk akses yang memerlukan autentikasi.
// Pastikan bahwa rute-rute ini terletak setelah rute login.

Route::group(['middleware' => ['auth']], function () {
    // Rute yang memerlukan autentikasi
    // Rute untuk Warga
    Route::group(['middleware' => ['cek_login:warga']], function () {
        Route::get('/warga', [GuestDashboardWargaController::class, 'index'])->name('dashboard-warga');

        Route::prefix('pengajuan_surat')->group(function () {
            Route::get('/surat-tetap', [GuestPengajuanSuratController::class, 'suratTetap'])->name('warga-tetap');
            Route::get('/surat-pindah', [GuestPengajuanSuratController::class, 'suratPindah'])->name('warga-pindah');
        });

        Route::prefix('bansos')->group(function () {
            Route::get('/', [GuestBantuanSosialController::class, 'index'])->name('bansos');
            Route::get('/jenis-bansos', [GuestBantuanSosialController::class, 'jenisBansos'])->name('jenis-bansos');
            Route::get('/pengajuan', [GuestBantuanSosialController::class, 'pengajuan'])->name('pengajuan-bansos');
            Route::get('/daftar-penerima-bansos', [GuestBantuanSosialController::class, 'daftarPenerimaBansos'])->name('daftar-penerima-bansos');
        });

        Route::get('/denah-rumah', function () {
            // Your controller logic here
        })->name('denah-rumah');

        Route::get('/pengaduan', function () {
            // Your controller logic here
        })->name('pengaduan');

        Route::prefix('umkm')->group(function () {
            Route::get('/', [GuestUmkmController::class, 'index'])->name('umkm');
            Route::get('/pengajuan-umkm', [GuestUmkmController::class, 'show'])->name('pengajuan-umkm');
            Route::get('/umkm/create', [GuestUmkmController::class, 'create'])->name('umkm.create');
            Route::post('/umkm/store', [GuestUmkmController::class, 'store'])->name('umkm.store');
        });

        Route::get('/data-diri', [GuestDataDiriController::class, 'index'])->name('data-diri');
    });

    // Rute untuk RT
    Route::group(['middleware' => ['cek_login:RT']], function () {
        Route::get('/RT', [RTDashboardController::class, 'index'])->name('dashboard-rt');

        Route::prefix('announcement')->group(function () {
            Route::get('/', [RTPengumumanController::class, 'index'])->name('announcement.index');
            Route::post('/list', [RTPengumumanController::class, 'list'])->name('announcement.list');
            Route::get('/create', [RTPengumumanController::class, 'create'])->name('announcement.create');
            Route::post('/store', [RTPengumumanController::class, 'store'])->name('announcement.store');
            Route::get('/{id}', [RTPengumumanController::class, 'show'])->name('announcement.show');
            Route::get('/{id}/edit', [RTPengumumanController::class, 'edit'])->name('announcement.edit');
            Route::put('/{id}/update', [RTPengumumanController::class, 'update'])->name('announcement.update');
            Route::delete('/{id}', [RTPengumumanController::class, 'destroy'])->name('announcement.destroy');
        });

        Route::prefix('/activity')->group(function () {
            Route::get('/', [RTKegiatanController::class, 'index'])->name('activity.index');
            Route::post('/list', [RTKegiatanController::class, 'list'])->name('activity.list');
            Route::get('/create', [RTKegiatanController::class, 'create'])->name('activity.create');
            Route::post('/store', [RTKegiatanController::class, 'store'])->name('activity.store');
            Route::get('/{id}', [RTKegiatanController::class, 'show'])->name('activity.show');
            Route::get('/{id}/edit', [RTKegiatanController::class, 'edit'])->name('activity.edit');
            Route::put('/{id}/update', [RTKegiatanController::class, 'update'])->name('activity.update');
            Route::delete('/{id}', [RTKegiatanController::class, 'destroy'])->name('activity.destroy');
        });

        Route::prefix('/family')->group(function () {
            Route::get('/', [RTKeluargaController::class, 'index'])->name('family.index');
            Route::post('/list', [RTKeluargaController::class, 'list'])->name('family.list');
            Route::get('/create', [RTKeluargaController::class, 'create'])->name('family.create');
            Route::post('/store', [RTKeluargaController::class, 'store'])->name('family.store');
            Route::get('/{id}', [RTKeluargaController::class, 'show'])->name('family.show');
            Route::get('/{id}/edit', [RTKeluargaController::class, 'edit'])->name('family.edit');
            Route::put('/{id}/update', [RTKeluargaController::class, 'update'])->name('family.update');
            Route::delete('/{id}', [RTKeluargaController::class, 'destroy'])->name('family.destroy');
        });

        Route::prefix('/citizen')->group(function () {
            Route::get('/', [RTWargaController::class, 'index'])->name('citizen.index');
            Route::post('/list', [RTWargaController::class, 'list'])->name('citizen.list');
            Route::get('/create', [RTWargaController::class, 'create'])->name('citizen.create');
            Route::post('/store', [RTWargaController::class, 'store'])->name('citizen.store');
            Route::get('/{id}', [RTWargaController::class, 'show'])->name('citizen.show');
            Route::get('/{id}/edit', [RTWargaController::class, 'edit'])->name('citizen.edit');
            Route::put('/{id}/update', [RTWargaController::class, 'update'])->name('citizen.update');
            Route::delete('/{id}', [RTWargaController::class, 'destroy'])->name('citizen.destroy');
        });

        Route::prefix('/complaint')->group(function () {
            Route::get('/', [RTPengaduanController::class, 'index'])->name('complaint.index');
            Route::post('/list', [RTPengaduanController::class, 'list'])->name('complaint.list');
            Route::get('/create', [RTPengaduanController::class, 'create'])->name('complaint.create');
            Route::post('/store', [RTPengaduanController::class, 'store'])->name('complaint.store');
            Route::get('/{id}', [RTPengaduanController::class, 'show'])->name('complaint.show');
            Route::get('/{id}/edit', [RTPengaduanController::class, 'edit'])->name('complaint.edit');
            Route::put('/{id}/update', [RTPengaduanController::class, 'update'])->name('complaint.update');
            Route::delete('/{id}', [RTPengaduanController::class, 'destroy'])->name('complaint.destroy');
        });
    });

    // Rute untuk RW
    Route::group(['middleware' => ['cek_login:RW']], function () {
        Route::get('/RW', [RwDashboardController::class, 'index'])->name('dashboard-rw');

        Route::prefix('/pengumuman')->group(function () {
            Route::get('/', [RwPengumumanController::class, 'index'])->name('pengumuman');
            Route::post('/list', [RwPengumumanController::class, 'list'])->name('pengumuman.list');
            Route::get('/create', [RwPengumumanController::class, 'create'])->name('pengumuman.create');
            Route::post('/store', [RwPengumumanController::class, 'store'])->name('pengumuman.store');
            Route::get('/{id}', [RwPengumumanController::class, 'show'])->name('pengumuman.show');
            Route::get('/{id}/edit', [RwPengumumanController::class, 'edit'])->name('pengumuman.edit');
            Route::put('/{id}/update', [RwPengumumanController::class, 'update'])->name('pengumuman.update');
            Route::delete('/{id}', [RwPengumumanController::class, 'destroy'])->name('pengumuman.destroy');
        });

        Route::prefix('/kegiatan')->group(function () {
            Route::get('/', [RwKegiatanController::class, 'index'])->name('kegiatan.index');
            Route::post('/list', [RwKegiatanController::class, 'list'])->name('kegiatan.list');
            Route::get('/create', [RwKegiatanController::class, 'create'])->name('kegiatan.create');
            Route::post('/store', [RwKegiatanController::class, 'store'])->name('kegiatan.store');
            Route::get('/{id}', [RwKegiatanController::class, 'show'])->name('kegiatan.show');
            Route::get('/{id}/edit', [RwKegiatanController::class, 'edit'])->name('kegiatan.edit');
            Route::put('/{id}/update', [RwKegiatanController::class, 'update'])->name('kegiatan.update');
            Route::delete('/{id}', [RwKegiatanController::class, 'destroy'])->name('kegiatan.destroy');
        });

        Route::prefix('/keluarga')->group(function () {
            Route::get('/', [RwKeluargaController::class, 'index'])->name('keluarga.index');
            Route::post('/list', [RwKeluargaController::class, 'list'])->name('keluarga.list');
            Route::get('/create', [RwKeluargaController::class, 'create'])->name('keluarga.create');
            Route::post('/store', [RwKeluargaController::class, 'store'])->name('keluarga.store');
            Route::get('/{id}', [RwKeluargaController::class, 'show'])->name('keluarga.show');
            Route::get('/{id}/edit', [RwKeluargaController::class, 'edit'])->name('keluarga.edit');
            Route::put('/{id}/update', [RwKeluargaController::class, 'update'])->name('keluarga.update');
            Route::delete('/{id}', [RwKeluargaController::class, 'destroy'])->name('keluarga.destroy');
        });

        Route::prefix('/citizen')->group(function () {
            Route::get('/', [RwWargaController::class, 'index'])->name('Warga.index');
            Route::post('/list', [RwWargaController::class, 'list'])->name('Warga.list');
            Route::get('/create', [RwWargaController::class, 'create'])->name('Warga.create');
            Route::post('/store', [RwWargaController::class, 'store'])->name('Warga.store');
            Route::get('/{id}', [RwWargaController::class, 'show'])->name('Warga.show');
            Route::get('/{id}/edit', [RwWargaController::class, 'edit'])->name('Warga.edit');
            Route::put('/{id}/update', [RwWargaController::class, 'update'])->name('Warga.update');
            Route::delete('/{id}', [RwWargaController::class, 'destroy'])->name('Warga.destroy');
        });
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


Route::get('/berita', function () {
    return view('berita.berita');
});


// Home Page or Landing Page
Route::get('/', [HomeController::class, 'index'])->name('home');

