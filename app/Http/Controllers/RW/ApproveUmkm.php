<?php

namespace App\Http\Controllers\RW;

use App\Http\Controllers\Controller;
use App\Models\UsahaWarga;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApproveUmkm extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Menu Pengajuan UMKM Warga',
        ];

        $page = (object) [
            'title' => 'Mengelola Pengajuan'
        ];

        $activeMenu = 'pengajuan';
        $user = Auth::user();
        $warga = Warga::all();
        // Ambil data UsahaWarga dengan status pending
        $usahaWarga = UsahaWarga::where('status', 'pending')->get();

        return view('rw.pengajuan_umkm.index', compact('breadcrumb', 'page', 'activeMenu', 'usahaWarga', 'user', 'warga'));
    }
    public function approve($id)
    {
        $usahaWarga = UsahaWarga::findOrFail($id);
        $usahaWarga->status = 'approved';
        $usahaWarga->save();

        return redirect()->route('admin.pengajuan')->with('success', 'Pengajuan UMKM berhasil disetujui.');
    }

    public function reject($id)
    {
        $usahaWarga = UsahaWarga::findOrFail($id);
        $usahaWarga->status = 'rejected';
        $usahaWarga->save();

        return redirect()->route('admin.pengajuan')->with('success', 'Pengajuan UMKM berhasil ditolak.');
    }

    public function detail($id)
    {
        $breadcrumb = (object) [
            'title' => 'Menu UMKM Warga',
        ];

        $page = (object) [
            'title' => 'Mengelola UMKM'
        ];

        $activeMenu = 'umkm';
        $user = Auth::user();
        $usahaWarga = UsahaWarga::findOrFail($id);
        return view('rw.pengajuan_umkm.detail', compact('breadcrumb', 'page', 'activeMenu', 'usahaWarga', 'user'));
    }
}
