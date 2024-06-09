<?php

namespace App\Http\Controllers\Warga;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardWargaController extends Controller
{
    public function index()
    {
        $pengumuman = Pengumuman::where('status_pengumuman', 'aktif')
            ->orderBy('tanggal', 'desc')
            ->take(4)
            ->get();

        $kegiatan = Kegiatan::where('status_kegiatan', 'aktif')
            ->orderBy('tanggal_kegiatan', 'desc')
            ->get();
        $user = Auth::user();
        return view('welcome', compact('pengumuman', 'kegiatan'))->with('user', $user);
    }
    public function beritaLainnya()
    {
        $breadcrumb = [
            'title' => 'Berita Lainnya',
            'list' => [
                [
                    'label' => 'Berita',
                    'dropdown' => true,
                    'links' => [
                        ['url' => route('home'), 'label' => 'Halaman Awal']
                    ]
                ],
            ]
        ];

        $pengumuman = Pengumuman::where('status_pengumuman', 'aktif')
            ->orderBy('tanggal', 'desc')
            ->paginate(10);

        return view('berita_lainnya', compact('breadcrumb', 'pengumuman'));
    }

    public function beritaShow($id)
    {
        $breadcrumb = [
            'title' => 'Detail Berita',
            'list' => [
                [
                    'label' => 'Berita',
                    'dropdown' => true,
                    'links' => [
                        ['title' => 'Home', 'url' => route('home')],
                        ['title' => 'Berita Lainnya', 'url' => route('berita_lainnya')],
                    ]
                ],
            ]
        ];

        $pengumuman = Pengumuman::findOrFail($id);

        return view('berita_detail', compact('breadcrumb', 'pengumuman'));
    }
}
