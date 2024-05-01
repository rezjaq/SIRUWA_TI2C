<?php

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
Route::get('/pengajuan-surat', [SuratController::class, 'warga_tetap'])->name('pengajuan-surat');
Route::get('/pengajuan-surat-pindah', [SuratController::class, 'warga_pindah'])->name('pengajuan-surat-pindah');
