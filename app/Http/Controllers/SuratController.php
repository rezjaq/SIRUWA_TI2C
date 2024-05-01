<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuratController extends Controller
{
    public function warga_tetap()
    {
        return view('pengajuan-surat.surat');
    }

    public function warga_pindah()
    {
        return view('pengajuan-surat.surat-pindah');
    }
}
