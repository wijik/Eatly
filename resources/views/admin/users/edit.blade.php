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
                        <p class="mb-0">Edit User</p>
                        <a href="{{ route('users.index') }}" class="btn btn-secondary btn-sm ms-auto">Kembali</a>
                    </div>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
                <div class="card-body">
                    <p class="text-uppercase text-sm">User Information</p>
                    <div class="row">
                        <form method="POST" action="{{ route('users.update', $user->id_user) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="foto" class="form-control-label">Foto Profil</label>
                                    @if ($user->foto)
                                    <div class="mb-2">
                                        <div class="mb-2">
                                            <img id="imageEditPreview" src="{{ asset($user->foto ?? 'users/default-user.png') }}" alt="Foto Profil" class="img-thumbnail" style="max-height: 150px;">
                                        </div>
                                    </div>
                                    @endif
                                    <input class="form-control @error('foto') is-invalid @enderror" type="file" name="foto" accept="image/*">
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
                                    <input class="form-control @error('nama') is-invalid @enderror" type="text" name="nama" value="{{ old('nama', $user->nama) }}" required autofocus>
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
                                    <input class="form-control @error('berat_badan') is-invalid @enderror" type="number" name="berat_badan" value="{{ old('berat_badan', $user->berat_badan) }}" required min="40">
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
                                    <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email', $user->email) }}" required>
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
                                    <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" placeholder="Isi untuk mengubah Password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="password_confirmation" class="form-control-label">Konfirmasi Password</label>
                                    <input class="form-control @error('password_confirmation') is-invalid @enderror" type="password" name="password_confirmation" placeholder="Konfirmasi Password">
                                    @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
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