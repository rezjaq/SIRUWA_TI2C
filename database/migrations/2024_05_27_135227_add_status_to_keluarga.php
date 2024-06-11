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
        Schema::table('keluarga', function (Blueprint $table) {
            $table->enum('status', ['disetujui', 'belum_disetujui', 'tidak_disetujui'])
                ->default('belum_disetujui')
                ->after('verif'); // Tambahkan kolom 'status'
        });

        // Ubah semua verif yang sudah ada menjadi 'diverifikasi'
        // DB::table('keluarga')->update(['verif' => 'diverifikasi']);
        // DB::table('keluarga')->update(['status' => 'disetujui']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('keluarga', function (Blueprint $table) {
            $table->dropColumn('status'); // Hapus kolom 'status'
        });
    }
};
