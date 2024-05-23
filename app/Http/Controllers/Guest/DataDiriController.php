<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataDiriController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Pengisian Data Diri',
            'list' => ['Home', 'Data Diri']
        ];

        // $activeMenu = 'Data';


        return view('warga.data_diri.index', ['breadcrumb' => $breadcrumb]);
    }
}
