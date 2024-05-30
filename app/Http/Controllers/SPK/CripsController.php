<?php

namespace App\Http\Controllers\SPK;

use App\Http\Controllers\Controller;
use App\Models\Crips;
use App\Models\Kriteria;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CripsController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_crips' => 'required|string',
            'bobot' => 'required|string'
        ]);

        try {
            $crips = new Crips();
            $crips->kriteria_id = $request->kriteria_id;
            $crips->nama_crips = $request->nama_crips;
            $crips->bobot = $request->bobot;
            $crips->save();
            return back()->with('msg', 'berhasil coy');
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
        $data['crips'] = Crips::findOrFail($id);

        return view('rw.spk.crips.edit', $data, $data1);
    }

    public function update(Request $request, $id)
    {
        try {
            $crips = Crips::findOrFail($id);
            $crips->update([

                'nama_crips' => $request->nama_crips,
                'bobot' => $request->bobot
            ]);
            return back()->with('msg', 'berhasil juga ini');
        } catch (\Throwable $e) {
            Log::emergency("File: " . $e->getFile() . " Line: " . $e->getLine() . " Message: " . $e->getMessage());
            return back()->withErrors('Gagal menambahkan data');
        }
    }

    public function destroy($id)
    {
        try {
            $crips = Crips::findOrFail($id);
            $crips->delete();
            return back()->with('msg', 'berhasil juga ini');
        } catch (\Throwable $e) {
            Log::emergency("File: " . $e->getFile() . " Line: " . $e->getLine() . " Message: " . $e->getMessage());
            return back()->withErrors('Gagal menambahkan data');
        }
    }
}
