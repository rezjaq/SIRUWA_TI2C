<?php

namespace App\Http\Controllers\RW;

use App\Http\Controllers\Controller;
use App\Models\Warga;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DataRT extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Menu RT',
        ];

        $page = (object) [
            'title' => 'Mengelola RT'
        ];

        $activeMenu = 'Data RT';

        // Menampilkan hanya warga dengan level RT
        $wargas = Warga::where('level', 'RT')->get();

        return view('rw.dataRT.index', compact('breadcrumb', 'page', 'activeMenu', 'wargas'));
    }

    public function list()
    {
        $warga = Warga::select('nik', 'nama', 'jenis_kelamin', 'alamat', 'no_telepon', 'no_rt')
            ->where('status', 'disetujui')
            ->where('level', 'RT'); // Menampilkan hanya warga dengan level RT

        return DataTables::of($warga)
            ->addIndexColumn()
            ->addColumn('aksi', function ($warga) {
                $btn = '<form class="d-inline-block" method="POST" action="' . route('DataRT.removeRT', $warga->nik) . '">' . csrf_field() . method_field('PUT') . '<button type="submit" class="btn btn-danger btn-sm" style="width: 40px; height: 40px; margin-right: 5px;" onclick="return confirm(\'Apakah Anda Yakin Melepas Jabatan RT untuk Warga Ini?\');"><i class="fas fa-user-slash"></i></button></form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Data RT',
        ];

        $page = (object) [
            'title' => 'Tambah Data RT'
        ];

        $activeMenu = 'Data RT';

        // Ambil daftar warga yang belum menjadi RT
        $wargas = Warga::where('level', '<>', 'RT')->get();

        return view('rw.dataRT.create', compact('breadcrumb', 'page', 'activeMenu', 'wargas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required',
            'no_rt' => 'required',
        ]);

        $warga = Warga::findOrFail($request->nik);

        // Update level dan nomor RT warga
        $warga->level = 'RT';
        $warga->no_rt = $request->no_rt;
        $warga->save();

        return redirect()->route('DataRT.index')->with('success', 'Data RT berhasil ditambahkan.');
    }
    
    public function removeRT($nik)
    {
        $warga = Warga::findOrFail($nik);

        // Update level warga menjadi 'Warga'
        $warga->level = 'warga';
        $warga->save();

        return redirect()->route('DataRT.index')->with('success', 'Jabatan RT berhasil dilepas untuk warga tersebut.');
    }
}
