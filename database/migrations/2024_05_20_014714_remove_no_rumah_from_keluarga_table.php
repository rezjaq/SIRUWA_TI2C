<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('keluarga', function (Blueprint $table) {
            // Hapus kolom no_rumah
            if (Schema::hasColumn('keluarga', 'no_rumah')) {
                $table->dropColumn('no_rumah');
            }
            // Ubah nama kolom nomor_nik menjadi no_kk
            $table->renameColumn('nomor_nik', 'no_kk');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('keluarga', function (Blueprint $table) {
            $table->string('no_rumah');
            $table->renameColumn('no_kk', 'nomor_nik');
        });
    }
};
