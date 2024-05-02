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
        Schema::create('pengajuan_bansos', function (Blueprint $table) {
            $table->id('id_pengajuanBansos');
            $table->string('nik_warga');
            $table->foreign('nik_warga')->references('nik')->on('warga')->onDelete('cascade');
            $table->decimal('pendapatan_1bln', 10, 2);
            $table->string('sktm')->nullable();
            $table->string('status_pengajuan');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_bansos');
    }
};
