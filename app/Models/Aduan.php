<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aduan extends Model
{
    use HasFactory;

    protected $table = 'aduan';

    protected $primaryKey = 'id_aduan';

    protected $fillable = [
        'nik_warga',
        'nama',
        'tempat',
        'tanggal',
        'isi',
        'foto',
        'status_aduan',
    ];

    public function warga()
    {
        return $this->belongsTo(Warga::class, 'nik_warga', 'nik');
    }
}

