<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WargaController extends Controller
{
    public function index(Request $request)
    {
        $page = $request->input('page', 'dashboard');

        $breadcrumb = (object) [
            'title' => 'Dashboard Warga',
            'list' => ['', '']
        ];

        $pageData = [
            'dashboard' => (object) ['title' => 'Halaman Dashboard', 'activeMenu' => 'dashboard'],
            'surat' => (object) ['title' => 'Halaman Pengajuan Surat', 'activeMenu' => 'surat'],
            'bantuan' => (object) ['title' => 'Halaman Bantuan Sosial', 'activeMenu' => 'bantuan'],
            'pengaduan' => (object) ['title' => 'Halaman Pengaduan Warga', 'activeMenu' => 'pengaduan'],
            'umkm' => (object) ['title' => 'Halaman UMKM Warga', 'activeMenu' => 'umkm']
        ];

        if (!isset($pageData[$page])) {
            abort(404); // Jika parameter 'page' tidak cocok dengan yang diharapkan, tampilkan halaman 404
        }

        $pageInfo = $pageData[$page];

        // Menyertakan variabel $activeMenu saat memanggil view
        return view('warga.index', ['breadcrumb' => $breadcrumb, 'page' => $pageInfo, 'activeMenu' => $pageInfo->activeMenu]);
    }
}
