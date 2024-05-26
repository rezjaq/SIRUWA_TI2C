<?php

namespace App\Http\Controllers\Warga;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengajuanSuratController extends Controller
{

    public function suratTetap()
    {
        $breadcrumb = (object) [
            'title' => 'Pengajuan Surat',
            'list' => ['Home', 'Pengajuan Surat'] // Example breadcrumb list
        ];

        // Mengambil data pengguna yang sudah login
        $user = Auth::user();

        return view('warga.pengajuan_surat.surat', ['breadcrumb' => $breadcrumb, 'user' => $user]);
    }


    public function suratPindah()
    {
        $breadcrumb = (object) [
            'title' => 'Pengajuan Surat',
        ];

        $user = Auth::user();

        return view('warga.pengajuan_surat.surat-pindah', ['breadcrumb' => $breadcrumb, 'user' => $user]);
    }
}
