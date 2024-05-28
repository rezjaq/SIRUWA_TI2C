<?php

namespace App\Http\Controllers\Warga;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardWargaController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('welcome')->with('user', $user);
    }
}
