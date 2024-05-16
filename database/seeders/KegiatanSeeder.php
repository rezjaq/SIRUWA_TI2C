<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=[
            [ 
                'nama_kegiatan' => 'Senam Sehat',
                'tanggal_kegiatan' => '2024-04-19',
                'waktu_mulai' => '06:00:00',
                'waktu_selesai' => null,
                'lokasi_kegiatan' => 'Lapangan Utara',
                'deskripsi' => null,
                'status_kegiatan' => 'Aktif',
            ],
            [ 
                'nama_kegiatan' => 'Kerja Bakti',
                'tanggal_kegiatan' => '2024-04-21',
                'waktu_mulai' => '06:00:00',
                'waktu_selesai' => '11:00:00',
                'lokasi_kegiatan' => 'Seluruh Wilayah RW. 02',
                'deskripsi' => null,
                'status_kegiatan' => 'Aktif',
            ],
            [ 
                'nama_kegiatan' => 'Maulid Nabi',
                'tanggal_kegiatan' => '2024-03-20',
                'waktu_mulai' => '19:00:00',
                'waktu_selesai' => '22:00:00',
                'lokasi_kegiatan' => 'Masjid Al-Kautsar',
                'deskripsi' => null,
                'status_kegiatan' => 'Aktif',
            ],
            [ 
                'nama_kegiatan' => 'Lomba Makan Kerupuk',
                'tanggal_kegiatan' => '2023-08-11',
                'waktu_mulai' => '16:00:00',
                'waktu_selesai' => '17:30:00',
                'lokasi_kegiatan' => 'Lapangan Utara',
                'deskripsi' => null,
                'status_kegiatan' => 'Aktif',
            ],
            [ 
                'nama_kegiatan' => 'Posyandu',
                'tanggal_kegiatan' => '2024-05-19',
                'waktu_mulai' => '09:00:00',
                'waktu_selesai' => '11:30:00',
                'lokasi_kegiatan' => 'Pos Posyandu',
                'deskripsi' => null,
                'status_kegiatan' => 'Aktif',
            ],
            [ 
                'nama_kegiatan' => 'Lomba Tenis',
                'tanggal_kegiatan' => '2024-08-22',
                'waktu_mulai' => '19:00:00',
                'waktu_selesai' => '23:30:00',
                'lokasi_kegiatan' => 'Lapangan Utara',
                'deskripsi' => null,
                'status_kegiatan' => 'Non Aktif',
            ],
        ];
        DB::table('kegiatan')->insert($data);
    }
}
