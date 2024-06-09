<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
            $table->string('nama');
            $table->string('tempat');
            $table->timestamp('tanggal')->default(DB::raw('CURRENT_TIMESTAMP')); // Gunakan TIMESTAMP dan CURRENT_TIMESTAMP
            $table->text('isi');
            $table->string('foto');
            $table->enum('status_aduan', ['pending', 'approved', 'rejected'])->default('pending');
            $table->text('komentar')->nullable();
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
