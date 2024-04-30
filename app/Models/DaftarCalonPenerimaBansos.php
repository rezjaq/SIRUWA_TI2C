<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarCalonPenerimaBansos extends Model
{
    use HasFactory;

    protected $table = 'daftar_calon_penerima_bansos';

    protected $primaryKey = 'id_daftarCalonPenerimaBansos';

    protected $fillable = [
        'id_pengajuanBansos',
        'id_daftarBansos',
    ];

    public function pengajuanBansos()
    {
        return $this->belongsTo(PengajuanBansos::class, 'id_pengajuanBansos');
    }

    public function daftarBansos()
    {
        return $this->belongsTo(DaftarBansos::class, 'id_daftarBansos');
    }
}
