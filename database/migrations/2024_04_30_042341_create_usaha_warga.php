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
        Schema::create('usaha_warga', function (Blueprint $table) {
            $table->id('id_usahaWarga');
            $table->string('nik_warga');
            // $table->foreign('nik_warga')->references('nik')->on('warga')->onDelete('cascade');
            $table->string('nama_usaha');
            $table->string('jenis_usaha');
            $table->string('alamat_usaha');
            $table->string('nomer_telepon'); // Tambah kolom nomer_telepon
            // $table->text('keterangan');
            $table->decimal('harga', 10, 2);
            $table->text('deskripsi');
            // $table->string('status')->default('pending');
            // $table->string('foto')->nullable();
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
