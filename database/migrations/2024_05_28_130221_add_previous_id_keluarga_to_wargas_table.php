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
        Schema::table('warga', function (Blueprint $table) {
            $table->unsignedBigInteger('previous_id_keluarga')->nullable()->after('id_keluarga');
        });
    }

    public function down()
    {
        Schema::table('warga', function (Blueprint $table) {
            $table->dropColumn('previous_id_keluarga');
        });
    }
};
