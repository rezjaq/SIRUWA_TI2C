<?php

namespace App\Http\Controllers\RW;

use App\Http\Controllers\Controller;
use App\Models\Warga;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class Verifikasi extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Menu Verifikasi',
        ];

        $page = (object) [
            'title' => 'Verifikasi Data Warga'
        ];

        $activeMenu = 'verifikasi';

        $wargas = Warga::all();

        return view('rw.verifikasi.index', compact('breadcrumb', 'page', 'activeMenu', 'wargas'));
    }

    public function list()
    {
        $warga = Warga::select('nik', 'nama', 'status', 'verif')
            ->where(function ($query) {
                $query->where(function ($query) {
                    $query->where('status', 'disetujui')
                        ->where('verif', 'belum_terverifikasi');
                })->orWhere('status', 'belum_disetujui');
            });

        return DataTables::of($warga)
            ->addIndexColumn()
            ->addColumn('keterangan', function ($warga) {
                if ($warga->status == 'disetujui' && $warga->verif == 'belum_terverifikasi') {
                    return 'validasi data warga';
                } elseif ($warga->status == 'belum_disetujui') {
                    return 'penambahan data warga baru';
                }
                return '';
            })
            ->addColumn('aksi', function ($warga) {
                $btn = '<a href="' . route('verifikasi.show', $warga->nik) . '" class="btn btn-primary btn-sm mr-1" style="width: 40px; height: 40px; margin-right: 5px;"><i class="fas fa-eye"></i></a>';
                return $btn;
            })
            ->rawColumns(['keterangan', 'aksi'])
            ->make(true);
    }


    public function approve($nik)
    {
        $warga = Warga::where('nik', $nik)->first();
        if ($warga) {
            if ($warga->status == 'disetujui' && $warga->verif == 'belum_terverifikasi') {
                $warga->verif = 'terverifikasi';
            } elseif ($warga->status == 'belum_disetujui') {
                $warga->status = 'disetujui';
            }
            $warga->save();
            return response()->json(['success' => 'Data warga telah disetujui.']);
        }
        return response()->json(['error' => 'Data warga tidak ditemukan.'], 404);
    }

    public function reject($nik)
    {
        $warga = Warga::where('nik', $nik)->first();
        if ($warga) {
            if ($warga->status == 'disetujui' && $warga->verif == 'belum_terverifikasi') {
                $warga->verif = 'tidak_terverifikasi';
            } elseif ($warga->status == 'belum_disetujui') {
                $warga->status = 'tidak_disetujui';
            }
            $warga->save();
            return response()->json(['success' => 'Data warga telah ditolak.']);
        }
        return response()->json(['error' => 'Data warga tidak ditemukan.'], 404);
    }


    public function show($nik)
    {
        $breadcrumb = (object) [
            'title' => 'Detail Warga',
            'list' => ['Home', 'Warga', 'Detail']
        ];

        $activeMenu = 'Warga';

        $warga = Warga::findOrFail($nik);

        // Jika validasi data warga, tampilkan seluruh atribut termasuk foto KTP
        if ($warga->status == 'disetujui' && $warga->verif == 'belum_terverifikasi') {
            return view('RW.verifikasi.show', compact('breadcrumb', 'activeMenu', 'warga'));
        }

        // Jika penambahan data warga baru, tampilkan seluruh atribut kecuali foto KTP
        if ($warga->status == 'belum_disetujui') {
            // Ambil nama file KK
            $kk = $warga->kk;
            // Hilangkan ekstensi file
            $kkFileName = pathinfo($kk, PATHINFO_FILENAME);
            // Ambil nama folder tempat penyimpanan KK
            $kkFolderName = pathinfo($kk, PATHINFO_DIRNAME);
            // Gabungkan nama folder dengan nama file tanpa ekstensi untuk mendapatkan path lengkap
            $kkPath = $kkFolderName . '/' . $kkFileName;

            return view('RW.verifikasi.show1', compact('breadcrumb', 'activeMenu', 'warga', 'kkPath'));
        }

        // Jika tidak memenuhi kedua kondisi di atas, lempar error atau tampilkan halaman kosong
        abort(404, 'Halaman tidak ditemukan.');
    }
}
