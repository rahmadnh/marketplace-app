@extends('layouts.app')
@section('title', 'Catat Transaksi Manual')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{ route('transactions.index') }}" class="btn btn-secondary mb-3"><i class="bi bi-arrow-left"></i> Kembali</a>

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white fw-bold">
                    <i class="bi bi-pencil-square me-2"></i>Catat Transaksi Manual
                </div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('transactions.store') }}" method="POST">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="wallet_id" class="form-label">Sumber Dompet</label>
                                <select class="form-select" id="wallet_id" name="wallet_id" required>
                                    @foreach($wallets as $wallet)
                                        <option value="{{ $wallet->id }}">{{ $wallet->name }} (Rp {{ number_format($wallet->balance, 0, ',', '.') }})</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="category_id" class="form-label">Kategori Transaksi</label>
                                <select class="form-select" id="category_id" name="category_id" required>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="amount" class="form-label">Jumlah (Rp)</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" class="form-control" id="amount" name="amount" placeholder="Gunakan tanda minus (-) untuk pengeluaran. Contoh: -50000" required>
                            </div>
                            <small class="text-muted">Gunakan tanda minus (-) untuk pengeluaran, angka positif untuk pemasukan/top-up.</small>
                        </div>

                        <div class="mb-3">
                            <label for="transaction_date" class="form-label">Tanggal Transaksi</label>
                            <input type="date" class="form-control" id="transaction_date" name="transaction_date" value="{{ date('Y-m-d') }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="note" class="form-label">Catatan Tambahan</label>
                            <textarea class="form-control" id="note" name="note" rows="2" placeholder="Opsional..."></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary w-100"><i class="bi bi-save me-1"></i> Simpan Transaksi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
