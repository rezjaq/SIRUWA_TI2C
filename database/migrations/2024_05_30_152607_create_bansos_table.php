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
        Schema::create('bansos', function (Blueprint $table) {
            $table->id();
            $table->string('pendidikan');
            $table->string('pekerjaan');
            $table->string('penghasilan');
            $table->string('status_kepemilikan_rumah');
            $table->string('fasilitas_wc');
            $table->string('fasilitas_listrik');
            $table->string('bahan_bakar');
            $table->string('kepemilikan_tabungan');
            $table->enum('status', ['pending', 'approved', 'rejected', 'done'])->default('pending');
            $table->string('nik_warga');
            $table->foreign('nik_warga')->references('nik')->on('warga')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bansos');
    }
};
