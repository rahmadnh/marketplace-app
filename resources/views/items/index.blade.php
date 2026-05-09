@extends('layouts.app')
@section('title', 'Marketplace Item')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            
            <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
                <h3 class="fw-bold"><i class="bi bi-shop text-primary me-2"></i>Marketplace</h3>
                <span class="text-muted">Menampilkan {{ $items->count() }} item tersedia</span>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 mt-2">
                @forelse($items as $item)
                <div class="col">
                    <div class="card h-100 border-0 shadow-sm transition-hover">
                        <!-- Product Image -->
                        <div class="position-relative bg-light" style="height: 200px; overflow: hidden; border-radius: calc(.375rem - 1px) calc(.375rem - 1px) 0 0;">
                            @if($item->image)
                                <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top w-100 h-100" style="object-fit: cover;" alt="{{ $item->name }}">
                            @else
                                <div class="w-100 h-100 d-flex align-items-center justify-content-center text-muted">
                                    <i class="bi bi-image" style="font-size: 3rem; opacity: 0.2;"></i>
                                </div>
                            @endif
                            
                            @if($item->stock < 1)
                                <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark bg-opacity-50 d-flex align-items-center justify-content-center">
                                    <span class="badge bg-danger fs-5 px-3 py-2">HABIS</span>
                                </div>
                            @else
                                <span class="badge bg-primary position-absolute top-0 end-0 m-2">Stok: {{ $item->stock }}</span>
                            @endif
                        </div>

                        <!-- Product Info -->
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold text-truncate" title="{{ $item->name }}">{{ $item->name }}</h5>
                            <h4 class="text-success fw-bold mb-3">Rp {{ number_format($item->price, 0, ',', '.') }}</h4>
                            <p class="card-text text-muted small flex-grow-1" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                {{ $item->description ?? 'Tidak ada deskripsi.' }}
                            </p>
                            
                            <div class="mt-auto pt-3 border-top">
                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="{{ route('items.show', $item->id) }}" class="btn btn-outline-secondary btn-sm text-decoration-none">
                                        <i class="bi bi-eye"></i> Detail
                                    </a>
                                    
                                    <form action="{{ route('items.buy', $item->id) }}" method="POST" class="m-0">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm" {{ $item->stock < 1 ? 'disabled' : '' }}>
                                            <i class="bi bi-cart-plus"></i> Beli
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 w-100">
                    <div class="card border-0 shadow-sm py-5 text-center">
                        <div class="card-body">
                            <i class="bi bi-shop text-muted" style="font-size: 4rem;"></i>
                            <h4 class="mt-3">Belum ada item di Market</h4>
                            <p class="text-muted">Item yang dijual akan muncul di sini.</p>
                        </div>
                    </div>
                </div>
                @endforelse
            </div>

        </div>
    </div>
</div>

<style>
.transition-hover {
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}
.transition-hover:hover {
    transform: translateY(-5px);
    box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
}
</style>
@endsection