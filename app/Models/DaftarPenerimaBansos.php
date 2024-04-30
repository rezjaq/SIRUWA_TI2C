<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarPenerimaBansos extends Model
{
    use HasFactory;

    protected $table = 'daftar_penerima_bansos';

    protected $primaryKey = 'id_daftarPenerimabansos';

    protected $fillable = [
        'id_daftarCalonPenerimaBansos',
        'keterangan_tambahan',
    ];

    public function calonPenerimaBansos()
    {
        return $this->belongsTo(DaftarCalonPenerimaBansos::class, 'id_daftarCalonPenerimaBansos');
    }
}
