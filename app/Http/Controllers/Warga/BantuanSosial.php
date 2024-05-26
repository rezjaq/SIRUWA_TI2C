<?php

namespace App\Http\Controllers\Warga;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BantuanSosial extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Bantuan Sosial',
            'list' => ['Home', 'Bantuan Sosial'] // List diubah menjadi array
        ];

        $activeMenu = 'bansos';


        return view('warga.bansos', ['breadcrumb' => $breadcrumb, 'activeMenu' => $activeMenu]);
    }
}
