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
        Schema::table('warga', function (Blueprint $table) {
            // Mengubah kolom 'level' agar default-nya 'warga'
            $table->string('level')->default('warga')->change();
            
            // Mengubah kolom 'password' agar bisa null
            $table->string('password')->nullable()->change();

            $table->string('statusKawin')->nullable()->change();

            $table->string('pekerjaan')->nullable()->change();

            $table->enum('verif', ['terverifikasi', 'belum_terverifikasi','tidak_terverifikasi'])->default('belum_terverifikasi');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('warga', function (Blueprint $table) {
            // Mengembalikan perubahan yang telah dilakukan dalam up() method

            // Mengembalikan 'level' ke state semula tanpa default
            $table->string('level')->change();
            
            // Mengembalikan 'password' ke state semula tidak bisa null
            $table->string('password')->nullable(false)->change();

            $table->string('statusKawin')->nullable(false)->change();

            $table->string('pekerjaan')->nullable(false)->change();

            $table->dropColumn('verif');
        });
    }
};
