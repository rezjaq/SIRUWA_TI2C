<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsahaWarga extends Model
{
    use HasFactory;

    protected $table = 'usaha_warga';

    protected $primaryKey = 'id_usahaWarga';

    protected $fillable = [
        'nik_warga',
        'nama_usaha',
        'jenis_usaha',
        'alamat_usaha',
        'keterangan',
        'status',  // Add this line
    ];

    public function warga()
    {
        return $this->belongsTo(Warga::class, 'nik_warga', 'nik');
    }
}

