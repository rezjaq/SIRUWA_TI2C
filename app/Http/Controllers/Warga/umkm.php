<?php

namespace App\Http\Controllers\Warga;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class umkm extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'UMKM WARGA',
            'list' => ['Home', 'UMKM'] // List diubah menjadi array
        ];

        return view('warga.umkm', ['breadcrumb' => $breadcrumb]);
    }
}
