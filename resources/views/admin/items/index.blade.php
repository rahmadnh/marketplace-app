@extends('admin.layouts.app')
@section('title', 'Manajemen Item')

@section('content')
<div class="card shadow-sm border-0 mb-4">
    <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
        <h5 class="mb-0 fw-bold">Daftar Item Market</h5>
        <a href="{{ route('admin.items.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Tambah Item</a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-3">Foto</th>
                        <th>Nama Item</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Tgl Pembelian</th>
                        <th class="text-end pe-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($items as $item)
                    <tr>
                        <td class="ps-3">
                            @if($item->image)
                                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" class="rounded" style="width: 50px; height: 50px; object-fit: cover;">
                            @else
                                <div class="bg-secondary bg-opacity-25 rounded d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                    <i class="bi bi-image text-secondary"></i>
                                </div>
                            @endif
                        </td>
                        <td class="fw-bold">{{ $item->name }}</td>
                        <td>Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                        <td>
                            @if($item->stock > 0)
                                <span class="badge bg-success">{{ $item->stock }}</span>
                            @else
                                <span class="badge bg-danger">Habis</span>
                            @endif
                        </td>
                        <td>{{ $item->purchase_date }}</td>
                        <td class="text-end pe-3">
                            <a href="{{ route('admin.items.edit', $item->id) }}" class="btn btn-warning btn-sm text-dark"><i class="bi bi-pencil"></i></a>
                            <form action="{{ route('admin.items.destroy', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus item ini?')"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-muted">Belum ada item yang ditambahkan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
