<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;
    protected $table = 'kegiatan';

    protected $fillable = [
        'nama_kegiatan',
        'tanggal_kegiatan',
        'waktu_kegiatan',
        'lokasi_kegiatan',
        'deskripsi',
        'status_kegiatan',
    ];
}
