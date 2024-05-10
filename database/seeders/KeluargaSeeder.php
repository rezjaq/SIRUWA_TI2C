<?php

namespace Database\Seeders;

use App\Models\Warga;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KeluargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=[
        [
            'id_keluarga' => '3525020706170003',
            'nama_kepala_keluarga' => 'ERNAWATI',
            'nomor_nik' => '3525025606910001',
            'alamat' => 'Jl. Sidoagung no. 1',
            'no_rt' => '1'
        ],
        [
            'id_keluarga' => '3525021911089185',
            'nama_kepala_keluarga' => 'SUTO',
            'nomor_nik' => '3525021504770003',
            'alamat' => 'Jl. Sidoagung no. 2',
            'no_rt' => '1'
        ],
        [
            'id_keluarga' => '3525020107100006',
            'nama_kepala_keluarga' => 'UMI KULSUM',
            'nomor_nik' => '3525025608810003',
            'alamat' => 'Jl. Sidoagung no. 3',
            'no_rt' => '1'
        ],
        [
            'id_keluarga' => '3525020112110002',
            'nama_kepala_keluarga' => 'SUHERI',
            'nomor_nik' => '3525022703850021',
            'alamat' => 'Jl. Sidoagung no. 4',
            'no_rt' => '1'
        ],
        [
            'id_keluarga' => '3525020201150002',
            'nama_kepala_keluarga' => 'MARDI UTOMO',
            'nomor_nik' => '3524012507870001',
            'alamat' => 'Jl. Sidoagung no. 5',
            'no_rt' => '1'
        ],
        [
            'id_keluarga' => '3525020202120004',
            'nama_kepala_keluarga' => 'KASIH',
            'nomor_nik' => '3525027112420014',
            'alamat' => 'Jl. Sidoagung no. 6',
            'no_rt' => '1'
        ],
        [
            'id_keluarga' => '3525020207120003',
            'nama_kepala_keluarga' => 'MUHAMMAD ATIQ',
            'nomor_nik' => '3525020805900001',
            'alamat' => 'Jl. Sidoagung no. 7',
            'no_rt' => '1'
        ],
        [
            'id_keluarga' => '3525020209150001',
            'nama_kepala_keluarga' => 'HADI SUTONO',
            'nomor_nik' => '3524110508780004',
            'alamat' => 'Jl. Sidoagung no. 8',
            'no_rt' => '1'
        ],
        [
            'id_keluarga' => '3525020304100004',
            'nama_kepala_keluarga' => 'DAI',
            'nomor_nik' => '3525020207790004',
            'alamat' => 'Jl. Sidoagung no. 9',
            'no_rt' => '1'
        ],
        [
            'id_keluarga' => '3525020312080005',
            'nama_kepala_keluarga' => 'SAKRI',
            'nomor_nik' => '3525023112750004',
            'alamat' => 'Jl. Sidoagung no. 10',
            'no_rt' => '1'
        ],
        [
            'id_keluarga' => '3525020408090003',
            'nama_kepala_keluarga' => 'JUMALI',
            'nomor_nik' => '3525021806720001',
            'alamat' => 'Jl. Sidoagung no. 11',
            'no_rt' => '1'
        ],
        [
            'id_keluarga' => '3525020410160002',
            'nama_kepala_keluarga' => 'MUSTAQIM',
            'nomor_nik' => '3525020208820002',
            'alamat' => 'Jl. Sidoagung no. 12',
            'no_rt' => '1'
        ],
        [
            'id_keluarga' => '3525020410160003',
            'nama_kepala_keluarga' => 'SAMSUDIN',
            'nomor_nik' => '3525021207750024',
            'alamat' => 'Jl. Sidoagung no. 13',
            'no_rt' => '1'
        ],
        ];
        DB::table('keluarga')->insert($data);
    }

}