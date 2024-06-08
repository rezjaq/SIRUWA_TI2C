<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('warga_pindah_masuk', function (Blueprint $table) {
            $table->string('foto_ktp')->nullable()->after('no_rt');
            $table->string('foto_surat_pindah')->nullable()->after('foto_ktp');
            $table->enum('status', ['Proses', 'Selesai'])->default('Proses')->after('no_rt');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('warga_pindah_masuk', function (Blueprint $table) {
            $table->dropColumn('foto_ktp');
            $table->dropColumn('foto_surat_pindah');
            $table->dropColumn('status');
        });
    }
};
