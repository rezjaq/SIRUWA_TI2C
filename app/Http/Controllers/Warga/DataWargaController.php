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
        $breadcrumb = (object) [
            'title' => 'Dashboard Warga',
        ];

        $page = (object) [
            'title' => 'Lihat Data Warga'   
        ];

        $activeMenu = 'dashboard_warga';

        // Ambil data warga dari database beserta informasi keluarga
        $wargas = Warga::with('keluarga:id_keluarga,nama_kepala_keluarga')
            ->where('status', 'disetujui')
            ->select('nama', 'jenis_kelamin', 'alamat', 'id_keluarga', 'no_rt')
            ->get();

        return view('warga.data_warga.index', compact('breadcrumb', 'page', 'activeMenu', 'wargas'));
    }

    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Data Warga',
        ];

        $page = (object) [
            'title' => 'Tambah Data Warga'
        ];

        $activeMenu = 'tambah_data_warga';

        $keluargas = Keluarga::all();

        return view('warga.data_warga.create', compact('breadcrumb', 'page', 'activeMenu', 'keluargas'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nik' => 'required|unique:warga',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'agama' => 'required', // Menambah validasi untuk foto akte
            'id_keluarga' => 'required|exists:keluarga,id_keluarga',
            'no_rt' => 'required',
        ]);



        // Simpan data warga ke database
        Warga::create([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'agama' => $request->agama,
            'no_rt' => $request->no_rt,
            'id_keluarga' => $request->id_keluarga
        ]);

        return redirect()->route('warga.Warga.index')->with('success', 'Data warga berhasil ditambahkan. Data yang anda tambahkan akan diperiksa. Silahkan cek daftar warga untuk mengetahui data yang anda inputkan disetujui. Kalau dalam 2 hari data masih belum ada, silahkan isi kembali atau laporkan ke menu laporan.');

    }
    

    public function edit()
    {
        $breadcrumb = (object) [
            'title' => 'Edit Data Warga',
        ];

        $page = (object) [
            'title' => 'Edit Data Warga'
        ];

        $activeMenu = 'edit_data_warga';

        $warga = Auth::user();
        $keluargas = Keluarga::all();

        return view('warga.data_warga.edit', compact('breadcrumb', 'page', 'activeMenu', 'warga', 'keluargas'));
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

        if ($request->hasFile('ktp')) {
            if ($warga->ktp) {
                Storage::delete($warga->ktp);
            }

            $path = $request->file('ktp')->store('ktp_images');
            $warga->ktp = $path;
            $warga->save();
        }

        return redirect()->route('warga.Warga.index')->with('success', 'Data warga berhasil diperbarui.');
    }
}
