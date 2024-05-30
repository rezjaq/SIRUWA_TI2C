<?php

namespace App\Http\Controllers\SPK;

use App\Http\Controllers\Controller;
use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\Penilaian;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PenilaianController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Menu SPK',
        ];

        $page = (object) [
            'title' => 'Mengelola SPK',
        ];

        $activeMenu = 'spk';

        $alternatif = Alternatif::with('penilaian.crips')->get();
        $kriteria = Kriteria::with('crips')->orderBy('nama_kriteria', 'ASC')->get();

        $data = [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
            'alternatif' => $alternatif,
            'kriteria' => $kriteria,
        ];

        return view('rw.spk.penilaian.index', $data);
    }

    public function store(Request $request)
    {
        try {
            foreach ($request->alternatif_id as $index => $alternatifId) {
                // Hapus penilaian sebelumnya untuk alternatif ini
                Penilaian::where('alternatif_id', $alternatifId)->delete();

                foreach ($request->crips_id[$alternatifId] as $kriteriaId => $cripsId) {
                    Penilaian::create([
                        'alternatif_id' => $alternatifId,
                        'crips_id' => $cripsId,
                    ]);
                }
            }

            return redirect()->route('pn.index')->with('msg', 'Berhasil Simpan');
        } catch (Exception $e) {
            Log::emergency("File: " . $e->getFile() . " Line: " . $e->getLine() . " Message: " . $e->getMessage());
            return back()->withErrors('Gagal mengupdate data');
        }
    }

}