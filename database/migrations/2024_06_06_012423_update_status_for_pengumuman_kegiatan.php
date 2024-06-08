<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Set status for existing records in kegiatan table
        DB::table('kegiatan')->update(['status_kegiatan' => 'Aktif']);

        // Set status for existing records in pengumuman table
        DB::table('pengumuman')->update(['status_pengumuman' => 'Aktif']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
