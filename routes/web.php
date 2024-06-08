<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RT\DashboardController as RTDashboardController;
use App\Http\Controllers\Warga\DashboardWargaController as DashboardWargaController;
use App\Http\Controllers\Warga\PengajuanSuratController as PengajuanSuratController;
use App\Http\Controllers\Warga\BantuanSosial as BantuanSosialController;
use App\Http\Controllers\Warga\DataDiriController as DataDiriController;
use App\Http\Controllers\Warga\umkm as UmkmController;
use App\Http\Controllers\Warga\DataKeluargaController as WargaDataKeluargaController;
use App\Http\Controllers\Warga\DataWargaController as WargaDataWargaController;
use App\Http\Controllers\Warga\PengaduanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\RW\DashboardRwController as RwDashboardController;
use App\Http\Controllers\RW\PengumumanController as RwPengumumanController;
use App\Http\Controllers\RW\KegiatanController as RwKegiatanController;
use App\Http\Controllers\RW\KeluargaController as RwKeluargaController;
use App\Http\Controllers\RW\WargaController as RwWargaController;
use App\Http\Controllers\RW\WargaPindah as RwWargaPindah;
use App\Http\Controllers\RT\WargaPindah as RtWargaPindah;
use App\Http\Controllers\WargaPindah as WargaPindah;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\RegistrasiWargaController as RegistrasiWarga;
use App\Http\Controllers\RW\AprrovePengaduan;
use App\Http\Controllers\RT\KeluargaController as RTKeluargaController;
use App\Http\Controllers\RT\WargaController as RTWargaController;
use App\Http\Controllers\RW\ApproveUmkm;
use App\Http\Controllers\RW\Verifikasi as RWverifikasi;
use App\Http\Controllers\RW\VerifikasiKeluarga as RWverifikasiKeluarga;
use App\Http\Controllers\RT\RTVerifikasiWarga as RTverifikasiWarga;
use App\Http\Controllers\RT\RTVerifikasiKeluarga as RTverifikasiKeluarga;
use App\Http\Controllers\RW\VerifikasiWargaPindah as verifikasiWargaPindah;
use App\Http\Controllers\RT\AprovePengaduanRT as AprovePengaduanRT;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\DokumentasiController;
use App\Http\Controllers\Warga\BansosController as BansosWarga;
use App\Http\Controllers\RW\BansosController as BansosRW;
use App\Http\Controllers\RW\SuratController as SuratRW;
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
Route::get('/change-password', [AuthController::class, 'showChangePasswordForm'])->name('change-password');
Route::post('/change-password', [AuthController::class, 'changePassword'])->name('post-change-password');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/cek_nik', [RegistrasiWarga::class, 'index'])->name('registrasi.index');
Route::post('/cek_nik', [RegistrasiWarga::class, 'isNikExists'])->name('nik.check');

// Setelah mendefinisikan rute login, baru kemudian Anda dapat menambahkan rute untuk akses yang memerlukan autentikasi.
// Pastikan bahwa rute-rute ini terletak setelah rute login.

