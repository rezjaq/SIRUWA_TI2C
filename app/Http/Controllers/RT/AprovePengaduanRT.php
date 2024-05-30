<?php

namespace App\Http\Controllers\RT;

use App\Http\Controllers\Controller;
use App\Models\Aduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AprovePengaduanRT extends Controller
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

        // Mendapatkan no_rt dari pengguna yang sedang login
        $userNoRT = Auth::user()->no_rt;

        // Mendapatkan aduan dari warga RT saat ini yang memiliki status pending
        $aduans = Aduan::whereHas('warga', function ($query) use ($userNoRT) {
            $query->where('no_rt', $userNoRT);
        })
            ->where('status_aduan', 'pending')
            ->get();

        return view('rt.pengaduan.index', compact('breadcrumb', 'page', 'activeMenu', 'aduans'));
    }

    public function approve($id)
    {
        $aduan = Aduan::findOrFail($id);
        $aduan->status_aduan = 'approved';
        $aduan->save();

        return redirect()->route('RT.pengaduan.index')->with('success', 'Pengaduan telah disetujui.');
    }

    public function reject($id)
    {
        $aduan = Aduan::findOrFail($id);
        $aduan->status_aduan = 'rejected';
        $aduan->save();

        return redirect()->route('RT.pengaduan.index')->with('success', 'Pengaduan telah ditolak.');
    }
}
