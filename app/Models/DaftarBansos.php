<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarBansos extends Model
{
    use HasFactory;

    protected $table = 'daftar_bansos';

    protected $primaryKey = 'id_daftarBansos';

    protected $fillable = [
        'nama_bansos',
        'deskripsi',
        'tanggal_mulai',
        'tanggal_selesai',
        'keterangan_tambahan',
    ];
}
