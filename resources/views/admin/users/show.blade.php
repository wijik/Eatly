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
                        <p class="mb-0">Detail Pengguna</p>
                        <a href="{{ route('users.index') }}" class="btn btn-secondary btn-sm ms-auto">Kembali</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-4 text-center mb-4">
                            @if ($user->foto)
                            <img src="{{ asset($user->foto) }}" alt="Foto Pengguna" class="img-fluid rounded shadow" style="max-height: 300px; object-fit: cover;">
                            @else
                            <img src="{{ asset('images/default-user.png') }}" alt="Foto Default" class="img-fluid rounded shadow" style="max-height: 300px; object-fit: cover;">
                            @endif
                        </div>

                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Nama:</label>
                                    <p class="form-control-plaintext">{{ $user->nama }}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Email:</label>
                                    <p class="form-control-plaintext">{{ $user->email }}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Role:</label>
                                    <p class="form-control-plaintext">{{ $user->role }}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">Tanggal Dibuat:</label>
                                    <p class="form-control-plaintext">{{ $user->created_at->format('d M Y') }}</p>
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