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
                        <p class="mb-0">Edit Menu</p>
                        <a href="{{ route('menus.index') }}" class="btn btn-secondary btn-sm ms-auto">Kembali</a>
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
                    <p class="text-uppercase text-sm">Menu Information</p>
                    <div class="row">
                        <form method="POST" action="{{ route('menus.update', $menu->id_menu) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="gambar" class="form-control-label">Gambar Menu</label>

                                    {{-- Preview Gambar Lama --}}
                                    <div class="mb-2">
                                        <img id="preview-gambar"
                                            src="{{ $menu->gambar ? asset($menu->gambar) : '#' }}"
                                            alt="Preview Gambar"
                                            style="{{ $menu->gambar ? 'max-height: 200px;' : 'display: none; max-height: 200px;' }}"
                                            class="img-fluid rounded shadow-sm">
                                    </div>

                                    {{-- Input File --}}
                                    <input
                                        class="form-control @error('gambar') is-invalid @enderror"
                                        type="file"
                                        name="gambar"
                                        accept="image/*"
                                        onchange="previewGambar(this)"
                                        >

                                    @error('gambar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nama_menu" class="form-control-label">Nama Menu</label>
                                    <input class="form-control @error('nama_menu') is-invalid @enderror" type="text" value="{{ old('nama_menu', $menu->nama_menu) }}" name="nama_menu" required autofocus>

                                    @error('nama_menu')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="deskripsi" class="form-control-label">Deskripsi</label>
                                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" rows="4" required>{{ $menu->deskripsi }}</textarea>

                                    @error('deskripsi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="kalori" class="form-control-label">Kalori (25%)</label>
                                    <input class="form-control @error('kalori') is-invalid @enderror" type="number" min="0" max="1000" value="{{ old('kalori', $menu->kalori) }}" name="kalori" required>

                                    @error('kalori')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="protein" class="form-control-label">Protein (30%)</label>
                                    <input class="form-control @error('protein') is-invalid @enderror" type="number" min="0" max="1000" value="{{ old('protein', $menu->protein) }}" name="protein" required>

                                    @error('protein')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="lemak" class="form-control-label">Lemak (25%)</label>
                                    <input class="form-control @error('lemak') is-invalid @enderror" type="number" min="0" max="1000" value="{{ old('lemak', $menu->lemak) }}" name="lemak" required>

                                    @error('lemak')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="id_preferensi_rasa" class="form-control-label">Rasa Dominan (20%)</label>
                                    <select
                                        id="id_preferensi_rasa"
                                        name="id_preferensi_rasa"
                                        class="form-control @error('id_preferensi_rasa') is-invalid @enderror"
                                        required>
                                        <option value="" selected>-- Pilih Rasa Dominan --</option>
                                        @foreach ($preferensi_rasa as $rasa)
                                        <option value="{{ $rasa->id_preferensi_rasa }}" {{ old('id_preferensi_rasa', $menu->id_preferensi_rasa) == $rasa->id_preferensi_rasa ? 'selected' : '' }}>
                                            {{ $rasa->nama_rasa }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('id_preferensi_rasa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
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