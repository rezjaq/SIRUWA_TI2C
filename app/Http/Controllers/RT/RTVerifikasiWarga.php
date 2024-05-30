<?php

namespace App\Http\Controllers\RT;

use App\Http\Controllers\Controller;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class RTVerifikasiWarga extends Controller
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

        // Mendapatkan no_rt dari pengguna yang sedang login
        $userNoRT = Auth::user()->no_rt;

        // Mendapatkan daftar warga yang sesuai dengan no_rt pengguna yang sedang login
        $wargas = Warga::where('no_rt', $userNoRT)->get();

        return view('rt.verifikasiWarga.index', compact('breadcrumb', 'page', 'activeMenu', 'wargas'));
    }
    public function list()
    {
        // Mendapatkan no_rt dari pengguna yang sedang login
        $userNoRT = Auth::user()->no_rt;

        $warga = Warga::select('nik', 'nama', 'status', 'verif')
            ->where('no_rt', $userNoRT)
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
                $btn = '<a href="' . route('RTVerifikasiWarga.show', $warga->nik) . '" class="btn btn-primary btn-sm mr-1" style="width: 40px; height: 40px; margin-right: 5px;"><i class="fas fa-eye"></i></a>';
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
            $warga->delete();
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

        if ($warga->status == 'disetujui' && $warga->verif == 'belum_terverifikasi') {
            $ktpPath = $warga->ktp ? asset('storage/ktp/' . $warga->ktp) : null;
            return view('rt.verifikasiWarga.show', compact('breadcrumb', 'activeMenu', 'warga', 'ktpPath'));
        }

        if ($warga->status == 'belum_disetujui') {
            $aktePath = $warga->akte ? asset('storage/akte/' . $warga->akte) : null;
            return view('rt.verifikasiWarga.show1', compact('breadcrumb', 'activeMenu', 'warga', 'aktePath'));
        }

        abort(404, 'Halaman tidak ditemukan.');
    }
}
