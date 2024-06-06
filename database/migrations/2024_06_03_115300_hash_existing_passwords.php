<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HashExistingPasswords extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $users = DB::table('warga')->get();

        foreach ($users as $user) {
            if (!Hash::check($user->password, $user->password)) {
                DB::table('warga')
                    ->where('id', $user->id)
                    ->update(['password' => Hash::make($user->password)]);
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // There's no need to reverse password hashing
    }
}

