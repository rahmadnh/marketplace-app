<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wallet;
use App\Models\Currency;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    public function index()
    {
        $wallets = Wallet::where('user_id', Auth::id())->get();
        return view('wallets.index', compact('wallets'));
    }

    public function create()
    {
        $currencies = Currency::all();
        return view('wallets.create', compact('currencies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'currency_id' => 'required|exists:currencies,id',
            'balance' => 'required|numeric|min:0',
        ]);

        Wallet::create([
            'user_id' => Auth::id(),
            'currency_id' => $request->currency_id,
            'name' => $request->name,
            'balance' => $request->balance,
        ]);

        return redirect()->route('wallets.index')->with('success', 'Dompet berhasil dibuat!');
    }
}
