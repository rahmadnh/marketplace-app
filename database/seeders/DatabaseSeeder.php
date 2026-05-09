<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
// Hapus 'use WithoutModelEvents' jika tidak benar-benar diperlukan 
// agar event model tetap berjalan (seperti hashing password otomatis)

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Jalankan Seeder Referensi terlebih dahulu
        $this->call([
            CurrencySeeder::class,
            CategorySeeder::class,
            ItemSeeder::class,
        ]);

        // 2. Membuat User Testing
        // Gunakan updateOrCreate agar jika dijalankan ulang tidak error 'Duplicate Email'
        User::updateOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Rahmad Nur Hidayah',
                'password' => bcrypt('password123'), // Jangan lupa enkripsi password!
            ]
        );
    }
}