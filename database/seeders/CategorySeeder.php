<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category; // Pastikan model Category diimport    

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Kategori Pengeluaran
    Category::create(['name' => 'Food & Beverage', 'type' => 'expense', 'icon' => 'fastfood']);
    Category::create(['name' => 'Transportation', 'type' => 'expense', 'icon' => 'directions_car']);
    
    // Kategori Pemasukan
    Category::create(['name' => 'Salary', 'type' => 'income', 'icon' => 'payments']);
    Category::create(['name' => 'Bonus', 'type' => 'income', 'icon' => 'redeem']);
}
    }

