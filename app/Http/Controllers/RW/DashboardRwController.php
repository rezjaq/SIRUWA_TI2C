<?php

namespace App\Http\Controllers\RW;

use App\Http\Controllers\Controller;
use App\Models\Bansos;
use App\Models\Keluarga;
use App\Models\Warga;
use App\Models\WargaPindahMasuk;
use DateTime;
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

        return view('rw.dashboard', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);
    }

    public function wargaSpread()
    {
        // Ambil semua data warga
        $wargas = Warga::where('status', 'disetujui')->get();

        // Inisialisasi array untuk menyimpan jumlah warga di setiap RT
        $rtCounts = [];

        // Hitung jumlah warga di setiap RT
        foreach ($wargas as $warga) {
            $rt = $warga->no_rt;

            if (!isset($rtCounts[$rt])) {
                $rtCounts[$rt] = 0;
            }

            $rtCounts[$rt]++;
        }

        // Transformasikan data untuk digunakan dalam diagram
        $data = [];
        foreach ($rtCounts as $rt => $count) {
            $data[] = [
                'rt' => $rt,
                'count' => $count,
            ];
        }

        return response()->json($data);
    }

    public function familySpread()
    {
        // Ambil semua data keluarga
        $keluargas = Keluarga::where('status', 'disetujui')->get();
        $rtCounts = [];

        // Hitung jumlah keluarga di setiap RT
        foreach ($keluargas as $keluarga) {
            $rt = $keluarga->no_rt;
            if (!isset($rtCounts[$rt])) {
                $rtCounts[$rt] = 0;
            }
            $rtCounts[$rt]++;
        }

        $data = [];
        foreach ($rtCounts as $rt => $count) {
            $data[] = [
                'rt' => $rt,
                'count' => $count,
            ];
        }

        return response()->json($data);
    }

    public function wargaPindahanSpread()
    {
        // Ambil semua data warga pindahan masuk
        $wargaPindahan = WargaPindahMasuk::where('status', 'selesai')->get();

        // Inisialisasi array untuk menyimpan jumlah warga pindahan di setiap RT
        $rtCounts = [];

        // Hitung jumlah warga pindahan di setiap RT
        foreach ($wargaPindahan as $warga) {
            $rt = $warga->no_rt;

            if (!isset($rtCounts[$rt])) {
                $rtCounts[$rt] = 0;
            }

            $rtCounts[$rt]++;
        }

        // Transformasikan data untuk digunakan dalam diagram
        $data = [];
        foreach ($rtCounts as $rt => $count) {
            $data[] = [
                'rt' => $rt,
                'count' => $count,
            ];
        }

        return response()->json($data);
    }

    public function bansosSpread()
    {
        // Ambil semua data bansos dengan status "diterima" atau sesuai kebutuhan
        $bansos = Bansos::where('status', 'approved')->get();

        // Inisialisasi array untuk menyimpan jumlah penerima bansos di setiap RT
        $rtCounts = [];

        // Hitung jumlah penerima bansos di setiap RT
        foreach ($bansos as $b) {
            $rt = $b->warga->no_rt;

            if (!isset($rtCounts[$rt])) {
                $rtCounts[$rt] = 0;
            }

            $rtCounts[$rt]++;
        }

        // Transformasikan data untuk digunakan dalam diagram
        $data = [];
        foreach ($rtCounts as $rt => $count) {
            $data[] = [
                'rt' => $rt,
                'count' => $count,
            ];
        }

        return response()->json($data);
    }

    public function bansosSubmissionSpread()
    {
        $bansos = Bansos::where('status', 'pending')->get();

        $rtCounts = [];

        foreach ($bansos as $b) {
            $rt = $b->warga->no_rt;

            if (!isset($rtCounts[$rt])) {
                $rtCounts[$rt] = 0;
            }

            $rtCounts[$rt]++;
        }

        $data = [];
        foreach ($rtCounts as $rt => $count) {
            $data[] = [
                'rt' => $rt,
                'count' => $count,
            ];
        }

        return response()->json($data);
    }

    public function bansosRejectedSpread()
    {
        $bansos = Bansos::where('status', 'rejected')->get();

        $rtCounts = [];

        foreach ($bansos as $b) {
            $rt = $b->warga->no_rt;

            if (!isset($rtCounts[$rt])) {
                $rtCounts[$rt] = 0;
            }

            $rtCounts[$rt]++;
        }

        $data = [];
        foreach ($rtCounts as $rt => $count) {
            $data[] = [
                'rt' => $rt,
                'count' => $count,
            ];
        }

        return response()->json($data);
    }

    public function genderSpread()
    {
        // Ambil data jumlah laki-laki dan perempuan
        $maleCount = Warga::where('jenis_kelamin', 'Laki-laki')->count();
        $femaleCount = Warga::where('jenis_kelamin', 'Perempuan')->count();

        $data = [
            'male' => $maleCount,
            'female' => $femaleCount,
        ];

        return response()->json($data);
    }

    public function ageSpread()
    {
        // Ambil semua data warga
        $wargas = Warga::all();

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
        // Ambil data jumlah warga berdasarkan status kawin
        $marriedCount = Warga::where('statusKawin', 'Kawin')->count();
        $unmarriedCount = Warga::where('statusKawin', 'Belum Kawin')->count();
        $divorcedCount = Warga::where('statusKawin', 'Bercerai')->count();

        $data = [
            'Kawin' => $marriedCount,
            'Belum Kawin' => $unmarriedCount,
            'Bercerai' => $divorcedCount,
        ];

        return response()->json($data);
    }
}
