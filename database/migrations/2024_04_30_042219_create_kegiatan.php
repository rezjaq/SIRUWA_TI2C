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
        Schema::create('kegiatan', function (Blueprint $table) {
            $table->id('id_kegiatan');
            $table->string('nama_kegiatan');
            $table->date('tanggal_kegiatan');
            $table->time('waktu_mulai');
            $table->time('waktu_selesai')->nullable();
            $table->string('lokasi_kegiatan');
            $table->text('deskripsi')->nullable();
            $table->string('foto')->nullable();
            $table->enum('status_kegiatan', ['Aktif', 'Non Aktif']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kegiatan');
    }
};
