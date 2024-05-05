<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RTController;
use App\Http\Controllers\RWController;
use App\Http\Controllers\Guest\WargaController as GuestWargaController;
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

// Home Page or Landing Page
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::group(['prefix' => 'surat'], function () {
    Route::get('/surat-pindah', [SuratController::class, 'warga_pindah'])->name('surat-pindah');
    Route::get('/surat-tetap', [SuratController::class, 'warga_tetap'])->name('surat-tetap');
});



//login
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('proses_login', [AuthController::class, 'proses_login'])->name('proses_login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');


Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['cek_login:warga']], function () {
        Route::resource('warga', GuestWargaController::class, 'warga.index');
    });
});
Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['cek_login:RT']], function () {
        Route::resource('RT', RTController::class);
    });
});
Route::group(['middleware' => ['auth']], function () {
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