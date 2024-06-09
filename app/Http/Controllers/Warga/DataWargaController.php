<?php

namespace App\Http\Controllers\Warga;

use App\Http\Controllers\Controller;
use App\Models\Keluarga;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DataWargaController extends Controller
{
    public function index()
    {
        $breadcrumb = [
            'title' => 'Data Warga Wilayah RW 02',
            'list' => [
                [
                    'label' => 'Data Warga',
                    'dropdown' => true,
                    'links' => [
                        ['url' => route('warga.Warga.index'), 'label' => 'List Data Warga'],
                        ['url' => route('warga.Warga.create'), 'label' => 'Tambah Warga'],
                        ['url' => route('warga.Warga.edit'), 'label' => 'Vertifikasi Data Warga']
                    ]
                ],
                ['label' => 'List Data Warga', 'url' => route('warga.Warga.index')]
            ]
        ];

        // Ambil data warga dari database beserta informasi keluarga
        $wargas = Warga::with('keluarga:id_keluarga,nama_kepala_keluarga')
            ->where('status', 'disetujui')
            ->select('nama', 'jenis_kelamin', 'alamat', 'id_keluarga', 'no_rt')
            ->get();

        return view('warga.data_warga.index', compact('breadcrumb', 'wargas'));
    }

    public function create()
    {
        $breadcrumb = [
            'title' => 'Data Warga Wilayah RW 02',
            'list' => [
                [
                    'label' => 'Data Warga',
                    'dropdown' => true,
                    'links' => [
                        ['url' => route('warga.Warga.index'), 'label' => 'Daftar Warga'],
                        ['url' => route('warga.Warga.create'), 'label' => 'Tambah Warga'],
                        ['url' => route('warga.Warga.edit'), 'label' => 'Vertifikasi Data Warga']
                    ]
                ],
                ['label' => 'Tambah Warga', 'url' => route('warga.Warga.create')]
            ]
        ];

        $keluargas = Keluarga::all();

        return view('warga.data_warga.create', compact('breadcrumb', 'keluargas'));
    }



    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nik' => 'required|unique:warga,nik|digits:16',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'agama' => 'required',
            'id_keluarga' => 'required|exists:keluarga,id_keluarga',
            'no_rt' => 'required',
            'akte' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi untuk foto akte
        ]);

        // Handle file upload
        $aktePath = null;
        if ($request->hasFile('akte')) {
            $akte = $request->file('akte');
            $akteName = time() . '_' . $akte->getClientOriginalName();
            $aktePath = $akte->storeAs('public/akte', $akteName);
            $aktePath = str_replace('public/', '', $aktePath);
        }

        // Simpan data warga ke database
        Warga::create([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'agama' => $request->agama,
            'no_rt' => $request->no_rt,
            'id_keluarga' => $request->id_keluarga,
            'password' => $request->nik,
            'akte' => $aktePath, // Simpan nama file akte
            'verif' => 'tidak_terverifikasi',
        ]);

        return redirect()->route('warga.Warga.index')->with('success', 'Data warga berhasil ditambahkan. Data yang anda tambahkan akan diperiksa. Silahkan cek daftar warga untuk mengetahui data yang anda inputkan disetujui. Kalau dalam 2 hari data masih belum ada, silahkan isi kembali atau laporkan ke menu laporan.');
    }

    public function edit()
    {
        $breadcrumb = [
            'title' => 'Data Warga Wilayah RW 02',
            'list' => [
                [
                    'label' => 'Data Warga',
                    'dropdown' => true,
                    'links' => [
                        ['url' => route('warga.Warga.index'), 'label' => 'Daftar Warga'],
                        ['url' => route('warga.Warga.create'), 'label' => 'Tambah Warga'],
                        ['url' => route('warga.Warga.edit'), 'label' => 'Vertifikasi Data Warga']
                    ]
                ],
                ['label' => 'Vertifikasi Data Warga', 'url' => route('warga.Warga.edit')]
            ]
        ];

        $warga = Auth::user();
        $keluargas = Keluarga::all();

        return view('warga.data_warga.edit', compact('breadcrumb', 'warga', 'keluargas'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'nik' => 'required|unique:warga,nik,' . Auth::id() . ',nik',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'agama' => 'required',
            'no_rt' => 'required',
            'id_keluarga' => 'required|exists:keluarga,id_keluarga',
            'ktp' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $warga = Warga::find(Auth::user()->nik);

        // Update data
        $warga->update([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'agama' => $request->agama,
            'no_rt' => $request->no_rt,
            'id_keluarga' => $request->id_keluarga,
            'statusKawin' => $request->statusKawin,
            'pekerjaan' => $request->pekerjaan,
            'no_telepon' => $request->no_telepon,
            'verif' => 'belum_terverifikasi',
        ]);

        // Handle KTP upload
        if ($request->hasFile('ktp')) {
            if ($warga->ktp) {
                Storage::delete('public/' . $warga->ktp);
            }

            $ktp = $request->file('ktp');
            $ktpName = time() . '_' . $ktp->getClientOriginalName();
            $ktpPath = $ktp->storeAs('public/ktp_images', $ktpName);
            $ktpPath = str_replace('public/', '', $ktpPath);

            $warga->update(['ktp' => $ktpPath]);
        }

        return redirect()->route('warga.Warga.index')->with('success', 'Tunggu Verifikasi dari RT atau RW');
    }

}
