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
        Schema::create('daftar_penerima_bansos', function (Blueprint $table) {
            $table->id('id_daftarPenerimabansos');
            $table->unsignedBigInteger('id_daftarCalonPenerimaBansos');
            $table->foreign('id_daftarCalonPenerimaBansos')->references('id_daftarCalonPenerimaBansos')->on('daftar_calon_penerima_bansos')->onDelete('cascade');
            $table->text('keterangan_tambahan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftar_penerima_bansos');
    }
};
