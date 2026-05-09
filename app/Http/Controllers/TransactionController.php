<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Wallet;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        // Get wallets belonging to user
        $walletIds = Wallet::where('user_id', Auth::id())->pluck('id');
        
        $transactions = Transaction::whereIn('wallet_id', $walletIds)
            ->orderBy('transaction_date', 'desc')
            ->get();
            
        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        $wallets = Wallet::where('user_id', Auth::id())->get();
        $categories = Category::all();
        
        // If no wallet exists, ask them to create one first
        if ($wallets->isEmpty()) {
            return redirect()->route('wallets.create')->with('error', 'Silakan buat dompet digital terlebih dahulu!');
        }

        return view('transactions.create', compact('wallets', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'wallet_id' => 'required|exists:wallets,id',
            'category_id' => 'required|exists:categories,id',
            'amount' => 'required|numeric',
            'transaction_date' => 'required|date',
            'note' => 'nullable|string',
        ]);

        $wallet = Wallet::findOrFail($request->wallet_id);
        
        // Cek kepemilikan wallet
        if ($wallet->user_id !== Auth::id()) {
            abort(403);
        }

        Transaction::create($request->all());

        // Update balance
        // Asumsi: nilai positif = pemasukan, nilai negatif = pengeluaran
        $wallet->balance += $request->amount;
        $wallet->save();

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil ditambahkan!');
    }
}