Route::group(['middleware' => ['auth']], function () {
    // Rute yang memerlukan autentikasi
    // Rute untuk Warga
    Route::group(['middleware' => ['cek_login:warga']], function () {
        Route::get('/warga', [DashboardWargaController::class, 'index'])->name('dashboard-warga');
        Route::prefix('pengajuan_surat')->group(function () {
            Route::get('/surat-tetap', [PengajuanSuratController::class, 'suratTetap'])->name('warga-tetap');
            Route::get('/download-surat', [PengajuanSuratController::class, 'downloadSurat'])->name('download.surat');
            Route::get('/surat-pindah', [PengajuanSuratController::class, 'suratPindah'])->name('warga-pindah');
        });

        Route::prefix('/bansos')->middleware('auth')->group(function () {
            Route::get('/create', [BansosWarga::class, 'create'])->name('warga.bansos.create');
            Route::post('/store', [BansosWarga::class, 'store'])->name('warga.bansos.store');
            Route::get('/penerima', [BansosWarga::class, 'penerima'])->name('warga.bansos.penerima');
            Route::get('/bansos', [BantuanSosialController::class, 'index'])->name('bansos');
        });

        Route::prefix('bansos')->group(function () {
            Route::get('/', [BantuanSosialController::class, 'index'])->name('bansos');
            Route::get('/pengajuan', [BantuanSosialController::class, 'pengajuan'])->name('pengajuan-bansos');
            Route::get('/daftar-penerima-bansos', [BantuanSosialController::class, 'daftarPenerimaBansos'])->name('daftar-penerima-bansos');
        });

        Route::group(['prefix' => 'pengaduan'], function () {
            Route::get('/pengaduan', [PengaduanController::class, 'index'])->name('pengaduan');
            Route::post('/store', [PengaduanController::class, 'store'])->name('pengaduan.store');
            Route::get('/pengaduan/{id}/history', [PengaduanController::class, 'show'])->name('pengaduan.history');
        });


        Route::prefix('umkm')->group(function () {
            Route::get('/', [UmkmController::class, 'index'])->name('umkm');
            Route::get('/pengajuan-umkm', [UmkmController::class, 'show'])->name('pengajuan-umkm');
            Route::get('/umkm/create', [UmkmController::class, 'create'])->name('umkm.create');
            Route::post('/umkm/store', [UmkmController::class, 'store'])->name('umkm.store');
        });

        // ->middleware('auth')
        Route::prefix('/data-keluarga')->middleware('auth')->group(function () {
            Route::get('/', [WargaDataKeluargaController::class, 'index'])->name('warga.keluarga.index');
            Route::get('/create', [WargaDataKeluargaController::class, 'create'])->name('warga.keluarga.create');
            Route::post('/store', [WargaDataKeluargaController::class, 'store'])->name('warga.keluarga.store');
            Route::get('/edit', [WargaDataKeluargaController::class, 'edit'])->name('warga.keluarga.edit');
            Route::put('/update', [WargaDataKeluargaController::class, 'update'])->name('warga.keluarga.update');
        });
        Route::prefix('/data-warga')->group(function () {
            Route::get('/', [WargaDataWargaController::class, 'index'])->name('warga.Warga.index');
            Route::get('/create', [WargaDataWargaController::class, 'create'])->name('warga.Warga.create');
            Route::post('/store', [WargaDataWargaController::class, 'store'])->name('warga.Warga.store');
            Route::get('/edit', [WargaDataWargaController::class, 'edit'])->name('warga.Warga.edit'); // Tidak memerlukan ID
            Route::put('/update', [WargaDataWargaController::class, 'update'])->name('warga.Warga.update'); // No ID, as it's the logged-in user
        });

        Route::get('/bansos', [BantuanSosialController::class, 'index'])->name('bansos');
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

        Route::prefix('/Warga')->group(function () {
            Route::get('/', [RwWargaController::class, 'index'])->name('Warga.index');
            Route::post('/list', [RwWargaController::class, 'list'])->name('Warga.list');
            Route::get('/create', [RwWargaController::class, 'create'])->name('Warga.create');
            Route::post('/store', [RwWargaController::class, 'store'])->name('Warga.store');
            Route::get('/{id}', [RwWargaController::class, 'show'])->name('Warga.show');
            Route::get('/{id}/edit', [RwWargaController::class, 'edit'])->name('Warga.edit');
            Route::put('/{id}/update', [RwWargaController::class, 'update'])->name('Warga.update');
            Route::delete('/{id}', [RwWargaController::class, 'destroy'])->name('Warga.destroy');
        });

        Route::prefix('/verifikasi')->group(function () {
            Route::get('/', [RWverifikasi::class, 'index'])->name('verifikasi.index');
            Route::post('/list', [RWverifikasi::class, 'list'])->name('verifikasi.list');
            Route::get('/{id}', [RWverifikasi::class, 'show'])->name('verifikasi.show');
            Route::post('/approve/{nik}', [RWverifikasi::class, 'approve'])->name('verifikasi.approve');
            Route::post('reject/{nik}', [RWverifikasi::class, 'reject'])->name('verifikasi.reject');
        });
        Route::prefix('/verifikasiKeluarga')->group(function () {
            Route::get('/', [RWverifikasiKeluarga::class, 'index'])->name('verifikasiKeluarga.index');
            Route::post('/list', [RWverifikasiKeluarga::class, 'list'])->name('verifikasiKeluarga.list');
            Route::get('/{id}', [RWverifikasiKeluarga::class, 'show'])->name('verifikasiKeluarga.show');
            Route::post('/approve/{id_keluarga}', [RWverifikasiKeluarga::class, 'approve'])->name('verifikasiKeluarga.approve');
            Route::post('reject/{id_keluarga}', [RWverifikasiKeluarga::class, 'reject'])->name('verifikasiKeluarga.reject');
        });
        Route::prefix('/Pengaduann')->group(function () {
            Route::get('/', [AprrovePengaduan::class, 'index'])->name('admin.pengaduan');
            Route::post('/{id}/approve', [AprrovePengaduan::class, 'approve'])->name('pengaduan.approve');
            Route::post('/{id}/reject', [AprrovePengaduan::class, 'reject'])->name('pengaduan.reject');
        });
        Route::prefix('/pengajuan-umkm')->group(function () {
            Route::get('/', [ApproveUmkm::class, 'index'])->name('admin.pengaduan');
            Route::post('/umkm/approve/{id}', [ApproveUmkm::class, 'approve'])->name('umkm.approve');
            Route::post('/umkm/reject/{id}', [ApproveUmkm::class, 'reject'])->name('umkm.reject');
        });
        Route::prefix('/bansos')->group(function () {
            Route::get('/', [BansosRW::class, 'viewRankedScores'])->name('RW.bansos.ranked-scores');
            Route::post('/list', [BansosRW::class, 'listRankedScores'])->name('RW.bansos.ranked-scores.list');
            Route::get('/bansos/create', [BansosRW::class, 'create'])->name('RW.bansos.create');
            Route::post('/bansos/store', [BansosRW::class, 'store'])->name('RW.bansos.store');
            Route::get('/show/{id}', [BansosRW::class, 'show'])->name('RW.Bansos.show');
            Route::post('/{id}/approve', [BansosRW::class, 'approve'])->name('RW.Bansos.approve');
            Route::post('/{id}/reject', [BansosRW::class, 'reject'])->name('RW.Bansos.reject');
        });
        Route::prefix('/Warga_Pindah')->group(function () {
            Route::get('/', [RwWargaPindah::class, 'index'])->name('WargaPindah.index');
            Route::post('/list', [RwWargaPindah::class, 'list'])->name('WargaPindah.list');
            Route::get('/create', [RwWargaPindah::class, 'create'])->name('WargaPindah.create');
            Route::post('/store', [RwWargaPindah::class, 'store'])->name('WargaPindah.store');
            Route::get('/{id}', [RwWargaPindah::class, 'show'])->name('WargaPindah.show');
            Route::get('/{id}/edit', [RwWargaPindah::class, 'edit'])->name('WargaPindah.edit');
            Route::put('/{id}/update', [RwWargaPindah::class, 'update'])->name('WargaPindah.update');
            Route::delete('/{id}', [RwWargaPindah::class, 'destroy'])->name('WargaPindah.destroy');
        });
        Route::prefix('/verifikasiWargaPindah')->group(function () {
            Route::get('/', [verifikasiWargaPindah::class, 'index'])->name('verifikasiWargaPindah.index');
            Route::post('/list', [verifikasiWargaPindah::class, 'list'])->name('verifikasiWargaPindah.list');
            Route::get('/{id}', [verifikasiWargaPindah::class, 'show'])->name('verifikasiWargaPindah.show');
            Route::post('/approve/{id}', [verifikasiWargaPindah::class, 'approve'])->name('verifikasiWargaPindah.approve');
            Route::post('reject/{id}', [verifikasiWargaPindah::class, 'reject'])->name('verifikasiWargaPindah.reject');
        });
        Route::prefix('/SuratRW')->group(function () {
            Route::get('/', [SuratRW::class, 'index'])->name('rw.surat.index');
            Route::post('/list', [SuratRW::class, 'list'])->name('rw.surat.list');
            Route::get('/create', [SuratRW::class, 'create'])->name('rw.surat.create');
            Route::post('/store', [SuratRW::class, 'store'])->name('rw.surat.store');
            Route::delete('/{id}', [SuratRW::class, 'destroy'])->name('rw.surat.destroy');
        });
    });

    // Rute untuk RT
    Route::group(['middleware' => ['cek_login:RT']], function () {
        Route::get('/RT', [RTDashboardController::class, 'index'])->name('dashboard-rt');

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
        Route::prefix('/RTVerifikasiWarga')->group(function () {
            Route::get('/', [RTverifikasiWarga::class, 'index'])->name('RTVerifikasiWarga.index');
            Route::post('/list', [RTverifikasiWarga::class, 'list'])->name('RTVerifikasiWarga.list');
            Route::get('/{id}', [RTverifikasiWarga::class, 'show'])->name('RTVerifikasiWarga.show');
            Route::post('/approve/{nik}', [RTverifikasiWarga::class, 'approve'])->name('RTVerifikasiWarga.approve');
            Route::post('reject/{nik}', [RTverifikasiWarga::class, 'reject'])->name('RTVerifikasiWarga.reject');
        });
        Route::prefix('/RTVerifikasiKeluarga')->group(function () {
            Route::get('/', [RTverifikasiKeluarga::class, 'index'])->name('RTVerifikasiKeluarga.index');
            Route::post('/list', [RTverifikasiKeluarga::class, 'list'])->name('RTVerifikasiKeluarga.list');
            Route::get('/{id}', [RTverifikasiKeluarga::class, 'show'])->name('RTVerifikasiKeluarga.show');
            Route::post('/approve/{id_keluarga}', [RTverifikasiKeluarga::class, 'approve'])->name('RTVerifikasiKeluarga.approve');
            Route::post('reject/{id_keluarga}', [RTverifikasiKeluarga::class, 'reject'])->name('RTVerifikasiKeluarga.reject');
        });
        Route::prefix('/PengaduanRT')->group(function () {
            Route::get('/', [AprovePengaduanRT::class, 'index'])->name('RT.pengaduan.index');
            Route::post('/{id}/approve', [AprovePengaduanRT::class, 'approve'])->name('RT.pengaduan.approve');
            Route::post('/{id}/reject', [AprovePengaduanRT::class, 'reject'])->name('RT.pengaduan.reject');
        });
        Route::prefix('/RTWarga_Pindah')->group(function () {
            Route::get('/', [RtWargaPindah::class, 'index'])->name('rt.WargaPindah.index');
            Route::post('/list', [RtWargaPindah::class, 'list'])->name('rt.WargaPindah.list');
            Route::get('/create', [RtWargaPindah::class, 'create'])->name('rt.WargaPindah.create');
            Route::post('/store', [RtWargaPindah::class, 'store'])->name('rt.WargaPindah.store');
            Route::get('/{id}', [RtWargaPindah::class, 'show'])->name('rt.WargaPindah.show');
            Route::get('/{id}/edit', [RtWargaPindah::class, 'edit'])->name('rt.WargaPindah.edit');
            Route::put('/{id}/update', [RtWargaPindah::class, 'update'])->name('rt.WargaPindah.update');
            Route::delete('/{id}', [RtWargaPindah::class, 'destroy'])->name('rt.WargaPindah.destroy');
        });

        // Route::prefix('announcement')->group(function () {
        //     Route::get('/', [RTPengumumanController::class, 'index'])->name('announcement.index');
        //     Route::post('/list', [RTPengumumanController::class, 'list'])->name('announcement.list');
        //     Route::get('/create', [RTPengumumanController::class, 'create'])->name('announcement.create');
        //     Route::post('/store', [RTPengumumanController::class, 'store'])->name('announcement.store');
        //     Route::get('/{id}', [RTPengumumanController::class, 'show'])->name('announcement.show');
        //     Route::get('/{id}/edit', [RTPengumumanController::class, 'edit'])->name('announcement.edit');
        //     Route::put('/{id}/update', [RTPengumumanController::class, 'update'])->name('announcement.update');
        //     Route::delete('/{id}', [RTPengumumanController::class, 'destroy'])->name('announcement.destroy');
        // });

        // Route::prefix('/activity')->group(function () {
        //     Route::get('/', [RTKegiatanController::class, 'index'])->name('activity.index');
        //     Route::post('/list', [RTKegiatanController::class, 'list'])->name('activity.list');
        //     Route::get('/create', [RTKegiatanController::class, 'create'])->name('activity.create');
        //     Route::post('/store', [RTKegiatanController::class, 'store'])->name('activity.store');
        //     Route::get('/{id}', [RTKegiatanController::class, 'show'])->name('activity.show');
        //     Route::get('/{id}/edit', [RTKegiatanController::class, 'edit'])->name('activity.edit');
        //     Route::put('/{id}/update', [RTKegiatanController::class, 'update'])->name('activity.update');
        //     Route::delete('/{id}', [RTKegiatanController::class, 'destroy'])->name('activity.destroy');
        // });

        // Route::prefix('/complaint')->group(function () {
        //     Route::get('/', [RTPengaduanController::class, 'index'])->name('complaint.index');
        //     Route::post('/list', [RTPengaduanController::class, 'list'])->name('complaint.list');
        //     Route::get('/create', [RTPengaduanController::class, 'create'])->name('complaint.create');
        //     Route::post('/store', [RTPengaduanController::class, 'store'])->name('complaint.store');
        //     Route::get('/{id}', [RTPengaduanController::class, 'show'])->name('complaint.show');
        //     Route::get('/{id}/edit', [RTPengaduanController::class, 'edit'])->name('complaint.edit');
        //     Route::put('/{id}/update', [RTPengaduanController::class, 'update'])->name('complaint.update');
        //     Route::delete('/{id}', [RTPengaduanController::class, 'destroy'])->name('complaint.destroy');
        // });
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



// Route::get('/berita', function () {
//     return view('berita.berita');
// });

// Home Page or Landing Page
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/berita-lainnya', [HomeController::class, 'beritaLainnya'])->name('berita_lainnya');
Route::get('/berita/{id}', [HomeController::class, 'beritaShow'])->name('berita.show');
//menampilkan berita untuk page after login
Route::get('/berita-lainnya', [DashboardWargaController::class, 'beritaLainnya'])->name('berita_lainnya');
Route::get('/berita/{id}', [DashboardWargaController::class, 'beritaShow'])->name('berita.show');


// Route::get('/berita', [BeritaController::class, 'index'])->name('berita');
// Route::get('/detail-berita', [BeritaController::class, 'detail'])->name('detail-berita');
Route::get('/events', [EventsController::class, 'index'])->name('events');
Route::get('/dokumentasi', [DokumentasiController::class, 'index'])->name('dokumentasi');

Route::get('wargaPindah/create', [WargaPindah::class, 'create'])->name('wargaPindah.create');
Route::post('wargaPindah/store', [WargaPindah::class, 'store'])->name('wargaPindah.store');
