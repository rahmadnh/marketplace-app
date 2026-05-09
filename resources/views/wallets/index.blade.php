@extends('layouts.app')
@section('title', 'Dompet Digital')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="d-flex justify-content-between mb-3 align-items-center">
                <h4 class="mb-0"><i class="bi bi-wallet2 text-primary me-2"></i>Dompet Digital Saya</h4>
                <a href="{{ route('wallets.create') }}" class="btn btn-primary"><i class="bi bi-plus-circle me-1"></i> Buat Dompet Baru</a>
            </div>

            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif

            <div class="row">
                @forelse($wallets as $wallet)
                <div class="col-md-6 mb-4">
                    <div class="card h-100 shadow-sm border-0 border-top border-primary border-4">
                        <div class="card-body">
                            <h5 class="card-title text-muted mb-3">{{ $wallet->name }}</h5>
                            <h2 class="fw-bold mb-3">
                                {{ $wallet->currency->symbol ?? 'Rp' }} {{ number_format($wallet->balance, 0, ',', '.') }}
                            </h2>
                            <p class="text-secondary small mb-0">Mata Uang: {{ $wallet->currency->name ?? 'Rupiah' }}</p>
                        </div>
                        <div class="card-footer bg-white border-0 pt-0">
                            <a href="{{ route('transactions.index') }}" class="btn btn-outline-primary btn-sm w-100">Lihat Riwayat Transaksi</a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <div class="card shadow-sm text-center py-5">
                        <div class="card-body">
                            <i class="bi bi-wallet-fill text-muted" style="font-size: 4rem;"></i>
                            <h5 class="mt-3">Anda belum memiliki dompet digital</h5>
                            <p class="text-muted">Buat dompet digital sekarang untuk mulai melakukan transaksi dan pembelian item.</p>
                            <a href="{{ route('wallets.create') }}" class="btn btn-primary mt-2">Buat Dompet</a>
                        </div>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
