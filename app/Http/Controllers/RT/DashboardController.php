<?php

namespace App\Http\Controllers\RT;

use App\Http\Controllers\Controller;
use App\Models\Keluarga;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Dashboard RT',
        ];

        $page = (object) [
            'title' => 'Dashboard Menu RT'
        ];

        $activeMenu = 'dashboard';

        $no_rt = Auth::user()->no_rt;

        // Menghitung jumlah warga di RT ini
        $jumlahWarga = Warga::where('no_rt', $no_rt)->count();

        // Menghitung jumlah keluarga di RT ini
        $jumlahKeluarga = Keluarga::where('no_rt', $no_rt)->count();

        return view('rt.dashboard', compact('breadcrumb', 'page', 'activeMenu', 'jumlahWarga', 'jumlahKeluarga'));
    }
}
