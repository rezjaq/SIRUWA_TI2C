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
        Schema::table('aduan', function (Blueprint $table) {
            $table->string('nama')->after('nik_warga');  // Nama Warga
            $table->string('tempat')->after('nama');  // Tempat Aduan
            $table->date('tanggal')->after('tempat');  // Tanggal Aduan
            $table->text('isi')->after('tanggal');  // Isi Aduan
            $table->string('foto')->after('isi');  // Foto Aduan
            $table->enum('status_aduan', ['pending', 'approved', 'rejected'])->default('pending')->after('foto');  // Status Aduan
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('aduan', function (Blueprint $table) {
            $table->dropColumn('nama');
            $table->dropColumn('tempat');
            $table->dropColumn('tanggal');
            $table->dropColumn('isi');
            $table->dropColumn('foto');
            $table->dropColumn('status_aduan');
        });
    }
};
