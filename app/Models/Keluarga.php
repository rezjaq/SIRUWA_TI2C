<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keluarga extends Model
{
    use HasFactory;
    protected $table = 'keluarga';

    protected $fillable = [
        'nama_kepala_keluarga',
        'nomor_nik',
        'alamat',
        'no_rumah',
        'no_rt',
    ];
}
