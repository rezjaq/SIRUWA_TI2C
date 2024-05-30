<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanBansos extends Model
{
    use HasFactory;

    protected $table = 'pengajuan_bansos';

    protected $primaryKey = 'id_pengajuanBansos';

    protected $fillable = [
        'nik_warga',
        'pendapatan_1bln',
        'sktm',
        'status_pengajuan',
        'keterangan',
    ];

    public function warga()
    {
        return $this->belongsTo(Warga::class, 'nik_warga', 'nik');
    }

    public function kriteria()
    {
        return $this->belongsToMany(Kriteria::class, 'kriteria_id');
    }

    public function crip()
    {
        return $this->belongsToMany(Crips::class, 'id');
    }
}
