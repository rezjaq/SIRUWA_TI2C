<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengumumanController extends Controller
{
    public function index()
    {
        $pengumuman = Pengumuman::all();
        return view('pengumuman.pengumuman', compact('pengumuman'));
    }

    public function create()
    {
        return view('pengumuman.create');
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

            return redirect()->route('pengumuman')->with('success', 'Pengumuman berhasil ditambahkan.');
        } else {
            return redirect()->back()->with('error', 'Gagal menambahkan pengumuman.');
        }
    }

    public function show($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        return view('pengumuman.show', compact('pengumuman'));
    }


    public function edit($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        return view('pengumuman.edit', compact('pengumuman'));
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

        return redirect()->route('pengumuman')->with('success', 'Pengumuman berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);

        // Hapus foto terkait jika ada
        if ($pengumuman->foto) {
            Storage::delete($pengumuman->foto);
        }

        $pengumuman->delete();

        return redirect()->route('pengumuman')
            ->with('success', 'Pengumuman berhasil dihapus.');
    }
}
