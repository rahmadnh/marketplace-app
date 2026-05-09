<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Wallet;
use App\Models\Transaction;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        $wallets = Wallet::where('user_id', $user->id)->get();
        $totalBalance = $wallets->sum('balance');
        
        $walletIds = $wallets->pluck('id');
        
        $recentTransactions = Transaction::whereIn('wallet_id', $walletIds)
                                ->orderBy('transaction_date', 'desc')
                                ->orderBy('id', 'desc')
                                ->take(5)
                                ->get();
                                
        // Hitung pemasukan dan pengeluaran bulan ini
        $startOfMonth = now()->startOfMonth();
        $endOfMonth = now()->endOfMonth();
        
        $monthlyIncome = Transaction::whereIn('wallet_id', $walletIds)
                            ->whereBetween('transaction_date', [$startOfMonth, $endOfMonth])
                            ->where('amount', '>', 0)
                            ->sum('amount');
                            
        $monthlyExpense = Transaction::whereIn('wallet_id', $walletIds)
                            ->whereBetween('transaction_date', [$startOfMonth, $endOfMonth])
                            ->where('amount', '<', 0)
                            ->sum('amount');

        return view('dashboard.index', compact('wallets', 'totalBalance', 'recentTransactions', 'monthlyIncome', 'monthlyExpense'));
    }
}