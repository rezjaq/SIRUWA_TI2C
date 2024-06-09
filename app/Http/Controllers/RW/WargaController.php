<?php

namespace App\Http\Controllers\RW;

use App\Http\Controllers\Controller;
use App\Models\Keluarga;
use App\Models\Warga;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class WargaController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Menu Warga',
        ];

        $page = (object) [
            'title' => 'Mengelola Warga'
        ];

        $activeMenu = 'Warga';

        $wargas = Warga::all();

        return view('rw.warga.index', compact('breadcrumb', 'page', 'activeMenu', 'wargas'));
    }

    public function list()
    {
        $warga = Warga::select('nik', 'nama', 'jenis_kelamin', 'tanggal_lahir', 'alamat', 'no_telepon', 'agama', 'statusKawin', 'pekerjaan', 'no_rt')
            ->where('status', 'disetujui');;

        return DataTables::of($warga)
            ->addIndexColumn()
            ->addColumn('aksi', function ($warga) {
                $btn = '<a href="' . route('Warga.show', $warga->nik) . '" class="btn btn-primary btn-sm mr-1" style="width: 40px; height: 40px; margin-right: 5px;"><i class="fas fa-eye"></i></a>';
                $btn .= '<a href="' . route('Warga.edit', $warga->nik) . '" class="btn btn-warning btn-sm mr-1" style="width: 40px; height: 40px; margin-right: 5px;"><i class="fas fa-edit"></i></a>';
                $btn .= '<form class="d-inline-block" method="POST" action="' . route('Warga.destroy', $warga->nik) . '">' . csrf_field() . method_field('DELETE') . '<button type="submit" class="btn btn-danger btn-sm" style="width: 40px; height: 40px; margin-right: 5px;" onclick="return confirm(\'Apakah Anda Yakin Menghapus Data Ini? \');"><i class="fas fa-trash-alt"></i></button></form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function listDeceased()
    {
        $warga = Warga::select('nik', 'nama', 'jenis_kelamin', 'tanggal_lahir', 'alamat', 'no_telepon', 'agama', 'statusKawin', 'pekerjaan', 'no_rt')
            ->where('status', 'tidak_disetujui');

        return DataTables::of($warga)
            ->addIndexColumn()
            ->addColumn('aksi', function ($warga) {
                $btn = '<a href="' . route('Warga.show', $warga->nik) . '" class="btn btn-primary btn-sm mr-1" style="width: 40px; height: 40px; margin-right: 5px;"><i class="fas fa-eye"></i></a>';
                $btn .= '<a href="' . route('Warga.edit', $warga->nik) . '" class="btn btn-warning btn-sm mr-1" style="width: 40px; height: 40px; margin-right: 5px;"><i class="fas fa-edit"></i></a>';
                $btn .= '<form class="d-inline-block" method="POST" action="' . route('Warga.destroy', $warga->nik) . '">' . csrf_field() . method_field('DELETE') . '<button type="submit" class="btn btn-danger btn-sm" style="width: 40px; height: 40px; margin-right: 5px;" onclick="return confirm(\'Apakah Anda Yakin Menghapus Data Ini? \');"><i class="fas fa-trash-alt"></i></button></form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }


    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Warga',
        ];
        $activeMenu = 'warga';

        // Mendapatkan daftar keluarga yang sudah ada
        $keluargas = Keluarga::all();

        return view('rw.warga.create', compact('breadcrumb', 'activeMenu', 'keluargas'));
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
            'statusKawin' => 'required',
            'no_rt' => 'required',
            'password' => 'required',
            'id_keluarga' => 'required|exists:keluarga,id_keluarga',
            'akte' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'ktp' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Simpan akte jika diunggah
        $aktePath = null;
        if ($request->hasFile('akte')) {
            $akte = $request->file('akte');
            $akteName = time() . '_' . $akte->getClientOriginalName();
            $aktePath = $akte->storeAs('public/akte', $akteName);
            $aktePath = str_replace('public/', '', $aktePath);
        }

        // Simpan KTP jika diunggah
        $ktpPath = null;
        if ($request->hasFile('ktp')) {
            $ktpPath = $request->file('ktp')->store('public/ktp_images');
            $ktp = $request->file('ktp');
            $ktpName = time() . '_' . $ktp->getClientOriginalName();
            $ktpPath = $ktp->storeAs('public/ktp_images', $ktpName);
            $ktpPath = str_replace('public/', '', $ktpPath);
        }

        // Tentukan verifikasi berdasarkan keberadaan foto KTP atau Akte
        $verifikasi = 'belum_terverifikasi';
        $sts = 'belum_disetujui';
        if ($ktpPath) {
            $verifikasi = 'terverifikasi';
            $sts = 'disetujui';
        }
        if ($aktePath) {
            $sts = 'disetujui';
            $verifikasi = 'tidak_terverifikasi';
        }

        // Simpan data warga baru
        $warga = Warga::create([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon,
            'agama' => $request->agama,
            'statusKawin' => $request->statusKawin,
            'pekerjaan' => $request->pekerjaan,
            'no_rt' => $request->no_rt,
            'password' => $request->password,
            'id_keluarga' => $request->id_keluarga,
            'akte' => $aktePath,
            'ktp' => $ktpPath,
            'verif' => $verifikasi,
            'status' => $sts,
        ]);

        return redirect()->route('Warga.index')->with('success', 'Warga berhasil ditambahkan.');
    }

    public function show($nik)
    {
        $breadcrumb = (object) [
            'title' => 'Detail Warga',
            'list' => ['Home', 'Warga', 'Detail']
        ];

        $activeMenu = 'Warga';

        $warga = Warga::findOrFail($nik);

        return view('rw.warga.show', compact('breadcrumb', 'activeMenu', 'warga'));
    }

    public function edit($nik)
    {
        $breadcrumb = (object) [
            'title' => 'Edit Warga',
            'list' => ['Home', 'Warga', 'Edit']
        ];
        $activeMenu = 'Warga';

        $warga = Warga::findOrFail($nik);
        $keluargas = Keluarga::all();

        return view('rw.warga.edit', compact('breadcrumb', 'activeMenu', 'warga', 'keluargas'));
    }

    public function update(Request $request, $nik)
    {
        // Find the resident based on NIK
        $resident = Warga::findOrFail($nik);

        // Validate input
        $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'agama' => 'required',
            'statusKawin' => 'required',
            'no_rt' => 'required',
            'password' => 'required',
            'level' => 'required',
            'id_keluarga' => 'required|exists:keluarga,id_keluarga'
        ]);

        // Save AKTE if available
        $aktePath = null;
        if ($request->hasFile('akte')) {
            $aktePath = $request->file('akte')->store('public/akte_images');
            $aktePath = str_replace('public/', '', $aktePath);
        }

        // Save KTP if available
        $ktpPath = null;
        if ($request->hasFile('ktp')) {
            $ktpPath = $request->file('ktp')->store('public/ktp_images');
            $ktpPath = str_replace('public/', '', $ktpPath);
        }

        // Update resident data
        $resident->update([
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon,
            'agama' => $request->agama,
            'statusKawin' => $request->statusKawin,
            'pekerjaan' => $request->pekerjaan,
            'no_rt' => $request->no_rt,
            'level' => $request->level,
            'id_keluarga' => $request->id_keluarga,
            'akte' => $aktePath ?? $resident->akte, // Retain previous value if no change
            'ktp' => $ktpPath ?? $resident->ktp, // Retain previous value if no change
            'verif' => $request->verif,
            'status' => $request->status,
            'password' => $request->status === 'tidak_disetujui' ? null : $request->password, // Nullify password if status is not approved
        ]);

        // Redirect ke halaman daftar warga dengan pesan sukses
        return redirect()->route('Warga.index')->with('success', 'Warga berhasil diperbarui.');
    }



    public function destroy($nik)
    {
        $warga = Warga::findOrFail($nik);

        $warga->delete();

        return redirect()->route('Warga.index')->with('success', 'Warga berhasil dihapus.');
    }
}
