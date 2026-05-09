<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Currency; // Pastikan model Currency diimport

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    Currency::create(['name' => 'Indonesian Rupiah', 'code' => 'IDR', 'symbol' => 'Rp']);
    Currency::create(['name' => 'US Dollar', 'code' => 'USD', 'symbol' => '$']);
    }
}
