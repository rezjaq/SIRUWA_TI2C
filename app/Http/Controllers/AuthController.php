<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index() {
        $user = Auth::user();

        if ($user) {

            if ($user->level == 'RW') {
                return redirect()->intended('RW');
            } else if ($user->level == 'RT') {
                return redirect()->intended('RT');
            }else if ($user->level == 'warga') {
                return redirect()->intended('warga');
            }

        }
        return view('login');
    }

    public function proses_login(Request $request) {
        $request->validate([
            'nik' => 'required',
            'password' => 'required'
        ]);

        $credential = $request->only('nik', 'password');
        $user = Warga::where('nik', $request->nik)->first();
        if ($user) {
            // Bandingkan password tanpa enkripsi
            if ($user->password == $request->password) {
                if ($user->level == 'RW') {
                    return redirect()->intended('RW');
                } else if ($user->level == 'RT') {
                    return redirect()->intended('RT');
                } else if ($user->level == 'warga') {
                    return redirect()->intended('warga');
                }
                
                return redirect()->intended('/');
            }
        }
        
        return redirect('login')
            ->withInput()
            ->withErrors(['login_gagal' => 'Pastikan kembali username dan password yang dimasukkan sudah benar']);
    }
    
    // -- MEnggunakan password enkripsi
    
    // public function proses_login(Request $request) {
    //     $request->validate([
    //         'nik' => 'required',
    //         'password' => 'required'
    //     ]);

    //     $credential = $request->only('nik', 'password');
    //     if (Auth::attempt($credential)) {
    //         $user = Auth::user();

    //         if ($user->level == 'RW') {
    //             return redirect()->intended('rw');
    //         } else if ($user->level == 'RT') {
    //             return redirect()->intended('rt');
    //         }else if ($user->level == 'warga') {
    //             return redirect()->intended('warga');
    //         }
            
    //         return redirect()->intended('/');

    //     }
        
    //     return redirect('login')
    //         ->withInput()
    //         ->withErrors(['login_gagal' => 'Pastikan kembali username dan password yang dimasukkan sudah benar']);
    // }
    

    public function logout(Request $request) {
        $request->session()->flush();

        Auth::logout();

        return redirect('login');
    }
}