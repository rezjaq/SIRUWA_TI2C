<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;

    protected $table = 'penilaian'; // Nama tabel
    protected $fillable = ['alternatif_id', 'crips_id']; // Kolom yang bisa diisi secara massal

    // Relasi dengan model Alternatif
    public function alternatif()
    {
        return $this->belongsTo(Alternatif::class, 'alternatif_id');
    }

    // Relasi dengan model Crips
    public function crips()
    {
        return $this->belongsTo(Crips::class, 'crips_id');
    }
}