<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;

    protected $table = 'surat';

    protected $primaryKey = 'id_surat';

    protected $fillable = [
        'jenis_surat',
        'tanggal_surat',
        'nik_warga',
        'keterangan',
    ];

    public function warga()
    {
        return $this->belongsTo(Warga::class, 'nik_warga', 'nik');
    }
}
