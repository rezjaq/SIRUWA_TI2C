<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    protected $table = 'kegiatan';

    protected $primaryKey = 'id_kegiatan';

    protected $fillable = [
        'nama_kegiatan',
        'tanggal_kegiatan',
        'waktu_mulai',
        'waktu_selesai',
        'lokasi_kegiatan',
        'deskripsi',
        'foto',
        'status_kegiatan',
    ];
}
