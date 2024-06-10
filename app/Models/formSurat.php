<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formSurat extends Model
{
    use HasFactory;
    protected $table = 'form_surat';
    protected $primaryKey = 'id';
    protected $fillable = [
        'judul',
        'deskripsi',
        'file_path',
    ];
}
