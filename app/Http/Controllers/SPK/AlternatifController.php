<?php

namespace App\Http\Controllers\SPK;

use App\Http\Controllers\Controller;
use App\Models\Alternatif;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AlternatifController extends Controller
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
            'alternatif' => Alternatif::get()
        ];

        return view('rw.spk.alternatif.index', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_alternatif' => 'required|string',
        ]);

        try {
            $alternatif = new Alternatif();
            $alternatif->nama_alternatif = $request->nama_alternatif; // Corrected field name
            $alternatif->save();
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
            'alternatif' => Alternatif::get()
        ];

        $data['alternatif'] = Alternatif::findOrFail($id);
        return view('rw.spk.alternatif.edit', $data, $data1);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_alternatif' => 'required|string', // Corrected field name
        ]);

        try {
            $alternatif = Alternatif::findOrFail($id);
            $alternatif->update([
                'nama_alternatif' => $request->nama_alternatif, // Corrected field name
            ]);

            return redirect()->route('alter.index')->with('msg', 'Berhasil mengupdate data');
        } catch (Exception $e) {
            Log::emergency("File: " . $e->getFile() . " Line: " . $e->getLine() . " Message: " . $e->getMessage());
            return back()->withErrors('Gagal mengupdate data');
        }
    }

    public function destroy($id)
    {
        try {
            $alternatif = Alternatif::findOrFail($id);
            $alternatif->delete();
            return back()->with('msg', 'Berhasil menghapus data');
        } catch (Exception $e) {
            Log::emergency("File: " . $e->getFile() . " Line: " . $e->getLine() . " Message: " . $e->getMessage());
            return back()->withErrors('Gagal menghapus data');
        }
    }
}
