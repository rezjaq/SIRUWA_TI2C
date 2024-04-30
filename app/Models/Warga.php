<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    use HasFactory;
    protected $table = 'penduduk';

    protected $fillable = [
        'nama',
        'nik',
        'password',
        'level',
        'jenis_kelamin',
        'tanggal_lahir',
        'alamat',
        'no_telepon',
        'agama',
        'statusKawin',
        'pekerjaan',
        'no_rt',
        'id_keluarga',
    ];

    public function keluarga()
    {
        return $this->belongsTo(Keluarga::class, 'id_keluarga');
    }
}
