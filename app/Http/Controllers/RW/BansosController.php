<?php

namespace App\Http\Controllers\RW;

use App\Http\Controllers\Controller;
use App\Models\Bansos;
use App\Models\Warga;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BansosController extends Controller
{
    public function viewRankedScores()
    {
        $breadcrumb = (object) [
            'title' => 'Menu Bansos',
        ];

        $page = (object) [
            'title' => 'Daftar Penerima Bansos yang Dirangking'
        ];
        $activeMenu = 'Bansos';

        return view('rw.bansos.index', compact('breadcrumb', 'activeMenu', 'page'));
    }

    public function listRankedScores()
    {
        // Matriks Perbandingan Berpasangan
        $pairwiseMatrix = [
            'pendidikan' => [
                'pendidikan' => 1, 'pekerjaan' => 5, 'penghasilan' => 7, 'status_kepemilikan_rumah' => 2, 'fasilitas_wc' => 0.5, 'fasilitas_listrik' => 0.5, 'bahan_bakar' => 0.5, 'kepemilikan_tabungan' => 7
            ],
            'pekerjaan' => [
                'pendidikan' => 0.2, 'pekerjaan' => 1, 'penghasilan' => 5, 'status_kepemilikan_rumah' => 0.2, 'fasilitas_wc' => 0.5, 'fasilitas_listrik' => 0.2, 'bahan_bakar' => 0.5, 'kepemilikan_tabungan' => 5
            ],
            'penghasilan' => [
                'pendidikan' => 0.1428571429, 'pekerjaan' => 0.2, 'penghasilan' => 1, 'status_kepemilikan_rumah' => 0.2, 'fasilitas_wc' => 0.5, 'fasilitas_listrik' => 0.2, 'bahan_bakar' => 0.1428571429, 'kepemilikan_tabungan' => 3
            ],
            'status_kepemilikan_rumah' => [
                'pendidikan' => 0.5, 'pekerjaan' => 5, 'penghasilan' => 5, 'status_kepemilikan_rumah' => 1, 'fasilitas_wc' => 0.3333333333, 'fasilitas_listrik' => 0.25, 'bahan_bakar' => 0.1428571429, 'kepemilikan_tabungan' => 4
            ],
            'fasilitas_wc' => [
                'pendidikan' => 2, 'pekerjaan' => 2, 'penghasilan' => 2, 'status_kepemilikan_rumah' => 3, 'fasilitas_wc' => 1, 'fasilitas_listrik' => 4, 'bahan_bakar' => 5, 'kepemilikan_tabungan' => 5
            ],
            'fasilitas_listrik' => [
                'pendidikan' => 2, 'pekerjaan' => 5, 'penghasilan' => 5, 'status_kepemilikan_rumah' => 4, 'fasilitas_wc' => 0.25, 'fasilitas_listrik' => 1, 'bahan_bakar' => 0.3333333333, 'kepemilikan_tabungan' => 2
            ],
            'bahan_bakar' => [
                'pendidikan' => 2, 'pekerjaan' => 2, 'penghasilan' => 7, 'status_kepemilikan_rumah' => 7, 'fasilitas_wc' => 0.2, 'fasilitas_listrik' => 3, 'bahan_bakar' => 1, 'kepemilikan_tabungan' => 5
            ],
            'kepemilikan_tabungan' => [
                'pendidikan' => 0.1428571429, 'pekerjaan' => 0.2, 'penghasilan' => 0.3333333333, 'status_kepemilikan_rumah' => 0.25, 'fasilitas_wc' => 0.2, 'fasilitas_listrik' => 0.5, 'bahan_bakar' => 0.2, 'kepemilikan_tabungan' => 1
            ]
        ];

        // Jumlah setiap kolom
        $columnSums = [
            'pendidikan' => 7.985714286,
            'pekerjaan' => 20.4,
            'penghasilan' => 32.33333333,
            'status_kepemilikan_rumah' => 17.65,
            'fasilitas_wc' => 3.483333333,
            'fasilitas_listrik' => 9.65,
            'bahan_bakar' => 7.819047619,
            'kepemilikan_tabungan' => 32
        ];

        // Hitung bobot prioritas menggunakan AHP
        $relativeWeights = $this->calculateAHPWeights($pairwiseMatrix, $columnSums);

        // Mengumpulkan data calon penerima bansos
        $recipients = Bansos::where('status', 'pending')->get();

        // Menghitung skor kriteria untuk setiap calon penerima
        foreach ($recipients as $recipient) {
            $warga = Warga::where('nik', $recipient->nik_warga)->first();
            if ($warga) {
                $recipient->nama_warga = $warga->nama;
            }
            $recipient->score = $this->calculateWPMScore($recipient, $relativeWeights);
        }

        // Urutkan calon penerima berdasarkan skor final
        $sortedRecipients = $recipients->sortByDesc('score');

        // Kembalikan data calon penerima yang sudah disortir
        return DataTables::of($sortedRecipients)
            ->addIndexColumn()
            ->addColumn('aksi', function ($row) {
                $btn = '<a href="' . route('RW.Bansos.show', $row->id) . '" class="btn btn-info btn-sm">Detail</a>';
                $btn .= '<a href="' . route('RW.Bansos.approve', $row->id) . '" class="btn btn-success btn-sm">Approve</a>';
                $btn .= '<a href="' . route('RW.Bansos.reject', $row->id) . '" class="btn btn-danger btn-sm">Reject</a>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }


    private function calculateAHPWeights($pairwiseMatrix, $columnSums)
    {
        $normalizedMatrix = [];
        $criteriaCount = count($pairwiseMatrix);

        // Normalisasi matriks
        foreach ($pairwiseMatrix as $criteria => $comparisons) {
            foreach ($comparisons as $key => $value) {
                $normalizedMatrix[$criteria][$key] = $value / $columnSums[$key];
            }
        }

        // Hitung bobot prioritas
        $weights = [];
        foreach ($normalizedMatrix as $criteria => $values) {
            $weights[$criteria] = array_sum($values) / $criteriaCount;
        }

        return $weights;
    }

    private function calculateWPMScore($recipient, $weights)
    {
        $criteria = [
            'pendidikan', 'pekerjaan', 'penghasilan', 'status_kepemilikan_rumah',
            'fasilitas_wc', 'fasilitas_listrik', 'bahan_bakar', 'kepemilikan_tabungan'
        ];

        $score = 1;
        foreach ($criteria as $criterion) {
            $score *= pow($recipient->$criterion, $weights[$criterion]);
        }

        return $score;
    }

    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Pengajuan',
            'list' => ['Home', 'Bansos', 'Create']
        ];

        $activeMenu = 'Bansos';
        // Ambil semua warga yang sudah terverifikasi
        $warga = Warga::where('verif', 'terverifikasi')->get();

        return view('rw.bansos.create', compact('breadcrumb', 'activeMenu','warga'));
    }

    // Method untuk menyimpan pengajuan bansos baru
    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'nik_warga' => 'required',
            'pendidikan' => 'required',
            'pekerjaan' => 'required',
            'penghasilan' => 'required',
            'status_kepemilikan_rumah' => 'required',
            'fasilitas_wc' => 'required',
            'fasilitas_listrik' => 'required',
            'bahan_bakar' => 'required',
            'kepemilikan_tabungan' => 'required',
        ]);

        // Simpan data pengajuan bansos ke database
        Bansos::create($request->all());

        // Redirect ke halaman yang sesuai
        return redirect()->route('RW.bansos.ranked-scores')->with('success', 'Pengajuan bansos berhasil ditambahkan.');
    }

    public function show($id)
    {
        $breadcrumb = (object) [
            'title' => 'Detail Pengajuan',
            'list' => ['Home', 'Bansos', 'Detail']
        ];

        $activeMenu = 'Bansos';
        // Mengambil data bansos berdasarkan id
        $bansos = Bansos::with('warga')->findOrFail($id);

        $kriteria = [
            'pendidikan' => [
                1 => 'Tamat SLTA',
                2 => 'Tamat SLTP',
                3 => 'Tamat SD',
                4 => 'Tidak Tamat SD'
            ],
            'pekerjaan' => [
                1 => 'Swasta',
                2 => 'Petani',
                3 => 'Buruh',
                4 => 'IRT'
            ],
            'penghasilan' => [
                1 => '> Rp.1.000.000',
                2 => 'Rp.750.000-Rp.900.000',
                3 => 'Rp.600.000-Rp.700.000',
                4 => 'Rp.500.000-Rp.550.000'
            ],
            'status_kepemilikan_rumah' => [
                1 => 'Milik sendiri',
                2 => 'Milik orang tua/anak',
                3 => 'Tidak memiliki rumah/kontrak'
            ],
            'fasilitas_wc' => [
                1 => 'WC pribadi/milik sendiri',
                2 => 'WC Umum'
            ],
            'fasilitas_listrik' => [
                1 => 'Listrik PLN 1.300 W',
                2 => 'Listrik PLN 900 W',
                3 => 'Listrik PLN 450 W',
                4 => 'Tanpa listrik/Lampu tembok'
            ],
            'bahan_bakar' => [
                1 => 'Gas LPG',
                2 => 'Minyak tanah',
                3 => 'Kayu bakar'
            ],
            'kepemilikan_tabungan' => [
                1 => 'Tabungan > Rp.1000.000',
                2 => 'Tabungan < Rp.1000.000',
                3 => 'Tidak memiliki tabungan'
            ]
        ];

        // Mengirim data ke view
        return view('rw.bansos.show', compact('breadcrumb', 'activeMenu', 'bansos', 'kriteria'));
    }

    public function approve($id)
    {
        $bansos = Bansos::findOrFail($id);
        $bansos->status = 'approved';
        $bansos->save();

        return redirect()->route('RW.bansos.ranked-scores')->with('success', 'Pengajuan bansos telah disetujui.');
    }

    public function reject($id)
    {
        $bansos = Bansos::findOrFail($id);
        $bansos->status = 'rejected';
        $bansos->save();

        return redirect()->route('RW.bansos.ranked-scores')->with('success', 'Pengajuan bansos telah ditolak.');
    }
}
