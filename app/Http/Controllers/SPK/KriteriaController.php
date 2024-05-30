<?php

namespace App\Http\Controllers\SPK;

use App\Http\Controllers\Controller;
use App\Models\Kriteria;
use App\Models\Crips;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class KriteriaController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Menu SPK',
        ];

        $page = (object) [
            'title' => 'Mengelola SPK'
        ];

        $activeMenu = 'spk';

        $data = [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
            'kriteria' => Kriteria::orderBy('nama_kriteria', 'ASC')->get()
        ];

        return view('rw.spk.kriteria.index', $data);
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama_kriteria' => 'required|string',
            'atribut' => 'required|string',
            'bobot' => 'required|string'
        ]);

        try {
            $kriteria = new Kriteria();
            $kriteria->nama_kriteria = $request->nama_kriteria;
            $kriteria->atribut = $request->atribut;
            $kriteria->bobot = $request->bobot;
            $kriteria->save();
            return back()->with('msg', 'Berhasil menambahkan data');
        } catch (Exception $e) {
            Log::emergency("File: " . $e->getFile() . " Line: " . $e->getLine() . " Message: " . $e->getMessage());
            return back()->withErrors('Gagal menambahkan data');
        }
    }

    public function edit($id)
    {
        $breadcrumb = (object) [
            'title' => 'Menu SPK',
        ];

        $page = (object) [
            'title' => 'Mengelola SPK'
        ];

        $activeMenu = 'spk';

        $data1 = [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
            'kriteria' => Kriteria::orderBy('nama_kriteria', 'ASC')->get()
        ];

        $data['kriteria'] = Kriteria::findOrFail($id);
        return view('rw.spk.kriteria.edit', $data, $data1);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kriteria' => 'required|string',
            'atribut' => 'required|string',
            'bobot' => 'required|numeric'
        ]);

        try {
            $kriteria = Kriteria::findOrFail($id);
            $kriteria->update([
                'nama_kriteria' => $request->nama_kriteria,
                'atribut' => $request->atribut,
                'bobot' => $request->bobot
            ]);

            return redirect()->route('kriteria.index')->with('msg', 'Berhasil mengupdate data');
        } catch (Exception $e) {
            Log::emergency("File: " . $e->getFile() . " Line: " . $e->getLine() . " Message: " . $e->getMessage());
            return back()->withErrors('Gagal mengupdate data');
        }
    }

    public function show($id)
    {
        $breadcrumb = (object) [
            'title' => 'Menu SPK',
        ];

        $page = (object) [
            'title' => 'Mengelola SPK'
        ];

        $activeMenu = 'spk';

        $data1 = [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
            'kriteria' => Kriteria::orderBy('nama_kriteria', 'ASC')->get()
        ];
        $data['crips'] = Crips::where('kriteria_id', $id)->get();
        $data['kriteria'] = Kriteria::findOrFail($id);
        return view('rw.spk.kriteria.show', $data, $data1);
    }

    public function destroy($id)
    {
        try {
            $kriteria = Kriteria::findOrFail($id);
            $kriteria->delete();
            return back()->with('msg', 'Berhasil menghapus data');
        } catch (Exception $e) {
            Log::emergency("File: " . $e->getFile() . " Line: " . $e->getLine() . " Message: " . $e->getMessage());
            return back()->withErrors('Gagal menghapus data');
        }
    }
}
