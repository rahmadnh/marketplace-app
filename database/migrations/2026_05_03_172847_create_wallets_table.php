<?php

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
        Schema::create('wallets', function (Blueprint $table) {
    $table->id();
    // Menghubungkan ke 'users'
    $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
    // Menghubungkan ke 'currencies'
    $table->foreignId('currency_id')->constrained('currencies');
    
    $table->string('name');
    $table->decimal('balance', 15, 2)->default(0); // Akurasi keuangan[cite: 1]
    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wallets');
    }
};
