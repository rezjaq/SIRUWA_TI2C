<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crips extends Model
{
    use HasFactory;

    protected $fillable = ['kriteria_id', 'nama_crips', 'bobot'];

    // Relasi dengan model Kriteria
    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class, 'kriteria_id');
    }

    // Relasi dengan model Penilaian
    public function penilaian()
    {
        return $this->hasMany(Penilaian::class, 'crips_id');
    }

    public function pengajuan()
    {
        return $this->belongsToMany(PengajuanBansos::class, 'id_pengajuanBansos');
    }
}
