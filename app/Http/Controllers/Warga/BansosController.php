<?php

namespace App\Http\Controllers\Warga;

use App\Http\Controllers\Controller;
use App\Models\Bansos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BansosController extends Controller
{
    public function create()
    {
        $breadcrumb = [
            'title' => 'Bantuan Sosial',
            'list' => [
                [
                    'label' => 'Bantuan Sosial',
                    'dropdown' => true,
                    'links' => [
                        ['url' => route('warga.Warga.index'), 'label' => 'Form Pengajuan Bansos'],
                    ]
                ],
                ['label' => 'Form Pengajuan Bansos', 'url' => route('warga.Warga.index')]
            ] // List diubah menjadi array
        ];

        return view('warga.bansos.create', compact('breadcrumb'));
    }

    public function store(Request $request)
    {
        // Validasi data yang masuk
        $request->validate([
            'pendidikan' => 'required|string',
            'pekerjaan' => 'required|string',
            'penghasilan' => 'required|string',
            'status_kepemilikan_rumah' => 'required|string',
            'fasilitas_wc' => 'required|string',
            'fasilitas_listrik' => 'required|string',
            'bahan_bakar' => 'required|string',
            'kepemilikan_tabungan' => 'required|string',
        ]);

        // Mengecek apakah warga sudah terverifikasi
        $user = Auth::user();
        if ($user->verif !== 'terverifikasi') {
            return redirect()->back()->with('error', 'Maaf, Anda belum melakukan verifikasi data diri, Segera lakukan verifikasi data diri di menu data warga');
        }

        // Membuat pengajuan bansos baru
        Bansos::create([
            'pendidikan' => $request->pendidikan,
            'pekerjaan' => $request->pekerjaan,
            'penghasilan' => $request->penghasilan,
            'status_kepemilikan_rumah' => $request->status_kepemilikan_rumah,
            'fasilitas_wc' => $request->fasilitas_wc,
            'fasilitas_listrik' => $request->fasilitas_listrik,
            'bahan_bakar' => $request->bahan_bakar,
            'kepemilikan_tabungan' => $request->kepemilikan_tabungan,
            'status' => 'pending', // Default status
            'nik_warga' => Auth::user()->nik, // Menggunakan NIK warga yang sedang login
        ]);

        return redirect()->route('warga.bansos.create')->with('success', 'Pengajuan bansos berhasil diajukan.');
    }

    public function penerima()
    {
        // Ambil data penerima bansos beserta informasi warga yang diperlukan
        $penerimas = Bansos::where('status', 'approved')->with('warga')->get();

        return view('warga.bansos.penerima', compact('penerimas'));
    }

}
