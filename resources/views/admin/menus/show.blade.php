@extends('layouts.admin.app')

@section('content')
<!-- Navbar -->
@include('layouts.admin.navbar')
<!-- End Navbar -->
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <p class="mb-0">Detail Menu</p>
                        <a href="{{ route('menus.index') }}" class="btn btn-secondary btn-sm ms-auto">Kembali</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row align-items-start">
                        <div class="col-md-4 mb-3 text-center">
                            @if ($menu->gambar)
                            <img src="{{ asset($menu->gambar) }}" alt="Gambar Menu" class="img-fluid rounded shadow" style="max-height: 300px; object-fit: cover;">
                            @else
                            <div class="text-muted fst-italic">Tidak ada gambar</div>
                            @endif
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Nama Menu:</label>
                                    <p class="form-control-plaintext">{{ $menu->nama_menu }}</p>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Kalori:</label>
                                    <p class="form-control-plaintext">{{ $menu->kalori }} kcal</p>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Protein:</label>
                                    <p class="form-control-plaintext">{{ $menu->protein }} g</p>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Lemak:</label>
                                    <p class="form-control-plaintext">{{ $menu->lemak }} g</p>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Dominan Rasa:</label>
                                    <p class="form-control-plaintext">{{ $menu->preferensiRasa->nama_rasa ?? '-' }}</p>
                                </div>

                                {{-- Tambahan Deskripsi --}}
                                <div class="col-md-12 mb-3">
                                    <label class="form-label fw-bold">Deskripsi:</label>
                                    <div class="border rounded p-3 bg-light text-dark" style="min-height: 80px;">
                                        {{ $menu->deskripsi ?? '-' }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection