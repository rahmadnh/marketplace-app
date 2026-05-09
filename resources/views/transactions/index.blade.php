@extends('layouts.app')
@section('title', 'Riwayat Transaksi')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="d-flex justify-content-between mb-3 align-items-center">
                <h4 class="mb-0"><i class="bi bi-clock-history text-primary me-2"></i>Riwayat Transaksi</h4>
                <a href="{{ route('transactions.create') }}" class="btn btn-primary"><i class="bi bi-plus-circle me-1"></i> Catat Transaksi Manual</a>
            </div>

            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card shadow-sm">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="ps-3">Tanggal</th>
                                    <th>Kategori</th>
                                    <th>Dompet</th>
                                    <th>Keterangan</th>
                                    <th class="text-end pe-3">Jumlah (Rp)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($transactions as $trx)
                                <tr>
                                    <td class="ps-3">{{ $trx->transaction_date->format('d M Y') }}</td>
                                    <td><span class="badge bg-secondary">{{ $trx->category->name ?? 'Umum' }}</span></td>
                                    <td>{{ $trx->wallet->name ?? '-' }}</td>
                                    <td>{{ $trx->note ?? '-' }}</td>
                                    <td class="text-end pe-3 fw-bold {{ $trx->amount < 0 ? 'text-danger' : 'text-success' }}">
                                        {{ $trx->amount > 0 ? '+' : '' }}{{ number_format($trx->amount, 0, ',', '.') }}
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center py-5 text-muted">
                                        <i class="bi bi-receipt fs-1 d-block mb-3"></i>
                                        Belum ada riwayat transaksi.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
