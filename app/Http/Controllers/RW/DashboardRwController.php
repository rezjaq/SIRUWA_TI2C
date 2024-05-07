<?php

namespace App\Http\Controllers\RW;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardRwController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Dashboard RW',
        ];

        $page = (object) [
            'title' => 'Dashboard Menu RW'
        ];

        $activeMenu = 'dashboard';

        return view('RW.dashboard', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);
    }
}
