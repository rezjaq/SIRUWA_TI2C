<?php

namespace App\Http\Controllers\Warga;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class umkm extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'UMKM WARGA',
            'list' => ['UMKM', 'Daftar UMKM']
        ];


        return view('warga.umkm.umkm', ['breadcrumb' => $breadcrumb]);
    }

    public function show()
    {
        $breadcrumb = (object) [
            'title' => 'UMKM WARGA',
            'list' => ['UMKM', 'Pengajuan UMKM'] // List diubah menjadi array
        ];

        $user = Auth::user();

        return view('warga.umkm.pengajuan', ['breadcrumb' => $breadcrumb, 'user' => $user]);
    }
}
