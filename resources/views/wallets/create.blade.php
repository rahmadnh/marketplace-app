@extends('layouts.app')
@section('title', 'Buat Dompet Baru')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <a href="{{ route('wallets.index') }}" class="btn btn-secondary mb-3"><i class="bi bi-arrow-left"></i> Kembali</a>

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white fw-bold">
                    <i class="bi bi-wallet me-2"></i>Buat Dompet Baru
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

                    <form action="{{ route('wallets.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Dompet (Contoh: Dompet Utama)</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="currency_id" class="form-label">Mata Uang</label>
                            <select class="form-select" id="currency_id" name="currency_id" required>
                                <option value="">-- Pilih Mata Uang --</option>
                                @foreach($currencies as $currency)
                                    <option value="{{ $currency->id }}">{{ $currency->name }} ({{ $currency->symbol }})</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="balance" class="form-label">Saldo Awal</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" class="form-control" id="balance" name="balance" value="{{ old('balance', 0) }}" min="0" required>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100"><i class="bi bi-save me-1"></i> Simpan Dompet</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
