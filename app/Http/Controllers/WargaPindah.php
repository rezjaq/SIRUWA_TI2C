<?php

namespace App\Http\Controllers;

use App\Models\WargaPindahMasuk;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class WargaPindah extends Controller
{
    public function create()
    {
        $breadcrumb = [
            'title' => 'Warga Pindahan',
            'list' => [
                [
                    'label' => 'home',
                    'dropdown' => true,
                    'links' => [
                        ['title' => 'Home', 'url' => route('home')],
                        ['title' => 'Warga Pindahan', 'url' => route('wargaPindah.create')],
                    ]
                ],
            ]
        ];

        return view('warga_pindah', compact('breadcrumb'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nik' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'agama' => 'required',
            'statusKawin' => 'required',
            'no_rt' => 'required',
            'alamat_asal' => 'required',
            'tanggal_pindah' => 'required',
            'foto_ktp' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'foto_surat_pindah' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Simpan foto KTP jika diunggah
        $fotoKtpPath = null;
        if ($request->hasFile('foto_ktp')) {
            $fotoKtpPath = $request->file('foto_ktp')->store('public/foto_ktp');
        }

        // Simpan foto surat pindah jika diunggah
        $fotoSuratPindahPath = null;
        if ($request->hasFile('foto_surat_pindah')) {
            $fotoSuratPindahPath = $request->file('foto_surat_pindah')->store('public/foto_surat_pindah');
        }

        // Simpan data warga baru
        $warga = WargaPindahMasuk::create([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon,
            'agama' => $request->agama,
            'statusKawin' => $request->statusKawin,
            'pekerjaan' => $request->pekerjaan,
            'alamat_asal' => $request->alamat_asal,
            'tanggal_pindah' => $request->tanggal_pindah,
            'no_rt' => $request->no_rt,
            'alamat_asal' => $request->alamat_asal,
            'tanggal_pindah' => $request->tanggal_pindah,
            'foto_ktp' => $fotoKtpPath,
            'foto_surat_pindah' => $fotoSuratPindahPath,
            'status' => 'Proses',
        ]);

        return redirect()->route('wargaPindah.create')->with('success', 'Data berhasil ditambahkan tunggu konfirmasi oleh RT/RW setempat.');
    }
    
}
