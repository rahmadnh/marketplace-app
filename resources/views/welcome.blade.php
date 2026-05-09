@extends('layouts.app')
@section('title', 'Selamat Datang di My Finance')

@section('content')
<div class="container my-5">
    <div class="row align-items-center bg-white p-5 rounded shadow-sm">
        <div class="col-md-6 text-center text-md-start">
            <h1 class="display-4 fw-bold text-primary mb-3">My Finance App</h1>
            <p class="lead text-secondary mb-4">
                Platform terpadu untuk mengelola uang digital (Wallet) dan melakukan transaksi penjualan item dengan mudah, cepat, dan aman.
            </p>
            @guest
                <a href="{{ route('register') }}" class="btn btn-primary btn-lg px-4 me-2">Mulai Sekarang</a>
                <a href="{{ route('login') }}" class="btn btn-outline-primary btn-lg px-4">Masuk</a>
            @else
                <a href="{{ route('dashboard') }}" class="btn btn-primary btn-lg px-4 me-2">Ke Dashboard</a>
                <a href="{{ route('items.index') }}" class="btn btn-outline-primary btn-lg px-4">Lihat Market Item</a>
            @endguest
        </div>
        <div class="col-md-6 mt-5 mt-md-0 text-center">
            <i class="bi bi-wallet2 text-primary" style="font-size: 10rem; opacity: 0.8;"></i>
        </div>
    </div>

    <div class="row mt-5 text-center">
        <div class="col-md-4 mb-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body p-4">
                    <i class="bi bi-cash-coin fs-1 text-success mb-3"></i>
                    <h4 class="card-title fw-bold">Uang Digital</h4>
                    <p class="card-text text-muted">Kelola saldo dan riwayat uang masuk/keluar di dompet digital Anda dengan sangat mudah.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body p-4">
                    <i class="bi bi-shop fs-1 text-warning mb-3"></i>
                    <h4 class="card-title fw-bold">Penjualan Item</h4>
                    <p class="card-text text-muted">Beli item secara langsung yang akan memotong saldo uang digital Anda secara otomatis.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body p-4">
                    <i class="bi bi-shield-check fs-1 text-info mb-3"></i>
                    <h4 class="card-title fw-bold">Aman & Terpercaya</h4>
                    <p class="card-text text-muted">Sistem kami dibangun dengan standar keamanan terkini untuk memastikan data Anda aman.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
