<?php

namespace App\Http\Controllers\RT;

use App\Http\Controllers\Controller;
use App\Models\Aduan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PengaduanController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Menu Pengaduan',
        ];

        $page = (object) [
            'title' => 'Mengelola Pengaduan'
        ];

        $activeMenu = 'complaint';

        $aduans = Aduan::all();

        return view('rt.complaint.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu, 'aduans' => $aduans]);
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            $aduan = Aduan::select('id_aduan', 'nik_warga', 'tanggal_aduan', 'isi_aduan', 'status_aduan');

            return DataTables::of($aduan)
                ->addIndexColumn()
                ->addColumn('aksi', function ($aduan) {
                    $btn = '<a href="' . url('/complaint/' . $aduan->id_aduan) . '" class="btn btn-primary btn-sm mr-1" style="width: 40px; height: 40px; margin-right: 5px;"><i class="fas fa-eye"></i></a>';
                    $btn .= '<a href="' . url('/complaint/' . $aduan->id_aduan . '/edit') . '" class="btn btn-warning btn-sm mr-1" style="width: 40px; height: 40px; margin-right: 5px;"><i class="fas fa-edit"></i></a>';
                    $btn .= '<form class="d-inline-block" method="POST" action="' . url('/complaint/' . $aduan->id_aduan) . '">' . csrf_field() . method_field('DELETE') . '<button type="submit" class="btn btn-danger btn-sm" style="width: 40px; height: 40px; margin-right: 5px;" onclick="return confirm(\'Apakah Anda Yakin Menghapus Data Ini? \');"><i class="fas fa-trash-alt"></i></button></form>';
                    return $btn;
                })
                ->rawColumns(['aksi'])
                ->make(true);
        }

        return view('rt.complaint.list');
    }

    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Menu Pengaduan',
        ];
        $activeMenu = 'complaint';
        return view('rt.complaint.create', ['activeMenu' => $activeMenu, 'breadcrumb' => $breadcrumb]);
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nik_warga' => 'required|string|max:255',
            'tanggal_aduan' => 'required|date',
            'isi_aduan' => 'required|string',
            'status_aduan' => 'required|string|max:50',
            'foto' => 'nullable|image|max:2048' // Validate the image file
        ]);

        // Simpan data kegiatan baru
        $aduan = new Aduan();
        $aduan->nik_warga = $request->nik_warga;
        $aduan->tanggal_aduan = $request->tanggal_aduan;
        $aduan->isi_aduan = $request->isi_aduan;
        $aduan->status_aduan = $request->status_aduan;

        // Handle file upload if present
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('aduan_foto');
            $aduan->foto = $fotoPath;
        }

        $aduan->save();

        // Redirect ke halaman daftar kegiatan dengan pesan sukses
        return redirect()->route('complaint.index')->with('success', 'Aduan berhasil ditambahkan.');
    }

    public function show($id)
    {
        $breadcrumb = (object) [
            'title' => 'Detail Aduan',
            'list' => ['Home', 'Aduan', 'Detail']
        ];

        $page = (object) [
            'title' => 'Aduan'
        ];

        $activeMenu = 'complaint';

        $aduan = Aduan::findOrFail($id);

        return view('rt.complaint.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'aduan' => $aduan, 'activeMenu' => $activeMenu]);
    }

    public function edit($id)
    {
        $breadcrumb = (object) [
            'title' => 'Edit Pengaduan',
            'list' => ['Home', 'Pengaduan', 'Edit']
        ];
        $activeMenu = 'complaint';

        $aduan = Aduan::findOrFail($id);

        return view('rt.complaint.edit', ['activeMenu' => $activeMenu, 'breadcrumb' => $breadcrumb, 'aduan' => $aduan]);
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nik_warga' => 'required|string|max:255',
            'tanggal_aduan' => 'required|date',
            'isi_aduan' => 'required|string',
            'status_aduan' => 'required|string|max:50',
            'foto' => 'nullable|image|max:2048', // Tambahkan validasi untuk foto jika diperlukan
        ]);

        // Temukan aduan berdasarkan ID
        $aduan = Aduan::findOrFail($id);

        // Update data aduan
        $aduan->nik_warga = $request->nik_warga;
        $aduan->tanggal_aduan = $request->tanggal_aduan;
        $aduan->isi_aduan = $request->isi_aduan;
        $aduan->status_aduan = $request->status_aduan;

        // Update foto jika ada
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('aduan_foto');
            $aduan->foto = $fotoPath;
        }

        $aduan->save();

        // Redirect ke halaman daftar kegiatan dengan pesan sukses
        return redirect()->route('complaint.index')->with('success', 'Pengaduan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $aduan = Aduan::findOrFail($id);
        $aduan->delete();
        return redirect()->route('complaint.index')->with('success', 'Pengaduan berhasil dihapus.');
    }
}
