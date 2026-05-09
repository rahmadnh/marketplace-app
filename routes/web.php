<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;

// Halaman Awal (Landing Page)
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Halaman form register
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// Proses pengiriman data register
// TAMBAHKAN ->name(...) DI SINI:
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

// Halaman form login
// 1. Rute untuk menampilkan halaman (Buka di browser)
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// 2. Rute untuk memproses data (Saat tombol login diklik)
// PASTIKAN ADA BARIS INI:
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// Rute untuk dashboard (hanya bisa diakses setelah login)
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

// Tambahkan juga route Logout agar user bisa keluar
Route::post('/logout', function () {
    auth()->logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
})->name('logout');

// Rute untuk profile
Route::get('/profile', [ProfileController::class, 'index'])
    ->middleware('auth')
    ->name('profile.index');

    // Rute untuk update profile
Route::get('/profile/edit', [ProfileController::class, 'edit'])
    ->middleware('auth')
    ->name('profile.edit');

    Route::put('/profile/update', [ProfileController::class, 'update'])
    ->middleware('auth')
    ->name('profile.update');

    // Rute untuk item (Publik)
Route::get('/items', [ItemController::class, 'index'])
    ->middleware('auth')
    ->name('items.index');
    
Route::get('/items/{item}', [ItemController::class, 'show'])
    ->middleware('auth')
    ->name('items.show');

    // Beli Item
Route::post('/items/{item}/buy', [ItemController::class, 'buy'])
    ->middleware('auth')
    ->name('items.buy');

    // Rute untuk Dompet Digital (Wallet)
Route::resource('/wallets', App\Http\Controllers\WalletController::class)
    ->middleware('auth');

    // Rute untuk Transaksi
Route::resource('/transactions', App\Http\Controllers\TransactionController::class)
    ->middleware('auth');

// ==========================================
// RUTE ADMIN (CONTROL PANEL)
// ==========================================
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    // Admin Dashboard
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    
    // Admin Items Management
    Route::resource('items', App\Http\Controllers\Admin\ItemController::class);
});