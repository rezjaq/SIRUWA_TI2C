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
        [
            'id_keluarga' => '3525020502160001',
            'nama_kepala_keluarga' => 'ACHMAD YASIN',
            'nomor_nik' => '3525020909000002',
            'alamat' => 'Jl. Kertarejasa Gang II no. 1',
            'no_rt' => '2'
        ],
        [
            'id_keluarga' => '3525021701120005',
            'nama_kepala_keluarga' => 'MUHAMMAD ASPUJI',
            'nomor_nik' => '3525020504010005',
            'alamat' => 'Jl. Kertarejasa Gang II no. 2',
            'no_rt' => '2'
        ],
        [
            'id_keluarga' => '3525021701120008',
            'nama_kepala_keluarga' => 'BUDI TRI SUTRISNO',
            'nomor_nik' => '3525021804860002',
            'alamat' => 'Jl. Kertarejasa Gang II no. 3',
            'no_rt' => '2'
        ],
        [
            'id_keluarga' => '3525021807160003',
            'nama_kepala_keluarga' => 'NANANG BUKHORI',
            'nomor_nik' => '3525021405890002',
            'alamat' => 'Jl. Kertarejasa Gang II no. 4',
            'no_rt' => '2'
        ],
        [
            'id_keluarga' => '3525021812150004',
            'nama_kepala_keluarga' => 'SISWANTO',
            'nomor_nik' => '3525022406860003',
            'alamat' => 'Jl. Kertarejasa Gang II no. 5',
            'no_rt' => '2'
        ],
        [
            'id_keluarga' => '3525021905100005',
            'nama_kepala_keluarga' => 'NUR SAMSI',
            'nomor_nik' => '3525020211830001',
            'alamat' => 'Jl. Kertarejasa Gang II no. 6',
            'no_rt' => '3'
        ],
        [
            'id_keluarga' => '3525021905100006',
            'nama_kepala_keluarga' => 'AGUS EKO SUSANTO',
            'nomor_nik' => '3525020108840001',
            'alamat' => 'Jl. Kertarejasa Gang II no. 7',
            'no_rt' => '3'
        ],
        [
            'id_keluarga' => '3525021906130003',
            'nama_kepala_keluarga' => 'DEWIANA',
            'nomor_nik' => '3525027006760037',
            'alamat' => 'Jl. Kertarejasa Gang II no. 8',
            'no_rt' => '3'
        ],
        [
            'id_keluarga' => '3525021911089170',
            'nama_kepala_keluarga' => 'JUNAEDI',
            'nomor_nik' => '3525020111730004',
            'alamat' => 'Jl. Kertarejasa Gang II no. 9',
            'no_rt' => '3'
        ],
        [
            'id_keluarga' => '3525021911089171',
            'nama_kepala_keluarga' => 'LILIS ISTIQOMAH',
            'nomor_nik' => '3525024301720001',
            'alamat' => 'Jl. Kertarejasa Gang II no. 10',
            'no_rt' => '3'
        ],
        //RT
        [
            'id_keluarga' => '3525021911089173',
            'nama_kepala_keluarga' => 'MUHAMMAD SAID',
            'nomor_nik' => '3525020208670023',
            'alamat' => 'Jl. Sidoagung no. 14',
            'no_rt' => '1'
        ],
        [
            'id_keluarga' => '3525022607000002',
            'nama_kepala_keluarga' => 'MUHAMMAD AINUN NAJA',
            'nomor_nik' => '3525021911089178',
            'alamat' => 'Jl. Kertarejasa Gang II no. 15',
            'no_rt' => '2'
        ],
        [
            'id_keluarga' => '3525021911089239',
            'nama_kepala_keluarga' => 'AHMAD ZAENURI',
            'nomor_nik' => '3525026506830001',
            'alamat' => 'Jl. Kertarejasa Gang II no. 16',
            'no_rt' => '3'
        ],
        [
            'id_keluarga' => '3525021609040002',
            'nama_kepala_keluarga' => 'USTMAN JUNAEDI',
            'nomor_nik' => '3525021911089174',
            'alamat' => 'Jl. Onggojoyo no. 56',
            'no_rt' => '4'
        ],
        [
            'id_keluarga' => '3525021911089176',
            'nama_kepala_keluarga' => 'MUHAMMAD SANDIM',
            'nomor_nik' => '3525022807760002',
            'alamat' => 'Jl. Onggojoyo no. 70',
            'no_rt' => '5'
        ],
        [
            'id_keluarga' => '3525021911089250',
            'nama_kepala_keluarga' => 'MULYONO',
            'nomor_nik' => '3525021911970004',
            'alamat' => 'Jl. Onggojoyo no. 88',
            'no_rt' => '6'
        ],
        [
            'id_keluarga' => '3525021911089253',
            'nama_kepala_keluarga' => 'HADI SRIONO',
            'nomor_nik' => '2502480677000822',
            'alamat' => 'Jl. Kertarejasa Gang II no. 20',
            'no_rt' => '6'
        ],
        ];
        DB::table('keluarga')->insert($data);
    }

}