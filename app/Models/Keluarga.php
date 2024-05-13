<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keluarga extends Model
{
    use HasFactory;

    protected $table = 'keluarga';

    protected $primaryKey = 'id_keluarga';

    protected $fillable = [
        'nama_kepala_keluarga',
        'nomor_nik',
        'alamat',
        'no_rt',
    ];
}
