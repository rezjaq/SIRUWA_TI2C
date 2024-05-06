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
        ];

        $activeMenu = 'warga_tetap'; // Sesuaikan dengan nilai yang sesuai

        return view('warga.pengajuan_surat.surat', ['breadcrumb' => $breadcrumb, 'activeMenu' => $activeMenu]);
    }



    public function suratPindah()
    {
        $breadcrumb = (object) [
            'title' => 'Pengajuan Surat',
        ];

        $activeMenu = 'warga_pindah'; // Sesuaikan dengan nilai yang sesuai

        return view('warga.pengajuan_surat.surat-pindah', ['breadcrumb' => $breadcrumb, 'activeMenu' => $activeMenu]);
    }
}