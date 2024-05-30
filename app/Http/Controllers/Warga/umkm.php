<?php

namespace App\Http\Controllers\Warga;

use App\Http\Controllers\Controller;
use App\Models\UsahaWarga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class umkm extends Controller
{
    public function index()
    {
        $breadcrumb = [
            'title' => 'Jenis Jenis UMKM Warga',
            'list' => [
                [
                    'label' => 'UMKM Warga',
                    'dropdown' => true,
                    'links' => [
                        ['url' => route('pengajuan'), 'label' => 'Daftar UMKM Warga'],
                        ['url' => route('umkm.create'), 'label' => 'Pengajuan UMKM']
                    ]
                ],
                ['label' => 'UMKM Warga', 'url' => route('umkm.create')]
            ]
        ];

        return view('warga.umkm.umkm', ['breadcrumb' => $breadcrumb]);
    }

    public function create()
    {
        $breadcrumb = [
            'title' => 'Jenis UMKM Warga',
            'list' => [
                [
                    'label' => 'Pengajuan UMKM Warga',
                    'dropdown' => true,
                    'links' => [
                        ['url' => route('pengajuan'), 'label' => 'Daftar UMKM Warga'],
                        ['url' => route('umkm.create'), 'label' => 'Pengajuan UMKM']
                    ]
                ],
                ['label' => 'Pengajuan UMKM', 'url' => route('umkm.create')]
            ]
        ];

        $user = Auth::user();

        return view('warga.umkm.pengajuan', ['breadcrumb' => $breadcrumb, 'user' => $user]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_usaha' => 'required',
            'jenis_usaha' => 'required',
            'alamat_usaha' => 'required',
            'nomer_telepon' => 'required',
            'harga' => 'required|numeric',
            'deskripsi' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg',
        ]);

        $usahaWarga = new UsahaWarga();
        $usahaWarga->nama_usaha = $request->nama_usaha;
        $usahaWarga->jenis_usaha = $request->jenis_usaha;
        $usahaWarga->alamat_usaha = $request->alamat_usaha;
        $usahaWarga->nomer_telepon = $request->nomer_telepon;
        $usahaWarga->harga = $request->harga;
        $usahaWarga->deskripsi = $request->deskripsi;
        $usahaWarga->nik_warga = Auth::user()->nik;
        $usahaWarga->status = 'pending';

        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('public/umkm');
            $usahaWarga->foto = str_replace('public/', '', $fotoPath); // Hanya simpan path relatif dari storage
        }

        $usahaWarga->save();

        return redirect()->route('pengajuan-umkm')->with('success', 'Pengajuan UMKM berhasil disimpan.');
    }



    public function show()
    {
        $breadcrumb = [
            'title' => 'Jenis Jenis UMKM Warga',
            'list' => [
                [
                    'label' => 'UMKM Warga',
                    'dropdown' => true,
                    'links' => [
                        ['url' => route('pengajuan'), 'label' => 'Daftar UMKM Warga'],
                        ['url' => route('umkm.create'), 'label' => 'Pengajuan UMKM']
                    ]
                ],
                ['label' => 'List UMKM Warga', 'url' => route('umkm.create')]
            ]
        ];

        // Corrected the query to fetch only approved records
        $usahaWarga = UsahaWarga::where('status', 'approved')->get();

        return view('warga.umkm.umkm', ['breadcrumb' => $breadcrumb, 'usahaWarga' => $usahaWarga]);
    }


}
