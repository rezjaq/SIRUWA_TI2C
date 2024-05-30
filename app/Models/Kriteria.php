<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'kriteria';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama_kriteria',
        'atribut',
        'bobot',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'bobot' => 'integer',
    ];


    public function crips()
    {
        return $this->hasMany(Crips::class, 'kriteria_id');
    }

    public function pengajuans()
    {
        return $this->belongsToMany(PengajuanBansos::class, 'id_pengajuanBansos');
    }
}
