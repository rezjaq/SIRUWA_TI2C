<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WargaPindahMasuk extends Model
{
    use HasFactory;

    protected $table = 'warga_pindah_masuk';

    protected $primaryKey = 'id_wargaPindahMasuk';

    protected $fillable = [
        'nama',
        'nik',
        'jenis_kelamin',
        'tanggal_lahir',
        'alamat',
        'no_telepon',
        'agama',
        'statusKawin',
        'pekerjaan',
        'alamat_asal',
        'tanggal_pindah',
        'no_rt',
        'foto_ktp',
        'foto_surat_pindah',
        'status',
    ];
}
