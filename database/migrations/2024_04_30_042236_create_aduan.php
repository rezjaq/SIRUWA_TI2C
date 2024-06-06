<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('aduan', function (Blueprint $table) {
            $table->id('id_aduan');
            $table->string('nik_warga');
            $table->foreign('nik_warga')->references('nik')->on('warga')->onDelete('cascade');
            // $table->string('nama');  // Nama Warga
            // $table->string('tempat');  // Tempat Aduan
            // $table->date('tanggal');  // Tanggal Aduan
            // $table->text('isi');  // Isi Aduan
            // $table->string('foto');  // Foto Aduan
            // $table->enum('status_aduan', ['pending', 'approved', 'rejected'])->default('pending');  // Status Aduan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aduan');
    }
};
