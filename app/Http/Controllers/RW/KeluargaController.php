<?php

namespace App\Http\Controllers\RW;

use App\Http\Controllers\Controller;
use App\Models\Keluarga;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        $keluarga = Keluarga::select('id_keluarga', 'nama_kepala_keluarga', 'no_kk', 'alamat', 'no_rt')
            ->where('status', 'disetujui')
            ->get();
        ;

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
            'no_rt' => 'required',
            'kk' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        $kkPath = null;
        if ($request->hasFile('kk')) {
            $kkPath = $request->file('kk')->store('public/kk_images');
            $kkPath = str_replace('public/', '', $kkPath);
        }

        // Simpan data keluarga baru
        $keluarga = Keluarga::create([
            'nama_kepala_keluarga' => $request->nama_kepala_keluarga,
            'no_kk' => $request->no_kk,
            'alamat' => $request->alamat,
            'no_rt' => $request->no_rt,
            'kk' => $kkPath, // Simpan path gambar kk ke database
            'verif' => 'diverifikasi',
            'status' => 'disetujui',
        ]);


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

        $keluarga = Keluarga::with(['anggota' => function($query) {
            $query->orderBy('tanggal_lahir', 'asc');
        }])->findOrFail($id);

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
            'kk' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Temukan keluarga berdasarkan ID
        $keluarga = Keluarga::findOrFail($id);

        // Simpan gambar kk ke storage dan dapatkan pathnya
        if ($request->hasFile('kk')) {
            if ($keluarga->kk) {
                Storage::delete('public/' . $keluarga->kk);
            }

            $kk = $request->file('kk');
            $kkName = time() . '_' . $kk->getClientOriginalName();
            $kkPath = $kk->storeAs('public/kk_images', $kkName);
            $kkPath = str_replace('public/', '', $kkPath);

            $keluarga->update(['kk' => $kkPath]);
        } else {
            $kkPath = $keluarga->kk;
        }

        // Update the Keluarga data
        $keluarga->update([
            'nama_kepala_keluarga' => $request->nama_kepala_keluarga,
            'no_kk' => $request->no_kk,
            'alamat' => $request->alamat,
            'no_rt' => $request->no_rt,
            'kk' => $kkPath, // Simpan path gambar kk ke database
            'verif' => 'diverifikasi',
        ]);

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
