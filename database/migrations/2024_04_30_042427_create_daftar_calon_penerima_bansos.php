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
        Schema::create('daftar_calon_penerima_bansos', function (Blueprint $table) {
            $table->id('id_daftarCalonPenerimaBansos');
            $table->unsignedBigInteger('id_pengajuanBansos');
            $table->foreign('id_pengajuanBansos')->references('id_pengajuanBansos')->on('pengajuan_bansos')->onDelete('cascade');
            $table->unsignedBigInteger('id_daftarBansos');
            $table->foreign('id_daftarBansos')->references('id_daftarBansos')->on('daftar_bansos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftar_calon_penerima_bansos');
    }
};
