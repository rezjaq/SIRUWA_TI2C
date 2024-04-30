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
        Schema::create('warga_pindah_masuk', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nik')->unique();
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->date('tanggal_lahir');
            $table->string('alamat');
            $table->string('no_telepon')->nullable();
            $table->string('agama');
            $table->string('statusKawin');
            $table->string('pekerjaan');
            $table->unsignedBigInteger('id_rt');
            $table->foreign('id_rt')->references('id')->on('rt')->onDelete('cascade');
            $table->string('alamat_asal');
            $table->date('tanggal_pindah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warga_pindah_masuk');
    }
};
