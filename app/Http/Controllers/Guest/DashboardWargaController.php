<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardWargaController extends Controller
{
    public function index()
    {
        return view('warga.dashboard');
    }
}
