<?php

namespace App\Http\Controllers\RW;

use App\Http\Controllers\Controller;
use App\Models\WargaPindahMasuk;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class WargaPindah extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Menu Warga Pindahan',
        ];

        $page = (object) [
            'title' => 'Mengelola Warga Pindahan'
        ];

        $activeMenu = 'WargaPindah';

        $wargas = WargaPindahMasuk::all();

        return view('rw.warga_pindah.index', compact('breadcrumb', 'page', 'activeMenu', 'wargas'));
    }

    public function list()
    {
        $warga = WargaPindahMasuk::select(
            'id_wargaPindahMasuk',
            'nama',
            'nik',
            'jenis_kelamin',
            'tanggal_lahir',
            'alamat',
            'no_telepon',
            'agama',
            'statusKawin',
            'pekerjaan',
            'no_rt',
            'alamat_asal',
            'tanggal_pindah',
        )
            ->where('status', 'Selesai');

        return DataTables::of($warga)
            ->addIndexColumn()
            ->addColumn('aksi', function ($warga) {
                $btn = '<a href="' . route('WargaPindah.show', $warga->id_wargaPindahMasuk) . '" class="btn btn-primary btn-sm mr-1" style="width: 40px; height: 40px; margin-right: 5px;"><i class="fas fa-eye"></i></a>';
                $btn .= '<a href="' . route('WargaPindah.edit', $warga->id_wargaPindahMasuk) . '" class="btn btn-warning btn-sm mr-1" style="width: 40px; height: 40px; margin-right: 5px;"><i class="fas fa-edit"></i></a>';
                $btn .= '<form class="d-inline-block" method="POST" action="' . route('WargaPindah.destroy', $warga->id_wargaPindahMasuk) . '">' . csrf_field() . method_field('DELETE') . '<button type="submit" class="btn btn-danger btn-sm" style="width: 40px; height: 40px; margin-right: 5px;" onclick="return confirm(\'Apakah Anda Yakin Menghapus Data Ini? \');"><i class="fas fa-trash-alt"></i></button></form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }
    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Warga Pindahan',
        ];
        $activeMenu = 'wargaPindah';
        $wargas = new WargaPindahMasuk();

        return view('rw.warga_pindah.create', compact('breadcrumb', 'activeMenu', 'wargas'));
    }


    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'nik' => 'required|unique:warga_pindah_masuk,nik|digits:16',
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

        // Save KTP photo if uploaded
        $fotoKtpPath = null;
        if ($request->hasFile('foto_ktp')) {
            $fotoKtpPath = $request->file('foto_ktp')->store('public/foto_ktp');
            $fotoKtpPath = str_replace('public/', '', $fotoKtpPath);
        }

        // Save Surat Pindah photo if uploaded
        $fotoSuratPindahPath = null;
        if ($request->hasFile('foto_surat_pindah')) {
            $fotoSuratPindahPath = $request->file('foto_surat_pindah')->store('public/foto_surat_pindah');
            $fotoSuratPindahPath = str_replace('public/', '', $fotoSuratPindahPath);
        }

        // Save new resident data
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
            'foto_ktp' => $fotoKtpPath,
            'foto_surat_pindah' => $fotoSuratPindahPath,
            'status' => 'Selesai',
        ]);

        return redirect()->route('WargaPindah.index')->with('success', 'Warga berhasil ditambahkan.');
    }


    public function show($id_wargaPindahMasuk)
    {
        $breadcrumb = (object) [
            'title' => 'Detail Warga Pindahan',
            'list' => ['Home', 'Warga pindah', 'Detail']
        ];

        $activeMenu = 'WargaPindah';

        $warga = WargaPindahMasuk::where('status', 'Selesai')->findOrFail($id_wargaPindahMasuk);

        return view('rw.warga_pindah.show', compact('breadcrumb', 'activeMenu', 'warga'));
    }

    public function edit($id_wargaPindahMasuk)
    {
        $breadcrumb = (object) [
            'title' => 'Edit Warga',
            'list' => ['Home', 'Warga', 'Edit']
        ];
        $activeMenu = 'WargaPindah';

        $warga = WargaPindahMasuk::findOrFail($id_wargaPindahMasuk);

        return view('rw.warga_pindah.edit', compact('breadcrumb', 'activeMenu', 'warga'));
    }

    public function update(Request $request, $id_wargaPindahMasuk)
    {
        // Temukan warga pindah berdasarkan id
        $warga = WargaPindahMasuk::findOrFail($id_wargaPindahMasuk);

        // Validasi input
        $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'agama' => 'required',
            'statusKawin' => 'required',
            'no_rt' => 'required',
            'alamat_asal' => 'required',
            'tanggal_pindah' => 'required',
        ]);

        // Simpan foto akte jika ada
        $fotoKtpPath = null;
        if ($request->hasFile('foto_ktp')) {
            $fotoKtpPath = $request->file('foto_ktp')->store('foto_ktp');
        }

        // Simpan foto surat pindah jika ada
        $fotoSuratPindahPath = null;
        if ($request->hasFile('foto_surat_pindah')) {
            $fotoSuratPindahPath = $request->file('foto_surat_pindah')->store('foto_surat_pindah');
        }

        // Update data warga pindah
        $warga->nama = $request->nama;
        $warga->jenis_kelamin = $request->jenis_kelamin;
        $warga->tanggal_lahir = $request->tanggal_lahir;
        $warga->alamat = $request->alamat;
        $warga->agama = $request->agama;
        $warga->statusKawin = $request->statusKawin;
        $warga->pekerjaan = $request->pekerjaan;
        $warga->no_rt = $request->no_rt;
        $warga->alamat_asal = $request->alamat_asal;
        $warga->tanggal_pindah = $request->tanggal_pindah;
        $warga->foto_ktp = $fotoKtpPath ? $fotoKtpPath : $warga->foto_ktp; // Tetapkan nilai sebelumnya jika tidak ada perubahan
        $warga->foto_surat_pindah = $fotoSuratPindahPath ? $fotoSuratPindahPath : $warga->foto_surat_pindah; // Tetapkan nilai sebelumnya jika tidak ada perubahan
        $warga->save();

        // Redirect ke halaman daftar warga pindah dengan pesan sukses
        return redirect()->route('WargaPindah.index')->with('success', 'Warga pindah berhasil diperbarui.');
    }
    public function destroy($id_wargaPindahMasuk)
    {
        $warga = WargaPindahMasuk::findOrFail($id_wargaPindahMasuk);

        $warga->delete();

        return redirect()->route('WargaPindah.index')->with('success', 'Warga berhasil dihapus.');
    }
}
