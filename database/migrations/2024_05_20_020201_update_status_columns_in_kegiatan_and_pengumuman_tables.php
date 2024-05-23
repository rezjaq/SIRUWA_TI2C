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
        Schema::table('kegiatan', function (Blueprint $table) {
            // Ubah tipe data kolom status_kegiatan menjadi enum
            $table->enum('status_kegiatan', ['Aktif', 'Non Aktif'])->change();
        });

        Schema::table('pengumuman', function (Blueprint $table) {
            // Ubah tipe data kolom status_pengumuman menjadi enum
            $table->enum('status_pengumuman', ['Aktif', 'Non Aktif'])->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kegiatan', function (Blueprint $table) {
            // Ubah kembali tipe data kolom status_kegiatan ke string (atau tipe data sebelumnya)
            $table->string('status_kegiatan')->change();
        });

        Schema::table('pengumuman', function (Blueprint $table) {
            // Ubah kembali tipe data kolom status_pengumuman ke string (atau tipe data sebelumnya)
            $table->string('status_pengumuman')->change();
        });
    }
};
