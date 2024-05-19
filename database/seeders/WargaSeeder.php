<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nik' => '111111',
                'nama' => 'Sukijan',
                'password' => '123456',
                'level' => 'RW',
                'jenis_kelamin' => 'Laki-laki',
                'tanggal_lahir' => '1990-01-01',
                'alamat' => 'paiton',
                'no_telepon' => '081234567890',
                'agama' => 'Islam',
                'statusKawin' => 'kawin',
                'pekerjaan' => 'Wiraswasta',
                'no_rt' => '3',
                'id_keluarga' => null, // Sesuaikan dengan ID Keluarga yang terkait
            ],
            [
                'nik' => '222222',
                'nama' => 'Soebandi',
                'password' => '123456',
                'level' => 'RT',
                'jenis_kelamin' => 'Laki-laki',
                'tanggal_lahir' => '1990-01-01',
                'alamat' => 'paiton',
                'no_telepon' => '081234567890',
                'agama' => 'Islam',
                'statusKawin' => 'kawin',
                'pekerjaan' => 'Guru',
                'no_rt' => '3',
                'id_keluarga' => null, // Sesuaikan dengan ID Keluarga yang terkait
            ],
            [
                'nik' => '333333',
                'nama' => 'Bimantara',
                'password' => '123456',
                'level' => 'warga',
                'jenis_kelamin' => 'Laki-laki',
                'tanggal_lahir' => '1990-01-01',
                'alamat' => 'paiton',
                'no_telepon' => '081234567890',
                'agama' => 'Islam',
                'statusKawin' => 'Belum kawin',
                'pekerjaan' => 'Mahasiswa',
                'no_rt' => '3',
                'id_keluarga' => null, // Sesuaikan dengan ID Keluarga yang terkait
            ],
        ];

        DB::table('warga')->insert($data);
    }
}
