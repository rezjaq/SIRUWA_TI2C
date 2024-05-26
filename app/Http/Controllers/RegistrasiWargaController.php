<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;

class RegistrasiWargaController extends Controller
{
    public function index()
    {
        return view('register.cek_nik');
    }

    public function isNikExists(Request $request)
    {
        $nik = $request->input('nik');

        $warga = Warga::where('nik', $nik)->first();
        
        if ($warga === null) {
            return back()->with('error', 'NIK tidak ditemukan dalam database.');
        } else {
            return redirect()->route('form.melengkapi_dokumen');
        }
    }
}
