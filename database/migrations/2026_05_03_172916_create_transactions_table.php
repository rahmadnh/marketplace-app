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
        Schema::create('transactions', function (Blueprint $table) {
        $table->id();
        
        // PASTI KAN INI: merujuk ke 'wallets', bukan 'dompet'
        $table->foreignId('wallet_id')->constrained('wallets')->onDelete('cascade');
        
        // PASTI KAN INI: merujuk ke 'categories', bukan 'kategori'
        $table->foreignId('category_id')->constrained('categories');
        
        $table->decimal('amount', 15, 2);
        $table->text('note')->nullable();
        $table->date('transaction_date');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
