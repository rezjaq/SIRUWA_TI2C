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
            $table->id('id_wargaPindahMasuk');
            $table->string('nama');
            $table->string('nik');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->date('tanggal_lahir');
            $table->string('alamat');
            $table->string('no_telepon')->nullable();
            $table->string('agama');
            $table->string('statusKawin');
            $table->string('pekerjaan');
            $table->string('alamat_asal');
            $table->date('tanggal_pindah');
            $table->string('no_rt');
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
