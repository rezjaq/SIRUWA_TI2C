<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardWargaController extends Controller
{
    public function index(Request $request)
    {
        $breadcrumb = (object) [
            'title' => 'Dashboard',
            // 'list' => ['Home', 'Dashboard']
        ];

        $page = (object) [
            'title' => 'Dashboard Menu Warga'
        ];

        $activeMenu = 'dashboard';

        return view('warga.dashboard', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);
    }
}
