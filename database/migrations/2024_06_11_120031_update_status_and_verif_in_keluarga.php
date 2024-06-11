<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Ubah semua verif yang sudah ada menjadi 'diverifikasi' dan status menjadi 'disetujui'
        DB::table('keluarga')
            ->whereNotNull('status') // Pilih baris yang kolom 'status' tidak null
            ->whereNotNull('verif')  // Pilih baris yang kolom 'verif' tidak null
            ->update([
                'status' => 'disetujui',
                'verif' => 'diverifikasi',
            ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('keluarga', function (Blueprint $table) {
            //
        });
    }
};
