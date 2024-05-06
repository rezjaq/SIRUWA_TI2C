<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BantuanSosial extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Bantuan Sosial',
        ];

        $page = (object) [
            'title' => 'Menu Program Bantuan Sosial'
        ];

        $activeMenu = 'bantuan_sosial';

        return view('warga.bansos', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);
    }
}
