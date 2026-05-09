<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Wallet;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return view('items.index', compact('items'));
    }

    public function show(Item $item)
    {
        return view('items.show', compact('item'));
    }

    public function buy(Request $request, Item $item)
    {
        $wallet = Wallet::where('user_id', Auth::id())->first();
        if (!$wallet) {
            return redirect()->route('wallets.create')->with('error', 'Anda harus membuat Dompet Digital terlebih dahulu sebelum dapat membeli item.');
        }

        if ($wallet->balance < $item->price) {
            return redirect()->back()->with('error', 'Saldo di Dompet Digital Anda tidak mencukupi untuk membeli item ini.');
        }

        if ($item->stock < 1) {
            return redirect()->back()->with('error', 'Stok item ini sedang kosong/habis.');
        }

        // Kurangi saldo
        $wallet->balance -= $item->price;
        $wallet->save();

        // Kurangi stok
        $item->stock -= 1;
        $item->save();

        // Buat atau ambil Kategori
        $category = Category::firstOrCreate(
            ['name' => 'Pembelian'],
            ['description' => 'Transaksi pembelian item']
        );

        // Catat Transaksi
        Transaction::create([
            'wallet_id' => $wallet->id,
            'category_id' => $category->id,
            'amount' => -$item->price, // Negatif karena pengeluaran
            'note' => 'Pembelian item: ' . $item->name,
            'transaction_date' => now(),
        ]);

        return redirect()->route('items.index')->with('success', 'Berhasil membeli item "' . $item->name . '"! Saldo dompet Anda telah dipotong.');
    }
}