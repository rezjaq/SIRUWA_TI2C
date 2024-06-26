<?php

namespace App\Http\Controllers\RT;

use App\Http\Controllers\Controller;
use App\Models\Keluarga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class KeluargaController extends Controller
{
    public function index()
    {
        // $breadcrumb = (object) [
        //     'title' => 'Menu Keluarga',
        // ];

        $page = (object) [
            'title' => 'Mengelola Keluarga'
        ];

        $activeMenu = 'family';

        $userNoRT = Auth::user()->no_rt;
        $keluargas = Keluarga::where('no_rt', $userNoRT)->get();

        return view('rt.family.index', compact('page', 'activeMenu', 'keluargas'));
    }

    public function list()
    {
        $userNoRT = Auth::user()->no_rt;
        $keluarga = Keluarga::select('id_keluarga', 'nama_kepala_keluarga', 'no_kk', 'alamat', 'no_rt')
            ->where('status', 'disetujui')
            ->where('no_rt', $userNoRT)
            ->get();
        ;

        return DataTables::of($keluarga)
            ->addIndexColumn()
            ->addColumn('aksi', function ($keluarga) {
                $btn = '<a href="' . route('family.show', $keluarga->id_keluarga) . '" class="btn btn-primary btn-sm mr-1" style="width: 40px; height: 40px; margin-right: 5px;"><i class="fas fa-eye"></i></a>';
                $btn .= '<a href="' . route('family.edit', $keluarga->id_keluarga) . '" class="btn btn-warning btn-sm mr-1" style="width: 40px; height: 40px; margin-right: 5px;"><i class="fas fa-edit"></i></a>';
                $btn .= '<form class="d-inline-block" method="POST" action="' . route('family.destroy', $keluarga->id_keluarga) . '">' . csrf_field() . method_field('DELETE') . '<button type="submit" class="btn btn-danger btn-sm" style="width: 40px; height: 40px; margin-right: 5px;" onclick="return confirm(\'Apakah Anda Yakin Menghapus Data Ini? \');"><i class="fas fa-trash-alt"></i></button></form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create()
    {

        $activeMenu = 'keluarga';
        return view('rt.family.create', compact('activeMenu'));
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
            $kkPath = $request->file('kk')->store('kk_images');
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
        return redirect()->route('family.index')->with('success', 'Keluarga berhasil ditambahkan.');
    }

    public function show($id)
    {
        $activeMenu = 'keluarga';

        $keluarga = Keluarga::with('anggota')->findOrFail($id);

        return view('rt.family.show', compact('activeMenu', 'keluarga'));
    }

    public function edit($id)
    {
        $activeMenu = 'keluarga';

        $keluarga = Keluarga::findOrFail($id);

        return view('rt.family.edit', compact('activeMenu', 'keluarga'));
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
            // Delete the old image if it exists
            if ($keluarga->kk) {
                Storage::delete($keluarga->kk);
            }
            $kkPath = $request->file('kk')->store('kk_images');
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
        return redirect()->route('family.index')->with('success', 'Keluarga berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $keluarga = Keluarga::findOrFail($id);

        $keluarga->delete();

        return redirect()->route('family.index')->with('success', 'Keluarga berhasil dihapus.');
    }
}
