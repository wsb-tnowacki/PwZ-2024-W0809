<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Sprawdzenie istnienia użytkownika z ID = 1 i dodanie, jeśli nie istnieje
        if (!DB::table('users')->where('id', 1)->exists()) {
            DB::table('users')->insert([
                'id' => 1,
                'name' => 'test',
                'email' => 'admin@test.pl',
                'email_verified_at' => now(),
                'password' => Hash::make('zaq1@WSX'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        Schema::table('posty', function (Blueprint $table) {
            // Usuwanie kolumn 'autor' i 'email'
            $table->dropColumn(['autor', 'email']);

            // Dodanie kolumny 'user_id' jako klucz obcy powiązany z tabelą 'users'
            $table->foreignId('user_id')->after('tytul')->default(1)->constrained('users')->onDelete('cascade');
            // foreignId()->constrained() jest krótsze, automatycznie zakłada, że klucz obcy odnosi się do id w tabeli users.
            // $table->foreign('user_id')->references('id') ->on('users')->onDelete('cascade');
            // foreign()->references()->on() oferuje większą elastyczność przy niestandardowych nazwach tabel i kluczy głównych.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posty', function (Blueprint $table) {
            // Przywracanie kolumn 'autor' i 'email' w przypadku wycofania migracji
            $table->string('autor', 100);
            $table->string('email', 200);

            // Usuwanie kolumny 'user_id'
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};
