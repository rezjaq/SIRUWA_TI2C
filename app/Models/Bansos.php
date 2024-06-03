<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bansos extends Model
{
    use HasFactory;

    protected $table = 'bansos';

    protected $primaryKey = 'id';

    protected $fillable = [
        'pendidikan',
        'pekerjaan',
        'penghasilan',
        'status_kepemilikan_rumah',
        'fasilitas_wc',
        'fasilitas_listrik',
        'bahan_bakar',
        'kepemilikan_tabungan',
        'status',
        'nik_warga',
    ];

    public function warga()
    {
        return $this->belongsTo(Warga::class, 'nik_warga', 'nik');
    }
}
