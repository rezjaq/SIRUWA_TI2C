<?php

namespace App\Http\Controllers\Warga;

use App\Http\Controllers\Controller;
use App\Models\Keluarga;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
                ['label' => 'List Data Keluarga', 'url' => route('warga.keluarga.index')]
            ]
        ];

        // Ambil data keluarga dari database yang statusnya disetujui
        $keluargas = Keluarga::select('id_keluarga', 'nama_kepala_keluarga', 'alamat', 'no_rt')
            ->where('status', 'disetujui')
            ->get();

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
        $wargas = Warga::select('nik', 'nama')
            ->where('verif', 'terverifikasi')
            ->whereNotIn('nama', function ($query) {
                $query->select('nama_kepala_keluarga')
                    ->from('keluarga')
                    ->whereIn('status', ['disetujui', 'belum_disetujui']); // tambahkan kondisi untuk memeriksa data yang belum disetujui juga
            })
            ->get();



        return view('warga.data_keluarga.create', compact('breadcrumb', 'wargas'));
    }

    // Metode untuk menyimpan data keluarga baru
    public function store(Request $request)
    {
        // Validasi input dasar
        $request->validate([
            'nama_kepala_keluarga' => 'required',
            'no_kk' => 'required',
            'alamat' => 'required',
            'no_rt' => 'required',
            'kk' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Ambil daftar nama dari tabel warga
        $namaWargas = Warga::pluck('nama')->toArray();

        // Validasi bahwa nama_kepala_keluarga ada dalam daftar nama warga
        if (!in_array($request->nama_kepala_keluarga, $namaWargas)) {
            return back()->withErrors(['nama_kepala_keluarga' => 'Nama Kepala Keluarga tidak valid. Nama tersebut harus berasal dari data warga.'])->withInput();
        }

        // Simpan gambar kk ke storage dan dapatkan pathnya
        $kkPath = null;
        if ($request->hasFile('kk')) {
            $kkPath = $request->file('kk')->store('public/kk_images');
            $kkPath = str_replace('public/', '', $kkPath);
        }

        // Simpan data keluarga ke database
        $keluarga = Keluarga::create([
            'nama_kepala_keluarga' => $request->nama_kepala_keluarga,
            'no_kk' => $request->no_kk,
            'alamat' => $request->alamat,
            'no_rt' => $request->no_rt,
            'kk' => $kkPath, // Simpan path gambar kk ke database
            'verif' => 'belum_diverifikasi',
        ]);

        // Update id_keluarga dari warga yang menjadi kepala keluarga
        $kepalaKeluarga = Warga::where('nama', $request->nama_kepala_keluarga)->first();
        if ($kepalaKeluarga) {
            $kepalaKeluarga->previous_id_keluarga = $kepalaKeluarga->id_keluarga; // Simpan id_keluarga sebelumnya
            $kepalaKeluarga->id_keluarga = $keluarga->id_keluarga;
            $kepalaKeluarga->save();
        }

        return redirect()->route('warga.keluarga.index')->with('success', 'Data Keluarga berhasil ditambahkan. Data yang anda tambahkan akan diperiksa. Silahkan cek daftar warga untuk mengetahui data yang anda inputkan disetujui. Kalau dalam 2 hari data masih belum ada, silahkan isi kembali atau laporkan ke menu laporan.');
    }

    public function edit()
    {
        $breadcrumb = [
            'title' => 'Daftar Data Keluarga Wilayah RW 02',
            'list' => [
                [
                    'label' => 'Data Keluarga',
                    'dropdown' => true,
                    'links' => [
                        ['url' => route('warga.keluarga.index'), 'label' => 'Daftar Data Keluarga'],
                        ['url' => route('warga.keluarga.create'), 'label' => 'Tambah Data Keluarga'],
                        ['url' => route('warga.keluarga.update'), 'label' => 'Update Data Keluarga'],
                    ]
                ],
                ['label' => 'Update Data Keluarga', 'url' => route('warga.keluarga.update')]
            ]
        ];

        // Get the authenticated Warga user
        $warga = Auth::user();

        // Load the related Keluarga data
        $keluarga = $warga->keluarga;

        return view('warga.data_keluarga.edit', compact('breadcrumb', 'keluarga'));
    }

    public function update(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_kepala_keluarga' => 'required',
            'no_kk' => 'required',
            'alamat' => 'required',
            'no_rt' => 'required',
            'kk' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Get the authenticated Warga user
        $warga = Auth::user();

        // Load the related Keluarga data
        $keluarga = $warga->keluarga;

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
            'verif' => 'belum_diverifikasi',
        ]);

        return redirect()->route('warga.keluarga.index')->with('success', 'Data keluarga berhasil diperbarui.');
    }
}
