<?php

namespace App\Http\Controllers\RW;

use App\Http\Controllers\Controller;
use App\Models\Keluarga;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class KeluargaController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Menu Keluarga',
        ];

        $page = (object) [
            'title' => 'Mengelola Keluarga'
        ];

        $activeMenu = 'keluarga';

        $keluargas = Keluarga::all();

        return view('rw.keluarga.index', compact('breadcrumb', 'page', 'activeMenu', 'keluargas'));
    }

    public function list()
    {
        $keluarga = Keluarga::select('id_keluarga', 'nama_kepala_keluarga', 'no_kk', 'alamat', 'no_rt');

        return DataTables::of($keluarga)
            ->addIndexColumn()
            ->addColumn('aksi', function ($keluarga) {
                $btn = '<a href="' . route('keluarga.show', $keluarga->id_keluarga) . '" class="btn btn-primary btn-sm mr-1" style="width: 40px; height: 40px; margin-right: 5px;"><i class="fas fa-eye"></i></a>';
                $btn .= '<a href="' . route('keluarga.edit', $keluarga->id_keluarga) . '" class="btn btn-warning btn-sm mr-1" style="width: 40px; height: 40px; margin-right: 5px;"><i class="fas fa-edit"></i></a>';
                $btn .= '<form class="d-inline-block" method="POST" action="' . route('keluarga.destroy', $keluarga->id_keluarga) . '">' . csrf_field() . method_field('DELETE') . '<button type="submit" class="btn btn-danger btn-sm" style="width: 40px; height: 40px; margin-right: 5px;" onclick="return confirm(\'Apakah Anda Yakin Menghapus Data Ini? \');"><i class="fas fa-trash-alt"></i></button></form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Keluarga',
        ];
        $activeMenu = 'keluarga';
        return view('rw.keluarga.create', compact('breadcrumb', 'activeMenu'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_kepala_keluarga' => 'required',
            'no_kk' => 'required',
            'alamat' => 'required',
            'no_rt' => 'required'
        ]);

        // Simpan data keluarga baru
        $keluarga = new Keluarga();
        $keluarga->nama_kepala_keluarga = $request->nama_kepala_keluarga;
        $keluarga->no_kk = $request->no_kk;
        $keluarga->alamat = $request->alamat;
        $keluarga->no_rt = $request->no_rt;

        $keluarga->save();

        // Redirect ke halaman daftar keluarga dengan pesan sukses
        return redirect()->route('keluarga.index')->with('success', 'Keluarga berhasil ditambahkan.');
    }

    public function show($id)
    {
        $breadcrumb = (object) [
            'title' => 'Detail Keluarga',
            'list' => ['Home', 'Keluarga', 'Detail']
        ];

        $activeMenu = 'keluarga';

        $keluarga = Keluarga::findOrFail($id);

        return view('rw.keluarga.show', compact('breadcrumb', 'activeMenu', 'keluarga'));
    }

    public function edit($id)
    {
        $breadcrumb = (object) [
            'title' => 'Edit Keluarga',
            'list' => ['Home', 'Keluarga', 'Edit']
        ];
        $activeMenu = 'keluarga';

        $keluarga = Keluarga::findOrFail($id);

        return view('rw.keluarga.edit', compact('breadcrumb', 'activeMenu', 'keluarga'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama_kepala_keluarga' => 'required',
            'no_kk' => 'required',
            'alamat' => 'required',
            'no_rt' => 'required',
        ]);

        // Temukan keluarga berdasarkan ID
        $keluarga = Keluarga::findOrFail($id);

        // Update data keluarga
        $keluarga->nama_kepala_keluarga = $request->nama_kepala_keluarga;
        $keluarga->no_kk = $request->no_kk;
        $keluarga->alamat = $request->alamat;
        $keluarga->no_rt = $request->no_rt;

        $keluarga->save();

        // Redirect ke halaman daftar keluarga dengan pesan sukses
        return redirect()->route('keluarga.index')->with('success', 'Keluarga berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $keluarga = Keluarga::findOrFail($id);

        $keluarga->delete();

        return redirect()->route('keluarga.index')->with('success', 'Keluarga berhasil dihapus.');
    }
}
