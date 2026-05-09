@extends('layouts.app')
@section('title', 'Dashboard Keuangan')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-12">
            <h2 class="fw-bold">Selamat Datang, {{ auth()->user()->name }}!</h2>
            <p class="text-muted">Ini adalah ringkasan keuangan Anda saat ini.</p>
        </div>
    </div>

    <!-- Ringkasan Keuangan -->
    <div class="row mb-4">
        <!-- Total Saldo -->
        <div class="col-md-4 mb-3">
            <div class="card border-0 shadow-sm bg-primary text-white h-100">
                <div class="card-body">
                    <h6 class="text-white-50"><i class="bi bi-wallet2 me-2"></i>Total Saldo Dompet</h6>
                    <h3 class="fw-bold mt-3">Rp {{ number_format($totalBalance, 0, ',', '.') }}</h3>
                    <small class="text-white-50">Dari {{ $wallets->count() }} dompet digital</small>
                </div>
            </div>
        </div>

        <!-- Pemasukan Bulan Ini -->
        <div class="col-md-4 mb-3">
            <div class="card border-0 shadow-sm bg-success text-white h-100">
                <div class="card-body">
                    <h6 class="text-white-50"><i class="bi bi-graph-up-arrow me-2"></i>Pemasukan Bulan Ini</h6>
                    <h3 class="fw-bold mt-3">Rp {{ number_format($monthlyIncome, 0, ',', '.') }}</h3>
                    <small class="text-white-50">1 - {{ date('t M Y') }}</small>
                </div>
            </div>
        </div>

        <!-- Pengeluaran Bulan Ini -->
        <div class="col-md-4 mb-3">
            <div class="card border-0 shadow-sm bg-danger text-white h-100">
                <div class="card-body">
                    <h6 class="text-white-50"><i class="bi bi-graph-down-arrow me-2"></i>Pengeluaran Bulan Ini</h6>
                    <h3 class="fw-bold mt-3">Rp {{ number_format(abs($monthlyExpense), 0, ',', '.') }}</h3>
                    <small class="text-white-50">1 - {{ date('t M Y') }}</small>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Transaksi Terakhir -->
        <div class="col-lg-8 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                    <h5 class="mb-0 fw-bold"><i class="bi bi-clock-history text-primary me-2"></i>Transaksi Terakhir</h5>
                    <a href="{{ route('transactions.index') }}" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="ps-3">Tanggal</th>
                                    <th>Kategori</th>
                                    <th>Keterangan</th>
                                    <th class="text-end pe-3">Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentTransactions as $trx)
                                <tr>
                                    <td class="ps-3">{{ $trx->transaction_date->format('d M Y') }}</td>
                                    <td><span class="badge bg-secondary">{{ $trx->category->name ?? 'Umum' }}</span></td>
                                    <td>{{ $trx->note ?? '-' }}</td>
                                    <td class="text-end pe-3 fw-bold {{ $trx->amount < 0 ? 'text-danger' : 'text-success' }}">
                                        {{ $trx->amount > 0 ? '+' : '' }}{{ number_format($trx->amount, 0, ',', '.') }}
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center py-4 text-muted">Belum ada transaksi bulan ini.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Shortcut Akses -->
        <div class="col-lg-4 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0 fw-bold"><i class="bi bi-lightning-charge text-warning me-2"></i>Akses Cepat</h5>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-3">
                        <a href="{{ route('items.index') }}" class="btn btn-outline-primary text-start">
                            <i class="bi bi-shop me-2"></i> Beli Market Item
                        </a>
                        <a href="{{ route('transactions.create') }}" class="btn btn-outline-success text-start">
                            <i class="bi bi-plus-circle me-2"></i> Catat Pemasukan
                        </a>
                        <a href="{{ route('transactions.create') }}" class="btn btn-outline-danger text-start">
                            <i class="bi bi-dash-circle me-2"></i> Catat Pengeluaran
                        </a>
                        <a href="{{ route('wallets.index') }}" class="btn btn-outline-info text-start">
                            <i class="bi bi-wallet2 me-2"></i> Kelola Dompet Digital
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection