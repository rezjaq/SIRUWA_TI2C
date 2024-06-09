<?php

namespace App\Http\Controllers\RT;

use App\Http\Controllers\Controller;
use App\Models\WargaPindahMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class VerifikasiWargaPindah extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Menu Warga Pindahan',
        ];

        $page = (object) [
            'title' => 'Mengelola Warga Pindahan'
        ];

        $activeMenu = 'Verifikasi Warga Pindah';

        $userNoRT = Auth::user()->no_rt;
        $wargas = WargaPindahMasuk::where('no_rt', $userNoRT)->get();

        return view('rt.verifikasi_wargaPindah.index', compact('breadcrumb', 'page', 'activeMenu', 'wargas'));
    }
    public function list()
    {
        $userNoRT = Auth::user()->no_rt;
        $warga = WargaPindahMasuk::select(
            'id_wargaPindahMasuk',
            'nik',
            'nama',
            'jenis_kelamin',
            'alamat',
            'no_telepon',
            'no_rt',
            'alamat_asal',
            'tanggal_pindah',

        )
            ->where('status','Proses')
            ->where('no_rt', $userNoRT);

        return DataTables::of($warga)
            ->addIndexColumn()
            ->addColumn('aksi', function ($warga) {
                $btn = '<a href="' . route('RTverifikasiWargaPindah.show', $warga->id_wargaPindahMasuk) . '" class="btn btn-primary btn-sm mr-1" style="width: 40px; height: 40px; margin-right: 5px;"><i class="fas fa-eye"></i></a>';
                $btn .= '<form class="d-inline-block" method="POST" action="' . route('RTverifikasiWargaPindah.approve', $warga->id_wargaPindahMasuk) . '">' . csrf_field() . '<button type="submit" class="btn btn-success btn-sm" style="width: 40px; height: 40px; margin-right: 5px;" onclick="return confirm(\'Apakah Anda yakin menyetujui data ini?\');"><i class="fas fa-check"></i></button></form>';
                $btn .= '<form class="d-inline-block" method="POST" action="' . route('RTverifikasiWargaPindah.reject', $warga->id_wargaPindahMasuk) . '">' . csrf_field() . '<button type="submit" class="btn btn-danger btn-sm" style="width: 40px; height: 40px; margin-right: 5px;" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');"><i class="fas fa-times"></i></button></form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function show($id_wargaPindahMasuk)
    {
        $breadcrumb = (object) [
            'title' => 'Detail Warga Pindahan',
            'list' => ['Home', 'Warga pindah', 'Detail']
        ];

        $activeMenu = 'Warga Pindah';

        $warga = WargaPindahMasuk::findOrFail($id_wargaPindahMasuk);

        return view('rt.verifikasi_wargaPindah.show', compact('breadcrumb', 'activeMenu', 'warga'));
    }

    public function approve($id_wargaPindahMasuk)
    {
        // Temukan warga pindahan berdasarkan ID
        $warga = WargaPindahMasuk::findOrFail($id_wargaPindahMasuk);

        // Ubah status menjadi 'Selesai'
        $warga->status = 'Selesai';
        $warga->save();

        // Redirect dengan pesan sukses
        return redirect()->route('RTverifikasiWargaPindah.index')->with('success', 'Status warga pindahan berhasil diubah menjadi Selesai.');
    }

    public function reject($id_wargaPindahMasuk)
    {
        // Temukan warga pindahan berdasarkan ID
        $warga = WargaPindahMasuk::findOrFail($id_wargaPindahMasuk);

        // Hapus data warga pindahan
        $warga->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('RTverifikasiWargaPindah.index')->with('success', 'Data warga pindahan berhasil dihapus.');
    }
}
