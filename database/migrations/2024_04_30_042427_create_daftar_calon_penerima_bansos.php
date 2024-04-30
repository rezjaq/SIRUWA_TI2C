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
            $table->id();
            $table->unsignedBigInteger('id_pengajuan_bansos');
            $table->foreign('id_pengajuan_bansos')->references('id')->on('pengajuan_bansos')->onDelete('cascade');
            $table->unsignedBigInteger('id_daftar_bansos');
            $table->foreign('id_daftar_bansos')->references('id')->on('daftar_bansos')->onDelete('cascade');
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
