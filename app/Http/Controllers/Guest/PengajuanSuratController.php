<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PengajuanSuratController extends Controller
{

    public function suratTetap()
    {
        $breadcrumb = (object) [
            'title' => 'Pengajuan Surat',
            'list' => ['Home', 'Pengajuan Surat'] // Example breadcrumb list
        ];

        return view('warga.pengajuan_surat.surat', ['breadcrumb' => $breadcrumb]);
    }




    public function suratPindah()
    {
        $breadcrumb = (object) [
            'title' => 'Pengajuan Surat',
        ];

        $activeMenu = 'warga_pindah';

        return view('warga.pengajuan_surat.surat-pindah', ['breadcrumb' => $breadcrumb]);
    }
}
