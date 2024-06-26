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

        return view('login');
    }

    public function proses_login(Request $request)
    {
        $request->validate([
            'nik' => 'required',
            'password' => 'required'
        ]);

        $user = Warga::where('nik', strtolower($request->nik))
            ->orWhere('nama', strtolower($request->nik))
            ->first();

        if ($user) {
            // Check if the password matches the non-hashed version
            if ($request->password === $user->password) {
                Auth::login($user);

                session()->flash('success', 'Selamat datang, ' . $user->nama);

                if ($request->nik === $request->password) {
                    session(['change_password' => true]);
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
            } elseif (Hash::check($request->password, $user->password)) {
                // Check if the password matches the hashed version
                Auth::login($user);

                session()->flash('success', 'Selamat datang, ' . $user->nama);

                if ($request->nik === $request->password) {
                    session(['change_password' => true]);
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
                // General error message for login failure
                return redirect('login')
                    ->withInput()
                    ->withErrors(['login_gagal' => 'Pastikan kembali username dan password yang dimasukkan sudah benar']);
            }
        }

        return redirect('login')
            ->withInput()
            ->withErrors(['login_gagal' => 'Pastikan kembali username dan password yang dimasukkan sudah benar']);
    }



    private function redirectUserBasedOnLevel($user)
    {
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


    public function changePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed',
        ]);

        $user = Auth::user();

        if (!$user instanceof \App\Models\Warga) {
            return response()->json(['success' => false, 'message' => 'User bukan instance dari model Warga'], 400);
        }

        $user->password = Hash::make($request->password);
        $user->save();
        session()->forget('change_password');

        return response()->json(['success' => true, 'message' => 'Password berhasil diubah.']);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login');
    }
}
