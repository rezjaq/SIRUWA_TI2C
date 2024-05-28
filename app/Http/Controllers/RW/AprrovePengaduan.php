<?php

namespace App\Http\Controllers\RW;

use App\Http\Controllers\Controller;
use App\Models\Aduan;
use Illuminate\Http\Request;

class AprrovePengaduan extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Menu Pengaduan Warga',
        ];

        $page = (object) [
            'title' => 'Mengelola Pengaduan'
        ];

        $activeMenu = 'pengaduan';

        $aduans = Aduan::where('status_aduan', 'pending')->get();

        return view('rw.pengaduan.index', compact('breadcrumb', 'page', 'activeMenu', 'aduans'));
    }

    public function approve($id)
    {
        $aduan = Aduan::findOrFail($id);
        $aduan->status_aduan = 'approved';
        $aduan->save();

        return redirect()->route('admin.pengaduan')->with('success', 'Pengaduan telah disetujui.');
    }

    public function reject($id)
    {
        $aduan = Aduan::findOrFail($id);
        $aduan->status_aduan = 'rejected';
        $aduan->save();

        return redirect()->route('admin.pengaduan')->with('success', 'Pengaduan telah ditolak.');
    }

}

