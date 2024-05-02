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
        Schema::create('aduan', function (Blueprint $table) {
            $table->id('id_aduan');
            $table->string('nik_warga');
            $table->foreign('nik_warga')->references('nik')->on('warga')->onDelete('cascade');
            $table->date('tanggal_aduan');
            $table->text('isi_aduan');
            $table->string('status_aduan');
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
