<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // ✅ tambahkan ini

class ItemSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('items')->insert([
            [
                'name' => 'Laptop',
                'description' => 'Laptop gaming dengan spesifikasi tinggi.',
                'price' => 15000000,
                'stock' => 10,
                'image' => null,
                'purchase_date' => '2024-01-15',
            ],
            [
                'name' => 'Smartphone',
                'description' => 'Smartphone terbaru dengan kamera canggih.',
                'price' => 8000000,
                'stock' => 20,
                'image' => null,
                'purchase_date' => '2024-02-10',
            ],
        ]);
    }
}