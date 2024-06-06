<?php

namespace App\Http\Controllers\Warga;

use App\Http\Controllers\Controller;
use App\Models\Aduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengaduanController extends Controller
{
    public function index()
    {
        $breadcrumb = [
            'title' => 'Pengaduan Warga',
            'list' => [
                [
                    'label' => 'Form Pengaduan',
                    'dropdown' => true,
                    'links' => [
                        ['url' => route('pengaduan'), 'label' => 'Form Pengaduan']
                    ]
                ],
                ['label' => 'Form Pengaduan', 'url' => route('pengaduan')]
            ]
        ];

        $user = Auth::user();

        return view('warga.pengaduan.pengaduan', ['breadcrumb' => $breadcrumb, 'user' => $user]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tempat' => 'required|string|max:255',
            'tanggal_aduan' => 'required|date',
            'isi' => 'required|string',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Get the authenticated user's nik_warga
        $nik_warga = Auth::user()->nik;

        $imagePath = $request->file('foto')->store('pengaduan', 'public');

        Aduan::create([
            'nik_warga' => $nik_warga,
            'nama' => $request->nama,
            'tempat' => $request->tempat,
            'tanggal_aduan' => $request->tanggal_aduan,
            'isi' => $request->isi,
            'foto' => $imagePath,
            'status_aduan' => 'pending',
        ]);

        return redirect()->route('pengaduan')->with('success', 'Pengaduan berhasil dikirim.');
    }




}
