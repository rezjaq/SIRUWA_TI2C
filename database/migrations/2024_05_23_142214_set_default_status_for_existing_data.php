<?php

use App\Models\Warga;
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
        $wargaTidakDisetujui = Warga::whereNull('status')->orWhere('status', 'tidak_disetujui')->get();

        // Mengubah status dari semua data menjadi 'disetujui'
        foreach ($wargaTidakDisetujui as $warga) {
            $warga->status = 'disetujui';
            $warga->save();
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
