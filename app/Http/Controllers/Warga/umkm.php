<?php

namespace App\Http\Controllers\Warga;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class umkm extends Controller
{
    public function index()
    {
        $breadcrumb = [
            'title' => 'Jenis Jenis UMKM Warga',
            'list' => [
                [
                    'label' => 'UMKM Warga',
                    'dropdown' => true,
                    'links' => [
                        ['url' => route('pengajuan-umkm'), 'label' => 'Daftar UMKM Warga'],
                        ['url' => route('umkm.create'), 'label' => 'Pengajuan UMKM']
                    ]
                ],
                ['label' => 'UMKM Warga', 'url' => route('umkm.create')]
            ]
        ];


        return view('warga.umkm.umkm', ['breadcrumb' => $breadcrumb]);
    }

    public function create()
    {
        $breadcrumb = [
            'title' => 'Jenis Jenis UMKM Warga',
            'list' => [
                [
                    'label' => 'Pengajuan UMKM Warga',
                    'dropdown' => true,
                    'links' => [
                        ['url' => route('pengajuan-umkm'), 'label' => 'Daftar UMKM Warga'],
                        ['url' => route('umkm.create'), 'label' => 'Pengajuan UMKM']
                    ]
                ],
                ['label' => 'Pengajuan UMKM', 'url' => route('umkm.create')]
            ]
        ];

        $user = Auth::user();

        return view('warga.umkm.pengajuan', ['breadcrumb' => $breadcrumb, 'user' => $user]);
    }
    public function show()
    {
        $breadcrumb = [
            'title' => 'Jenis Jenis UMKM Warga',
            'list' => [
                [
                    'label' => 'UMKM Warga',
                    'dropdown' => true,
                    'links' => [
                        ['url' => route('pengajuan-umkm'), 'label' => 'Daftar UMKM Warga'],
                        ['url' => route('umkm.create'), 'label' => 'Pengajuan UMKM']
                    ]
                ],
                ['label' => 'List UMKM Warga', 'url' => route('umkm.create')]
            ]
        ];


        return view('warga.umkm.umkm', ['breadcrumb' => $breadcrumb]);
    }
}
