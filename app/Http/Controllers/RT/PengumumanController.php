<?php

namespace App\Http\Controllers\RT;

use App\Http\Controllers\Controller;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class PengumumanController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Menu Pengumuman',
        ];

        $page = (object) [
            'title' => 'Mengelola Pengumuman'
        ];

        $activeMenu = 'announcement';

        $pengumuman = Pengumuman::all();

        return view('rt.announcement.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu], compact('pengumuman'));
    }

    public function list(Request $request)
    {
        $pengumuman = Pengumuman::select('id_pengumuman', 'judul', 'isi', 'tanggal', 'foto', 'status_pengumuman');

        return DataTables::of($pengumuman)
            ->addIndexColumn()
            ->addColumn('aksi', function ($pengumuman) {
                $btn = '<a href="' . url('/announcement/' . $pengumuman->id_pengumuman) . '" class="btn btn-primary btn-sm mr-1 mb-2" style="width: 40px; height: 40px; margin-right: 5px;"><i class="fas fa-eye"></i></a>';
                $btn .= '<a href="' . url('/announcement/' . $pengumuman->id_pengumuman . '/edit') . '" class="btn btn-warning btn-sm mr-1 mb-2" style="width: 40px; height: 40px; margin-right: 5px;"><i class="fas fa-edit"></i></a>';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/announcement/' . $pengumuman->id_pengumuman) . '">' . csrf_field() . method_field('DELETE') . '<button type="submit" class="btn btn-danger btn-sm mb-2" style="width: 40px; height: 40px; margin-right: 5px;" onclick="return confirm(\'Apakah Anda Yakin Menghapus Data Ini? \');"><i class="fas fa-trash-alt"></i></button></form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }



    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Menu Pengumuman',
        ];
        $activeMenu = 'announcement';
        return view('rt.announcement.create', ['activeMenu' => $activeMenu, 'breadcrumb' => $breadcrumb]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'tanggal' => 'required|date',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status_pengumuman' => 'required|in:aktif,tidak aktif',
        ]);

        $pengumuman = Pengumuman::create($request->all());

        if ($pengumuman->wasRecentlyCreated) {
            if ($request->hasFile('foto')) {
                $fotoPath = $request->file('foto')->store('pengumuman_foto');
                $pengumuman->foto = $fotoPath;
                $pengumuman->save();
            }

            return redirect()->route('announcement')->with('success', 'Pengumuman berhasil ditambahkan.');
        } else {
            return redirect()->back()->with('error', 'Gagal menambahkan pengumuman.');
        }
    }

    public function show(string $id)
    {
        $pengumuman = Pengumuman::findOrFail($id);

        $breadcrumb = (object) [
            'title' => 'Detail Pengumuman',
            'list' => ['Home', 'Pengumuman', 'Detail']
        ];

        $page = (object) [
            'title' => 'Pengumuman'
        ];

        $activeMenu = 'announcement';

        return view('rt.announcement.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'pengumuman' => $pengumuman, 'activeMenu' => $activeMenu], compact('pengumuman'));
    }


    public function edit($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);

        $breadcrumb = (object) [
            'title' => 'Edit Pengumuman',
            'list' => ['Home', 'Pengumuman', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit Pengumuman'
        ];

        $activeMenu = 'announcement';

        return view('rt.announcement.edit', ['activeMenu' => $activeMenu, 'breadcrumb' => $breadcrumb, 'page' => $page], compact('pengumuman'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'tanggal' => 'required|date',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status_pengumuman' => 'required|in:aktif,tidak aktif',
        ]);

        $pengumuman = Pengumuman::findOrFail($id);
        $pengumuman->update($request->all());

        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('pengumuman_foto');
            $pengumuman->foto = $fotoPath;
            $pengumuman->save();
        }

        return redirect()->route('announcement')->with('success', 'Pengumuman berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);

        // Hapus foto terkait jika ada
        if ($pengumuman->foto) {
            Storage::delete($pengumuman->foto);
        }

        $pengumuman->delete();

        return redirect()->route('announcement')
            ->with('success', 'Pengumuman berhasil dihapus.');
    }
}
