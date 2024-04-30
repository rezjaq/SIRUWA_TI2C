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
            $table->id();
            $table->unsignedBigInteger('id_daftar_calon_penerima_bansos');
            $table->foreign('id_daftar_calon_penerima_bansos')->references('id')->on('daftar_calon_penerima_bansos')->onDelete('cascade');
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
