<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    use HasFactory;

    protected $table = 'alternatif'; // Nama tabel
    protected $fillable = ['nama_alternatif']; // Kolom yang bisa diisi secara massal

    // Relasi dengan model Penilaian
    public function penilaian()
    {
        return $this->hasMany(Penilaian::class, 'alternatif_id');
    }
}