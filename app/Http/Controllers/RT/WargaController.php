<?php

namespace App\Http\Controllers\RT;

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

        $activeMenu = 'citizen';

        $wargas = warga::all();

        return view('rt.citizen.index', compact('breadcrumb', 'page', 'activeMenu', 'wargas'));
    }

    public function list()
    {
        $warga = warga::select('nik', 'nama', 'jenis_kelamin', 'tanggal_lahir', 'alamat', 'no_telepon', 'agama', 'statusKawin', 'pekerjaan', 'no_rt');

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

    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Warga',
        ];
        $activeMenu = 'citizen';

        // Mendapatkan daftar keluarga yang sudah ada
        $keluargas = keluarga::all();

        return view('rt.citizen.create', compact('breadcrumb', 'activeMenu', 'keluargas'));
    }


    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nik' => 'required|unique:warga,nik',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'no_telepon' => 'required',
            'agama' => 'required',
            'statusKawin' => 'required',
            'pekerjaan' => 'required',
            'no_rt' => 'required',
            'password' => 'required|min:6',
            'id_keluarga' => 'required|exists:keluarga,id_keluarga'

        ]);

        // Simpan data warga baru
        $warga = warga::create([
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
            'password' => bcrypt($request->password),
            'id_keluarga' => $request->id_keluarga
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
        $activeMenu = 'citizen';

        $warga = Warga::findOrFail($nik);

        return view('rt.citizen.edit', compact('breadcrumb', 'activeMenu', 'warga'));
    }

    public function update(Request $request, $nik)
    {
        // Validasi input
        $request->validate([
            'nik' => 'required|unique:warga,nik,' . $nik,
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'no_telepon' => 'required',
            'agama' => 'required',
            'statusKawin' => 'required',
            'pekerjaan' => 'required',
            'no_rt' => 'required',
            'level' => 'required'
        ]);

        // Temukan warga berdasarkan NIK
        $warga = warga::findOrFail($nik);

        // Update data warga
        $warga->nik = $request->nik;
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
