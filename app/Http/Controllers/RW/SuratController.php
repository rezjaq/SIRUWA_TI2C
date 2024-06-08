<?php

namespace App\Http\Controllers\RW;

use App\Http\Controllers\Controller;
use App\Models\Surat;
use App\Models\Warga;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SuratController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Menu Surat',
        ];

        $page = (object) [
            'title' => 'Mengelola Surat'
        ];

        $activeMenu = 'Surat';

        $surats = Surat::with('warga')->get();

        return view('rw.surat.index', compact('breadcrumb', 'page', 'activeMenu', 'surats'));
    }

    public function list()
    {
        $surat = Surat::with('warga')
            ->select('surat.id_surat', 'surat.jenis_surat', 'surat.tanggal_surat', 'surat.keterangan', 'warga.nama', 'warga.nik')
            ->join('warga', 'surat.nik_warga', '=', 'warga.nik');

        return DataTables::of($surat)
            ->addIndexColumn()
            ->addColumn('aksi', function ($surat) {
                return '<form class="d-inline-block" method="POST" action="' . route('rw.surat.destroy', $surat->id_surat) . '">' . csrf_field() . method_field('DELETE') . '<button type="submit" class="btn btn-danger btn-sm" style="width: 40px; height: 40px; margin-right: 5px;" onclick="return confirm(\'Apakah Anda Yakin Menghapus Data Ini? \');"><i class="fas fa-trash-alt"></i></button></form>';
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Menu Pengajuan Surat',
        ];
        $activeMenu = 'pengajuan_surat';
        $wargas = Warga::all();

        return view('rw.surat.create', compact('breadcrumb', 'activeMenu', 'wargas'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'jenis_surat' => 'required',
            'tanggal_surat' => 'required|date',
            'nik_warga' => 'required',
            'keterangan' => 'nullable',
        ]);

        // Buat data surat baru
        $surat = Surat::create([
            'jenis_surat' => $request->jenis_surat,
            'tanggal_surat' => $request->tanggal_surat,
            'nik_warga' => $request->nik_warga,
            'keterangan' => $request->keterangan,
        ]);

        // Cek apakah surat berhasil dibuat
        if ($surat->wasRecentlyCreated) {
            return redirect()->route('rw.surat.index')->with('success', 'Pengajuan surat berhasil ditambahkan.');
        } else {
            return redirect()->back()->with('error', 'Gagal menambahkan pengajuan surat.');
        }
    }


    public function destroy($id)
    {
        $surat = Surat::findOrFail($id);
        $surat->delete();

        return redirect()->back()->with('success', 'Surat berhasil dihapus.');
    }


}
