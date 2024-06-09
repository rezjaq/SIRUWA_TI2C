<?php

namespace App\Http\Controllers\RT;

use App\Http\Controllers\Controller;
use App\Models\Keluarga;
use App\Models\Warga;
use App\Models\WargaPindahMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DateTime;

class DashboardController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Dashboard RT',
        ];

        $page = (object) [
            'title' => 'Dashboard Menu RT'
        ];

        $activeMenu = 'dashboard';

        $no_rt = Auth::user()->no_rt;

        // Menghitung jumlah warga di RT ini
        $jumlahWarga = Warga::where('no_rt', $no_rt)->count();

        // Menghitung jumlah keluarga di RT ini
        $jumlahKeluarga = Keluarga::where('no_rt', $no_rt)->count();

        $jumlahWargaPindahanMasuk = WargaPindahMasuk::where('no_rt', $no_rt)->count();

        return view('rt.dashboard', compact('breadcrumb', 'page', 'activeMenu', 'jumlahWarga', 'jumlahKeluarga', 'jumlahWargaPindahanMasuk'));
    }

    public function genderSpread()
    {
        // Ambil data jumlah laki-laki dan perempuan di RT ini
        $maleCount = Warga::where('jenis_kelamin', 'Laki-laki')->where('no_rt', Auth::user()->no_rt)->count();
        $femaleCount = Warga::where('jenis_kelamin', 'Perempuan')->where('no_rt', Auth::user()->no_rt)->count();

        $data = [
            'male' => $maleCount,
            'female' => $femaleCount,
        ];

        return response()->json($data);
    }

    public function ageSpread()
    {
        // Ambil semua data warga di RT ini
        $wargas = Warga::where('no_rt', Auth::user()->no_rt)->get();

        // Inisialisasi variabel untuk menyimpan jumlah warga dalam setiap kategori usia
        $balitaCount = 0;
        $anakCount = 0;
        $remajaCount = 0;
        $dewasaCount = 0;

        // Hitung jumlah warga dalam setiap kategori usia
        foreach ($wargas as $warga) {
            $umur = $this->hitungUmur($warga->tanggal_lahir);

            if ($umur < 4) {
                $balitaCount++;
            } elseif ($umur >= 4 && $umur <= 10) {
                $anakCount++;
            } elseif ($umur > 10 && $umur <= 20) {
                $remajaCount++;
            } else {
                $dewasaCount++;
            }
        }

        // Siapkan data untuk digunakan dalam diagram pie
        $data = [
            'Balita' => $balitaCount,
            'Anak' => $anakCount,
            'Remaja' => $remajaCount,
            'Dewasa' => $dewasaCount,
        ];

        return response()->json($data);
    }

    // Fungsi untuk menghitung umur berdasarkan tanggal lahir
    private function hitungUmur($tanggal_lahir)
    {
        $today = new DateTime('today');
        $umur = $today->diff(new DateTime($tanggal_lahir));
        return $umur->y;
    }

    public function maritalStatusSpread()
    {
        // Ambil data jumlah warga berdasarkan status kawin di RT ini
        $marriedCount = Warga::where('statusKawin', 'Kawin')->where('no_rt', Auth::user()->no_rt)->count();
        $unmarriedCount = Warga::where('statusKawin', 'Belum Kawin')->where('no_rt', Auth::user()->no_rt)->count();
        $divorcedCount = Warga::where('statusKawin', 'Bercerai')->where('no_rt', Auth::user()->no_rt)->count();

        $data = [
            'Kawin' => $marriedCount,
            'Belum Kawin' => $unmarriedCount,
            'Bercerai' => $divorcedCount,
        ];

        return response()->json($data);
    }
}
