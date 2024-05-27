<?php

namespace App\Http\Controllers\Warga;

use App\Http\Controllers\Controller;
use App\Models\Keluarga;
use Illuminate\Http\Request;

class DataKeluargaController extends Controller
{
    public function index()
    {
        $breadcrumb = [
            'title' => 'Daftar Data Keluarga Wilayah RW 02',
            'list' => [
                [
                    'label' => 'Data Keluarga',
                    'dropdown' => true,
                    'links' => [
                        ['url' => route('warga.keluarga.index'), 'label' => 'Daftar Data Keluarga'],
                        ['url' => route('warga.keluarga.create'), 'label' => 'Tambah Data Keluarga']
                    ]
                ],
                ['label' => 'Daftar Data Keluarga', 'url' => route('warga.keluarga.index')]
            ]
        ];

        // Ambil data keluarga dari database
        $keluargas = Keluarga::select('id_keluarga', 'nama_kepala_keluarga', 'alamat', 'no_rt')->get();

        return view('warga.data_keluarga.index', compact('breadcrumb', 'keluargas'));
    }
    public function create()
    {
        $breadcrumb = [
            'title' => 'Daftar Data Keluarga Wilayah RW 02',
            'list' => [
                [
                    'label' => 'Data Keluarga',
                    'dropdown' => true,
                    'links' => [
                        ['url' => route('warga.keluarga.index'), 'label' => 'Daftar Data Keluarga'],
                        ['url' => route('warga.keluarga.create'), 'label' => 'Tambah Data Keluarga']
                    ]
                ],
                ['label' => 'Tambah Data Keluarga', 'url' => route('warga.keluarga.create')]
            ]
        ];

        return view('warga.data_keluarga.create', compact('breadcrumb'));
    }

    // Metode untuk menyimpan data keluarga baru
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

        // Simpan gambar kk ke storage dan dapatkan pathnya
        $kkPath = null;
        if ($request->hasFile('kk')) {
            $kkPath = $request->file('kk')->store('kk_images');
        }

        // Simpan data keluarga ke database
        Keluarga::create([
            'nama_kepala_keluarga' => $request->nama_kepala_keluarga,
            'no_kk' => $request->no_kk,
            'alamat' => $request->alamat,
            'no_rt' => $request->no_rt,
            'kk' => $kkPath, // Simpan path gambar kk ke database
        ]);

        return redirect()->route('warga.keluarga.index')->with('success', 'Data keluarga berhasil ditambahkan.');
    }
}
