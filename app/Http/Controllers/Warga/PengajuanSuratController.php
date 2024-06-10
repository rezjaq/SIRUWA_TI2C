<?php

namespace App\Http\Controllers\Warga;

use App\Http\Controllers\Controller;
use App\Models\formSurat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengajuanSuratController extends Controller
{

    public function suratTetap()
    {
        $breadcrumb = [
            'title' => 'Pengajuan Surat',
            'list' => [
                [
                    'label' => 'Surat',
                    'dropdown' => true,
                    'links' => [
                        ['url' => route('warga.Warga.index'), 'label' => 'List Data Warga'],
                        ['url' => route('warga.Warga.create'), 'label' => 'Tambah Warga'],
                        ['url' => route('warga.Warga.edit'), 'label' => 'Vertifikasi Data Warga']
                    ]
                ],
                ['label' => 'List Data Warga', 'url' => route('warga.Warga.index')]
            ]
        ];

        $formSurat = formSurat::all();

        return view('warga.pengajuan_surat.surat', compact('breadcrumb', 'formSurat'));
    }

    public function previewForm($id)
    {
        $breadcrumb = [
            'title' => 'Priview Surat',
            'list' => [
                [
                    'label' => 'Surat',
                    'dropdown' => true,
                    'links' => [
                        ['url' => route('warga.Warga.index'), 'label' => 'List Data Warga'],
                        ['url' => route('warga.Warga.create'), 'label' => 'Tambah Warga'],
                        ['url' => route('warga.Warga.edit'), 'label' => 'Vertifikasi Data Warga']
                    ]
                ],
                ['label' => 'List Data Warga', 'url' => route('warga.Warga.index')]
            ]
        ];

        $formSurat = FormSurat::findOrFail($id);
        // Implementasi tampilan priview formulir surat
        return view('warga.pengajuan_surat.priview', compact('breadcrumb','formSurat'));
    }



    // public function suratPindah()
    // {
    //     $breadcrumb = (object) [
    //         'title' => 'Pengajuan Surat',
    //     ];

    //     $user = Auth::user();

    //     return view('warga.pengajuan_surat.surat-pindah', ['breadcrumb' => $breadcrumb, 'user' => $user]);
    // }
}
