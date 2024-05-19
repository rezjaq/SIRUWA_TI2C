<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KeluargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id_keluarga' => '3525020412150003',
                'nama_kepala_keluarga' => 'MUHAMAD RENDITYA ADAM AL FATIH',
                'nomor_nik' => '3525022312140002',
                'alamat' => 'Jl. Onggojoyo No. 1',
                'no_rt' => '4',
            ],
            [
                'id_keluarga' => '3525020504160003',
                'nama_kepala_keluarga' => 'SALIM EFFENDI',
                'nomor_nik' => '3525021003820001',
                'alamat' => 'Jl. Onggojoyo No. 2',
                'no_rt' => '4',
            ],
            [
                'id_keluarga' => '3525020509130002',
                'nama_kepala_keluarga' => 'KUSWANTO',
                'nomor_nik' => '3506152206810002',
                'alamat' => 'Jl. Onggojoyo No. 3',
                'no_rt' => '4',
            ],
            [
                'id_keluarga' => '3525020601120010',
                'nama_kepala_keluarga' => 'KARSI',
                'nomor_nik' => '3525027112670018',
                'alamat' => 'Jl. Onggojoyo No. 4',
                'no_rt' => '4',
            ],
            [
                'id_keluarga' => '3525020708120004',
                'nama_kepala_keluarga' => 'RIZKI NURDIYANTO',
                'nomor_nik' => '3525162901900002',
                'alamat' => 'Jl. Onggojoyo No. 5',
                'no_rt' => '4',
            ],
            [
                'id_keluarga' => '3525020801140001',
                'nama_kepala_keluarga' => 'LUQMAN TANTOWI',
                'nomor_nik' => '3525041206900002',
                'alamat' => 'Jl. Onggojoyo No. 6',
                'no_rt' => '4',
            ],
            [
                'id_keluarga' => '3525020804150004',
                'nama_kepala_keluarga' => 'PIKAH',
                'nomor_nik' => '3525027112710001',
                'alamat' => 'Jl. Onggojoyo No. 7',
                'no_rt' => '5',
            ],
            [
                'id_keluarga' => '3525020805090002',
                'nama_kepala_keluarga' => 'SARJI',
                'nomor_nik' => '3525021105750001',
                'alamat' => 'Jl. Onggojoyo No. 8',
                'no_rt' => '5',
            ],
            [
                'id_keluarga' => '3525020808160004',
                'nama_kepala_keluarga' => 'ALIMAH',
                'nomor_nik' => '3525027112640012',
                'alamat' => 'Jl. Onggojoyo No. 9',
                'no_rt' => '5',
            ],
            [
                'id_keluarga' => '3525020808160009',
                'nama_kepala_keluarga' => 'HANIFAH',
                'nomor_nik' => '3525027112580016',
                'alamat' => 'Jl. Onggojoyo No. 10',
                'no_rt' => '5',
            ],
            [
                'id_keluarga' => '3525020810120003',
                'nama_kepala_keluarga' => 'RIANTO',
                'nomor_nik' => '3525021404840004',
                'alamat' => 'Jl. Onggojoyo No. 11',
                'no_rt' => '5',
            ],
            [
                'id_keluarga' => '3525020812100003',
                'nama_kepala_keluarga' => 'NUR HUDA',
                'nomor_nik' => '3525020207880002',
                'alamat' => 'Jl. Onggojoyo No. 12',
                'no_rt' => '6',
            ],
            [
                'id_keluarga' => '3525020901170005',
                'nama_kepala_keluarga' => 'ACHMAD QOIRUL HIDAYAT',
                'nomor_nik' => '3525020301940001',
                'alamat' => 'Jl. Onggojoyo No. 13',
                'no_rt' => '6',
            ],
            [
                'id_keluarga' => '3525020906160001',
                'nama_kepala_keluarga' => 'ABDUL ROKHMAN',
                'nomor_nik' => '3525022204970001',
                'alamat' => 'Jl. Onggojoyo No. 14',
                'no_rt' => '6',
            ],
            [
                'id_keluarga' => '3525020910120003',
                'nama_kepala_keluarga' => 'ABDUL MUCHITH',
                'nomor_nik' => '3525020206830001',
                'alamat' => 'Jl. Onggojoyo No. 15',
                'no_rt' => '6',
            ],
            [
                'id_keluarga' => '3525021006160002',
                'nama_kepala_keluarga' => 'FALAQI AMNAN ABDULLAH',
                'nomor_nik' => '3516011804910001',
                'alamat' => 'Jl. Onggojoyo No. 16',
                'no_rt' => '6',
            ],
            [
                'id_keluarga' => '3525021006160003',
                'nama_kepala_keluarga' => 'WISNU KIKI SAPUTRO',
                'nomor_nik' => '3525022607930001',
                'alamat' => 'Jl. Onggojoyo No. 17',
                'no_rt' => '6',
            ],
        ];

        DB::table('keluarga')->insert($data);
    }
}
