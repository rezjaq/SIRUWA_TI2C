<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user) {
            if ($user->level == 'RW') {
                return redirect()->intended('RW');
            } elseif ($user->level == 'RT') {
                return redirect()->intended('RT');
            } elseif ($user->level == 'warga') {
                return redirect()->intended('warga')->with('user', $user);
            }
        }
        return view('login');
    }


    public function proses_login(Request $request)
    {
        $request->validate([
            'nik' => 'required',
            'password' => 'required'
        ]);

        $user = Warga::where('nik', $request->nik)->first();

        if ($user) {
            // Check if the password matches the non-hashed version
            if ($request->password === $user->password) {
                Auth::login($user);

                session()->flash('success', 'Selamat datang, ' . $user->nama);

                if ($request->nik === $request->password) {
                    session(['change_password' => true]);
                    return redirect()->route('change-password');
                }

                // Redirect based on user level
                switch ($user->level) {
                    case 'RW':
                        return redirect()->intended('RW');
                    case 'RT':
                        return redirect()->intended('RT');
                    case 'warga':
                        return redirect()->intended('warga')->with('user', $user);
                    default:
                        return redirect()->intended('/');
                }
            }
            // Check if the password matches the hashed version
            elseif (Hash::check($request->password, $user->password)) {
                Auth::login($user);

                session()->flash('success', 'Selamat datang, ' . $user->nama);

                if ($request->nik === $request->password) {
                    session(['change_password' => true]);
                    return redirect()->route('change-password');
                }

                // Redirect based on user level
                switch ($user->level) {
                    case 'RW':
                        return redirect()->intended('RW');
                    case 'RT':
                        return redirect()->intended('RT');
                    case 'warga':
                        return redirect()->intended('warga')->with('user', $user);
                    default:
                        return redirect()->intended('/');
                }
            } else {
                return redirect('login')
                    ->withInput()
                    ->withErrors(['login_gagal' => 'Pastikan kembali username dan password yang dimasukkan sudah benar']);
            }
        }

        return redirect('login')
            ->withInput()
            ->withErrors(['login_gagal' => 'Pastikan kembali username dan password yang dimasukkan sudah benar']);
    }



    public function changePassword(Request $request)
    {

        $request->validate([
            'password' => 'required|confirmed',
        ]);

        $user = Auth::user();

        if (!$user instanceof \App\Models\Warga) {
            dd('User is not an instance of Warga model');
        }

        $user->password = Hash::make($request->password);
        $user->save();

        session()->flash('success', 'Password berhasil diubah.');

        return redirect()->route('dashboard-warga');
    }

    public function showChangePasswordForm()
    {
        return view('auth.change-password');
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login');
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
}
