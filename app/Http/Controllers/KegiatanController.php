<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function index()
    {
        $kegiatans = Kegiatan::all();
        return view('kegiatan.index', compact('kegiatans'));
    }

    public function create()
    {
        return view('kegiatan.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_kegiatan' => 'required',
            'tanggal_kegiatan' => 'required|date',
            'waktu_mulai' => 'required',
            'lokasi_kegiatan' => 'required',
            'deskripsi' => 'required',
            'status_kegiatan' => 'required',
        ]);

        // Simpan data kegiatan baru
        $kegiatan = new Kegiatan();
        $kegiatan->nama_kegiatan = $request->nama_kegiatan;
        $kegiatan->tanggal_kegiatan = $request->tanggal_kegiatan;
        $kegiatan->waktu_mulai = $request->waktu_mulai;
        $kegiatan->waktu_selesai = $request->waktu_selesai;
        $kegiatan->lokasi_kegiatan = $request->lokasi_kegiatan;
        $kegiatan->deskripsi = $request->deskripsi;
        $kegiatan->status_kegiatan = $request->status_kegiatan;

        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('kegiatan_foto');
            $kegiatan->foto = $fotoPath;
        }

        $kegiatan->save();

        // Redirect ke halaman daftar kegiatan dengan pesan sukses
        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil ditambahkan.');
    }

    public function show($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);

        return view('kegiatan.show', compact('kegiatan'));
    }

    public function edit($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);

        return view('kegiatan.edit', compact('kegiatan'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama_kegiatan' => 'required',
            'tanggal_kegiatan' => 'required|date',
            'waktu_mulai' => 'required',
            'lokasi_kegiatan' => 'required',
            'deskripsi' => 'required',
            // Tambahkan validasi untuk foto jika diperlukan
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status_kegiatan' => 'required',
        ]);

        // Temukan kegiatan berdasarkan ID
        $kegiatan = Kegiatan::findOrFail($id);

        // Update data kegiatan
        $kegiatan->nama_kegiatan = $request->nama_kegiatan;
        $kegiatan->tanggal_kegiatan = $request->tanggal_kegiatan;
        $kegiatan->waktu_mulai = $request->waktu_mulai;
        $kegiatan->waktu_selesai = $request->waktu_selesai;
        $kegiatan->lokasi_kegiatan = $request->lokasi_kegiatan;
        $kegiatan->deskripsi = $request->deskripsi;
        $kegiatan->status_kegiatan = $request->status_kegiatan;

        // Update foto jika ada
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('kegiatan_foto');
            $kegiatan->foto = $fotoPath;
        }

        $kegiatan->save();

        // Redirect ke halaman daftar kegiatan dengan pesan sukses
        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);

        $kegiatan->delete();

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil dihapus.');
    }
}
