@extends('admin.layouts.app')
@section('title', 'Dashboard Admin')

@section('content')
<div class="row">
    <div class="col-md-4 mb-4">
        <div class="card text-white bg-primary shadow-sm border-0">
            <div class="card-body d-flex align-items-center">
                <i class="bi bi-box-seam display-4 me-3"></i>
                <div>
                    <h5 class="card-title mb-0">Total Item</h5>
                    <h2 class="fw-bold mb-0">{{ $totalItems }}</h2>
                </div>
            </div>
            <div class="card-footer bg-transparent border-0 pt-0">
                <a href="{{ route('admin.items.index') }}" class="text-white text-decoration-none">Kelola Item <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card text-white bg-success shadow-sm border-0">
            <div class="card-body d-flex align-items-center">
                <i class="bi bi-people display-4 me-3"></i>
                <div>
                    <h5 class="card-title mb-0">Total Pengguna</h5>
                    <h2 class="fw-bold mb-0">{{ $totalUsers }}</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card text-white bg-warning shadow-sm border-0">
            <div class="card-body d-flex align-items-center">
                <i class="bi bi-cash-stack display-4 me-3"></i>
                <div>
                    <h5 class="card-title mb-0">Total Transaksi Web</h5>
                    <h2 class="fw-bold mb-0">{{ $totalTransactions }}</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body text-center py-5">
        <h4 class="text-muted">Selamat datang di Control Panel Admin</h4>
        <p>Gunakan sidebar di sebelah kiri untuk mengelola konten website.</p>
    </div>
</div>
@endsection
