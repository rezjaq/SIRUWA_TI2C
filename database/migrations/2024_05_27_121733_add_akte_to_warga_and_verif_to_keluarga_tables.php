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
        Schema::table('warga', function (Blueprint $table) {
            $table->string('akte')->nullable()->after('no_rt'); // Tambahkan kolom 'akte'
        });

        Schema::table('keluarga', function (Blueprint $table) {
            $table->enum('verif', ['diverifikasi', 'belum_diverifikasi', 'tidak_terverifikasi'])
                  ->default('belum_diverifikasi')
                  ->after('nama_kepala_keluarga'); // Tambahkan kolom 'verif'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('warga', function (Blueprint $table) {
            $table->dropColumn('akte'); // Hapus kolom 'akte'
        });

        Schema::table('keluarga', function (Blueprint $table) {
            $table->dropColumn('verif'); // Hapus kolom 'verif'
        });
    }
};
