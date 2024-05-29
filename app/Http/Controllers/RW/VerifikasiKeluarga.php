<?php

namespace App\Http\Controllers\RW;

use App\Http\Controllers\Controller;
use App\Models\Keluarga;
use App\Models\Warga;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class VerifikasiKeluarga extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Menu Verifikasi',
        ];

        $page = (object) [
            'title' => 'Verifikasi Data Keluarga'
        ];

        $activeMenu = 'verifikasiKeluarga';

        $keluargas = Keluarga::all();

        return view('rw.verifikasiKeluarga.index', compact('breadcrumb', 'page', 'activeMenu', 'keluargas'));
    }

    public function list()
    {
        $keluarga = Keluarga::select('id_keluarga', 'nama_kepala_keluarga', 'no_kk', 'status', 'verif')
            ->where(function ($query) {
                $query->where(function ($query) {
                    $query->where('status', 'disetujui')
                        ->where('verif', 'belum_diverifikasi');
                })->orWhere('status', 'belum_disetujui');
            });

        return DataTables::of($keluarga)
            ->addIndexColumn()
            ->addColumn('keterangan', function ($keluarga) {
                if ($keluarga->status == 'disetujui' && $keluarga->verif == 'belum_diverifikasi') {
                    return 'validasi data keluarga';
                } elseif ($keluarga->status == 'belum_disetujui') {
                    return 'penambahan data keluarga baru';
                }
                return '';
            })
            ->addColumn('aksi', function ($keluarga) {
                $btn = '<a href="' . route('verifikasiKeluarga.show', $keluarga->id_keluarga) . '" class="btn btn-primary btn-sm mr-1" style="width: 40px; height: 40px; margin-right: 5px;"><i class="fas fa-eye"></i></a>';
                return $btn;
            })
            ->rawColumns(['keterangan', 'aksi'])
            ->make(true);
    }


    public function approve($id_keluarga)
    {
        $keluarga = Keluarga::where('id_keluarga', $id_keluarga)->first();
        if ($keluarga) {
            if ($keluarga->status == 'disetujui' && $keluarga->verif == 'belum_diverifikasi') {
                $keluarga->verif = 'diverifikasi';
            } elseif ($keluarga->status == 'belum_disetujui') {
                $keluarga->status = 'disetujui';
            }
            $keluarga->save();
            return response()->json(['success' => 'Data keluarga telah disetujui.']);
        }
        return response()->json(['error' => 'Data keluarga tidak ditemukan.'], 404);
    }

    public function reject($id_keluarga)
    {
        $keluarga = Keluarga::where('id_keluarga', $id_keluarga)->first();
        if ($keluarga) {
            if ($keluarga->status == 'disetujui' && $keluarga->verif == 'belum_diverifikasi') {
                $keluarga->verif = 'tidak_terverifikasi';
            } elseif ($keluarga->status == 'belum_disetujui') {
                $keluarga->status = 'tidak_disetujui';
            }
            $keluarga->save();

            // Kembalikan id_keluarga warga yang menjadi kepala keluarga ke nilai sebelumnya
            $kepalaKeluarga = Warga::where('nama', $keluarga->nama_kepala_keluarga)->first();
            if ($kepalaKeluarga && $kepalaKeluarga->previous_id_keluarga) {
                $kepalaKeluarga->id_keluarga = $kepalaKeluarga->previous_id_keluarga;
                $kepalaKeluarga->previous_id_keluarga = null;
                $kepalaKeluarga->save();
            }

            return response()->json(['success' => 'Data keluarga telah ditolak.']);
        }
        return response()->json(['error' => 'Data keluarga tidak ditemukan.'], 404);
    }


    public function show($id_keluarga)
    {
        $breadcrumb = (object) [
            'title' => 'Detail Keluarga',
            'list' => ['Home', 'Keluarga', 'Detail']
        ];

        $activeMenu = 'Keluarga';

        $keluarga = Keluarga::findOrFail($id_keluarga);

        // Pastikan keluarga ditemukan
        if ($keluarga) {
            return view('rw.verifikasiKeluarga.show', compact('breadcrumb', 'activeMenu', 'keluarga'));
        }

        // Jika keluarga tidak ditemukan, lempar 404
        abort(404, 'Data keluarga tidak ditemukan.');
    }
}
