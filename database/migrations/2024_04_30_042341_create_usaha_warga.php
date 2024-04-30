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
        Schema::create('usaha_warga', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_penduduk'); // Tambahkan kolom id_penduduk
            $table->foreign('id_penduduk')->references('id')->on('penduduk')->onDelete('cascade');
            $table->string('nama_usaha');
            $table->string('jenis_usaha');
            $table->string('alamat_usaha');
            $table->text('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usaha_warga');
    }
};
