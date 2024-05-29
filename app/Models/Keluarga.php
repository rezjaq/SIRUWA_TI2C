<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Keluarga extends Model
{
    use HasFactory;

    protected $table = 'keluarga';

    protected $primaryKey = 'id_keluarga';

    protected $fillable = [
        'nama_kepala_keluarga',
        'no_kk',
        'alamat',
        'no_rt',
        'kk',
        'verif',
        'status',
    ];
    
    public function anggota(): HasMany
    {
        return $this->hasMany(Warga::class, 'id_keluarga');
    }
}
