<?php

namespace App\Http\Controllers\RT;

use App\Http\Controllers\Controller;
use App\Models\Keluarga;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        $activeMenu = 'citizen';

        $wargas = warga::all();

        return view('rt.citizen.index', compact('breadcrumb', 'page', 'activeMenu', 'wargas'));
    }

    public function list()
    {
        // Dapatkan RT pengguna yang sedang login
        $userNoRT = Auth::user()->no_rt;

        // Ambil data warga yang sesuai dengan RT pengguna yang sedang login dan status disetujui
        $warga = Warga::select('nik', 'nama', 'jenis_kelamin', 'tanggal_lahir', 'alamat', 'no_telepon', 'agama', 'statusKawin', 'pekerjaan', 'no_rt')
            ->where('status', 'disetujui')
            ->where('no_rt', $userNoRT);

        return DataTables::of($warga)
            ->addIndexColumn()
            ->addColumn('aksi', function ($warga) {
                $btn = '<a href="' . route('citizen.show', $warga->nik) . '" class="btn btn-primary btn-sm mr-1" style="width: 40px; height: 40px; margin-right: 5px;"><i class="fas fa-eye"></i></a>';
                $btn .= '<a href="' . route('citizen.edit', $warga->nik) . '" class="btn btn-warning btn-sm mr-1" style="width: 40px; height: 40px; margin-right: 5px;"><i class="fas fa-edit"></i></a>';
                $btn .= '<form class="d-inline-block" method="POST" action="' . route('citizen.destroy', $warga->nik) . '">' . csrf_field() . method_field('DELETE') . '<button type="submit" class="btn btn-danger btn-sm" style="width: 40px; height: 40px; margin-right: 5px;" onclick="return confirm(\'Apakah Anda Yakin Menghapus Data Ini? \');"><i class="fas fa-trash-alt"></i></button></form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function listDeceased()
    {
        $userNoRT = Auth::user()->no_rt;
        $warga = Warga::select('nik', 'nama', 'jenis_kelamin', 'tanggal_lahir', 'alamat', 'no_telepon', 'agama', 'statusKawin', 'pekerjaan', 'no_rt')
            ->where('status', 'tidak_disetujui')
            ->where('no_rt', $userNoRT);

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
        $userNoRT = Auth::user()->no_rt;
        $keluargas = Keluarga::where('no_rt', $userNoRT)->get();

        return view('rt.citizen.create', compact('breadcrumb', 'activeMenu', 'keluargas', 'userNoRT'));
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
            'password' => 'required',
            'id_keluarga' => 'required|exists:keluarga,id_keluarga',
            'akte' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'ktp' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Simpan akte jika diunggah
        $aktePath = null;
        if ($request->hasFile('akte')) {
            $aktePath = $request->file('akte')->store('akte');
        }

        // Simpan KTP jika diunggah
        $ktpPath = null;
        if ($request->hasFile('ktp')) {
            $ktpPath = $request->file('ktp')->store('ktp_images');
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

        return redirect()->route('citizen.index')->with('success', 'Warga berhasil ditambahkan.');
    }


    public function show($nik)
    {
        $breadcrumb = (object) [
            'title' => 'Detail Warga',
            'list' => ['Home', 'Warga', 'Detail']
        ];

        $activeMenu = 'citizen';

        $warga = warga::findOrFail($nik);

        return view('rt.citizen.show', compact('breadcrumb', 'activeMenu', 'warga'));
    }

    public function edit($nik)
    {
        $breadcrumb = (object) [
            'title' => 'Edit Warga',
            'list' => ['Home', 'Warga', 'Edit']
        ];
        $activeMenu = 'Warga';

        $warga = Warga::findOrFail($nik);
        $userNoRT = Auth::user()->no_rt;
        $keluargas = Keluarga::where('no_rt', $userNoRT)->get();

        return view('rt.citizen.edit', compact('breadcrumb', 'activeMenu', 'warga', 'keluargas'));
    }

    public function update(Request $request, $nik)
    {
        // Temukan warga berdasarkan NIK
        $warga = Warga::findOrFail($nik);

        // Validasi input
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

        // Simpan akte jika ada
        $aktePath = null;
        if ($request->hasFile('akte')) {
            $aktePath = $request->file('akte')->store('akte_images');
        }

        // Simpan KTP jika ada
        $ktpPath = null;
        if ($request->hasFile('ktp')) {
            $ktpPath = $request->file('ktp')->store('ktp_images');
        }


        // Update data warga
        $warga->nama = $request->nama;
        $warga->jenis_kelamin = $request->jenis_kelamin;
        $warga->tanggal_lahir = $request->tanggal_lahir;
        $warga->alamat = $request->alamat;
        $warga->no_telepon = $request->no_telepon;
        $warga->agama = $request->agama;
        $warga->statusKawin = $request->statusKawin;
        $warga->pekerjaan = $request->pekerjaan;
        $warga->no_rt = $request->no_rt;
        $warga->level = $request->level;
        $warga->id_keluarga = $request->id_keluarga;
        $warga->akte = $aktePath ? $aktePath : $warga->akte; // Tetapkan nilai sebelumnya jika tidak ada perubahan
        $warga->ktp = $ktpPath ? $ktpPath : $warga->ktp; // Tetapkan nilai sebelumnya jika tidak ada perubahan
        $warga->verif = $request->verif;
        $warga->status = $request->status;
        $warga->password = $request->password;

        if ($request->status === 'tidak_disetujui') {
            $warga->password = null;
        } else {
            $warga->password = $request->password;
        }

        $warga->save();

        // Redirect ke halaman daftar warga dengan pesan sukses
        return redirect()->route('citizen.index')->with('success', 'Warga berhasil diperbarui.');
    }

    public function destroy($nik)
    {
        $warga = warga::findOrFail($nik);

        $warga->delete();

        return redirect()->route('citizen.index')->with('success', 'Warga berhasil dihapus.');
    }
}
