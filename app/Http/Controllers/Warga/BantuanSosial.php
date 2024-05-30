<?php

namespace App\Http\Controllers\Warga;

use App\Http\Controllers\Controller;
use App\Models\Crips;
use App\Models\Kriteria;
use App\Models\PengajuanBansos;
use Illuminate\Http\Request;

class BantuanSosial extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Bantuan Sosial',
            'list' => ['Home', 'Bantuan Sosial'] // List diubah menjadi array
        ];

        $activeMenu = 'bansos';


        return view('warga.bansos', ['breadcrumb' => $breadcrumb, 'activeMenu' => $activeMenu]);
    }

    public function create()
    {
        $breadcrumb = [
            'title' => 'Program Bantuan Sosial',
            'list' => [
                [
                    'label' => 'Bantuan Sosial',
                    'dropdown' => true,
                    'links' => [
                        ['url' => route('bansos-create'), 'label' => 'Pengajuan Bansos'],
                    ]
                ],
                ['label' => 'Pengajuan Bansos', 'url' => route('bansos-create')]
            ]
        ];
        $kriteria = Kriteria::all();
        $crips = Crips::all();
        return view('warga.bansos.pengajuan', ['breadcrumb' => $breadcrumb, 'kriteria' => $kriteria]);
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'nik_warga' => 'required|string|max:255',
            'pendapatan_1bln' => 'required|numeric',
            'sktm' => 'required|string|max:255',
            'status_pengajuan' => 'required|string|max:255',
            'keterangan' => 'nullable|string|max:255',
        ]);

        // Create a new PengajuanBansos record
        PengajuanBansos::create($validatedData);

        // Redirect with a success message
        return redirect()->route('bansos.create')->with('success', 'Pengajuan Bansos berhasil diajukan.');
    }
}
