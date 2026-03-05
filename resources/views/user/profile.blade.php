@extends('layouts.user.app')
@section('content')
<section>
    <h4 class="section-title text-center mb-4">Profil Pengguna</h4>
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="profile-card text-center">
                <form action="{{ route('profile.update', $user->id_user) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3 text-center">
                        <label for="gambar" class="d-block">Foto Profil</label>
                        <div class="profile-image-wrapper" onclick="document.getElementById('gambar').click()">
                            <img id="preview-gambar" src="{{ asset($user->foto ?? 'users/default-user.png') }}" alt="Foto Profil">
                            <div class="overlay">Klik untuk<br>ubah foto</div>
                        </div>
                        <input type="file" id="gambar" name="foto" accept="image/*" onchange="previewGambar(this)">
                    </div>
                    <div class="mb-3 text-start">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" name="nama" value="{{ old('nama', $user->nama) }}">
                    </div>
                    <div class="mb-3 text-start">
                        <label for="weight">Berat Badan (kg)</label>
                        <input type="number" min="30" max="200" class="form-control" id="weight" name="berat_badan" value="{{ old('berat_badan', $user->berat_badan) }}">
                    </div>
                    <div class="mb-3 text-start">
                        <label class="form-label">Preferensi Rasa <small class="text-muted">(Pilih maksimal 3)</small></label>
                        <div id="preferensi-rasa-wrapper" class="d-flex flex-wrap gap-2">
                            @foreach ($preferensiRasa as $rasa)
                            <div class="form-check">
                                <input
                                    class="form-check-input rasa-checkbox"
                                    type="checkbox"
                                    name="preferensi_rasa[]"
                                    id="rasa-{{ $rasa->id_preferensi_rasa }}"
                                    value="{{ $rasa->id_preferensi_rasa }}"
                                    @if(in_array($rasa->id_preferensi_rasa, $user->preferensiRasa->pluck('id_preferensi_rasa')->toArray())) checked @endif
                                >
                                <label class="form-check-label" for="rasa-{{ $rasa->id_preferensi_rasa }}">
                                    {{ $rasa->nama_rasa }}
                                </label>
                            </div>
                            @endforeach
                        </div>
                        <div id="checkbox-error" class="text-danger mt-1" style="display: none;">
                            Maksimal hanya bisa memilih 3 preferensi rasa.
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 mt-3">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection