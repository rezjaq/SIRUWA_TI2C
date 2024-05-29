<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Warga extends Authenticable implements JWTSubject
{
    use HasFactory;

    protected $table = 'warga';

    protected $primaryKey = 'nik';

    protected $fillable = [
        'nik',
        'status',
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
        'akte',
        'ktp',
        'id_keluarga',
        'previous_id_keluarga',
        'verif',
    ];

    public function keluarga(): BelongsTo
    {
        return $this->belongsTo(Keluarga::class, 'id_keluarga');
    }

    // JWT methods
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}