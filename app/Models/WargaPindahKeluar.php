<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WargaPindahKeluar extends Model
{
    use HasFactory;

    protected $table = 'warga_pindah_keluar';

    protected $primaryKey = 'id_wargaPindahKeluar';

    protected $fillable = [
        'nik_warga',
        'alamat_tujuan',
        'tanggal_pindah',
    ];

    public function warga()
    {
        return $this->belongsTo(Warga::class, 'nik_warga', 'nik');
    }
}
