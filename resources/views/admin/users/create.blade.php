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
                        <p class="mb-0">Tambah User</p>
                        <a href="{{ route('users.index') }}" class="btn btn-secondary btn-sm ms-auto">Kembali</a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-uppercase text-sm">User Information</p>
                    <div class="row">
                        <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="foto" class="form-control-label">Foto Profil</label>
                                    <div class="mt-3">
                                        <img id="imagePreview" src="#" alt="Preview Foto Profil" style="display: none; max-width: 200px; height: auto; border-radius: 10px; margin-bottom: 10px">
                                    </div>
                                    <input class="form-control @error('foto') is-invalid @enderror" type="file" name="foto" accept="image/*" onchange="previewImage(event)">
                                    @error('foto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nama" class="form-control-label">nama</label>
                                    <input class="form-control @error('nama') is-invalid @enderror" type="text" placeholder="Nama User" name="nama" required autofocus>

                                    @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="berat_badan" class="form-control-label">Berat Badan</label>
                                    <input class="form-control @error('berat_badan') is-invalid @enderror" type="number" placeholder="Berat Badan User" name="berat_badan" required autofocus min="35">

                                    @error('berat_badan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email" class="form-control-label">Email</label>
                                    <input class="form-control @error('email') is-invalid @enderror" type="email" placeholder="Email" name="email" required autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="password" class="form-control-label">Password</label>
                                    <input class="form-control @error('password') is-invalid @enderror" type="password" placeholder="password" name="password" required autofocus>

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="password_confirmation" class="form-control-label">Konfirmasi Password</label>
                                    <input class="form-control @error('password') is-invalid @enderror" type="password" name="password_confirmation" placeholder="konfirmasi password" required>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection