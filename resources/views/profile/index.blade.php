@extends('layouts.app')
@section('tittle', 'Halaman Profile')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container py-4">
    <a href="{{ route('dashboard') }}" class="btn btn-secondary btn-sm mb-4">← Kembali</a>

    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card border-0 shadow-sm rounded-4">

                {{-- Header Biru --}}
                <div class="bg-primary rounded-top-4" style="height: 100px;"></div>

                <div class="card-body pt-0 px-4 pb-4">

                    {{-- Avatar --}}
                    <div class="d-flex justify-content-between align-items-end mb-3" style="margin-top: -40px;">
                        <div class="bg-white rounded-circle border border-3 border-white shadow d-flex align-items-center justify-content-center"
                            style="width:80px; height:80px; font-size:32px;">
                            👤
                        </div>
                        <a href="{{ route('profile.edit') }}" class="btn btn-outline-primary btn-sm">Edit Profile</a>
                    </div>

                    {{-- Nama & Email --}}
                    <h5 class="fw-bold mb-0">{{ auth()->user()->name }}</h5>
                    <p class="text-muted small mb-3">{{ auth()->user()->email }}</p>

                    <hr>

                    {{-- Info Detail --}}
                    <div class="row g-3">
                        <div class="col-6">
                            <p class="text-muted small mb-0">Nama</p>
                            <p class="fw-semibold mb-0">{{ auth()->user()->name }}</p>
                        </div>
                        <div class="col-6">
                            <p class="text-muted small mb-0">Email</p>
                            <p class="fw-semibold mb-0">{{ auth()->user()->email }}</p>
                        </div>
                        <div class="col-6">
                            <p class="text-muted small mb-0">Bergabung</p>
                            <p class="fw-semibold mb-0">{{ auth()->user()->created_at->format('d M Y') }}</p>
                        </div>
                        <div class="col-6">
                            <p class="text-muted small mb-0">Status</p>
                            <span class="badge bg-success">Aktif</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
@endsection