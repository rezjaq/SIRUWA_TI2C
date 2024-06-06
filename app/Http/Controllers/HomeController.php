<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Pengumuman;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $pengumuman = Pengumuman::where('status_pengumuman', 'aktif')
        ->orderBy('tanggal', 'desc')
        ->take(3)
        ->get();
        
        $kegiatan = Kegiatan::where('status_kegiatan', 'aktif')
            ->orderBy('tanggal_kegiatan', 'desc')
            // ->take(4)
            ->get();

        return view('welcome', compact('pengumuman', 'kegiatan'));
    }

    public function beritaLainnya()
    {
        $breadcrumb = [
            'title' => 'Berita lainya',
            'list' => [
                [
                    'label' => 'home',
                    'dropdown' => true,
                    'links' => [
                        ['url' => route('home'), 'label' => 'halaman awal']
                    ]
                ],
            ]
        ];

        $pengumuman = Pengumuman::where('status_pengumuman', 'aktif')
                                 ->orderBy('tanggal', 'desc')
                                 ->paginate(10); 

        return view('berita_lainya', compact('breadcrumb','pengumuman'));
    }

    public function beritaShow($id)
    {
        $breadcrumb = [
            'title' => 'Detail Berita',
            'list' => [
                [
                    'label' => 'home',
                    'dropdown' => true,
                    'links' => [
                        ['title' => 'Home', 'url' => route('home')],
                        ['title' => 'Berita Lainnya', 'url' => route('berita_lainnya')],
                    ]
                ],
            ]
        ];
        $pengumuman = Pengumuman::findOrFail($id);

        return view('berita_detail', compact('breadcrumb','pengumuman'));
    }

    
}
