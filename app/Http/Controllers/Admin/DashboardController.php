<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Item;
use App\Models\Transaction;

class DashboardController extends Controller
{
    public function index()
    {
        $totalItems = Item::count();
        $totalUsers = User::count();
        $totalTransactions = Transaction::count();
        
        return view('admin.dashboard', compact('totalItems', 'totalUsers', 'totalTransactions'));
    }
}
