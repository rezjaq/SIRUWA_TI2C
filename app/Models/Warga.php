<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Warga extends Authenticable implements JWTSubject
{
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
    use HasFactory;

    protected $table = 'warga';

    protected $primaryKey = 'nik';

    protected $fillable = [
        'nik',
        'nama',
        'password',
        'level',
        'jenis_kelamin',
        'tanggal_lahir',
        'alamat',
        'no_telepon',
        'agama',
        'statusKawin',
        'pekerjaan',
        'no_rt',
        'id_keluarga',
    ];

    public function keluarga(): BelongsTo
    {
        return $this->belongsTo(Keluarga::class, 'id_keluarga');
    }
}
