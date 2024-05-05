<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuratController extends Controller
{
    public function warga_tetap(Request $request)
    {
        $breadcrumb = (object) [
            'title' => 'Pengajuan Surat Warga Tetap'
        ];

        $pageData = [
            'dashboard' => (object) ['title' => 'Halaman Dashboard', 'activeMenu' => 'dashboard'],
            'surat' => (object) ['title' => 'Halaman Pengajuan Surat', 'activeMenu' => 'surat'],
            'bantuan' => (object) ['title' => 'Halaman Bantuan Sosial', 'activeMenu' => 'bantuan'],
            'pengaduan' => (object) ['title' => 'Halaman Pengaduan Warga', 'activeMenu' => 'pengaduan'],
            'umkm' => (object) ['title' => 'Halaman UMKM Warga', 'activeMenu' => 'umkm']
        ];

        $pageInfo = $pageData['surat'];

        return view('pengajuan-surat.surat', ['breadcrumb' => $breadcrumb, 'page' => $pageInfo, 'activeMenu' => $pageInfo->activeMenu]);
    }

    public function warga_pindah(Request $request)
    {
        $breadcrumb = (object) [
            'title' => 'Pengajuan Surat Warga Pindah',
            'list' => ['Home', 'Warga', 'Pengajuan Surat', 'Warga Pindah']
        ];

        $pageData = [
            'dashboard' => (object) ['title' => 'Halaman Dashboard', 'activeMenu' => 'dashboard'],
            'surat' => (object) ['title' => 'Halaman Pengajuan Surat', 'activeMenu' => 'surat'],
            'bantuan' => (object) ['title' => 'Halaman Bantuan Sosial', 'activeMenu' => 'bantuan'],
            'pengaduan' => (object) ['title' => 'Halaman Pengaduan Warga', 'activeMenu' => 'pengaduan'],
            'umkm' => (object) ['title' => 'Halaman UMKM Warga', 'activeMenu' => 'umkm']
        ];

        $pageInfo = $pageData['surat'];

        return view('pengajuan-surat.surat-pindah', ['breadcrumb' => $breadcrumb, 'page' => $pageInfo, 'activeMenu' => $pageInfo->activeMenu]);
    }
}
