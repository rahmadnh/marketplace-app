@extends('layouts.app')
@section('title', 'Detail Item')

@section('content')
<div class="container">
    <a href="{{ route('items.index') }}" class="btn btn-secondary mb-3">Kembali ke Daftar Item</a>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Detail Item') }}</div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th style="width: 30%">Nama</th>
                            <td>{{ $item->name }}</td>
                        </tr>
                        <tr>
                            <th>Deskripsi</th>
                            <td>{{ $item->description }}</td>
                        </tr>
                        <tr>
                            <th>Harga</th>
                            <td>Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <th>Stok</th>
                            <td>{{ $item->stock }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Pembelian</th>
                            <td>{{ $item->purchase_date ? \Carbon\Carbon::parse($item->purchase_date)->format('d F Y') : '-' }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
