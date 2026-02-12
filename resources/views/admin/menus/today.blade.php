@extends('layouts.admin.app')
@section('content')
<!-- Navbar -->
@include('layouts.admin.navbar')
<!-- End Navbar -->
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Atur Menu Hari Ini</h6>
                    <div class="action-buttons position-absolute end-0 top-0 mt-3 me-3" style="display: flex; gap: 0.5rem;">
                        <a href="{{ route('menus.index') }}" class="btn btn-secondary btn-sm ms-auto">Kembali</a>
                    </div>
                    @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <div class="row m-2">
                            <div class="col-12">
                                <form action="{{ route('menu.today') }}" method="GET">
                                    @csrf
                                    <div class="d-flex align-items-center rounded-pill shadow-sm bg-white px-3 py-2" style="width: 100%; border: 1px solid #e0e0e0;">
                                        <i class="bi bi-search text-muted me-2"></i>
                                        <input
                                            type="text"
                                            name="search"
                                            class="form-control border-0 shadow-none bg-transparent"
                                            placeholder="Cari nama menu..."
                                            value="{{ request('search') }}"
                                            style="box-shadow: none;">
                                        @if(request('search'))
                                        <a href="{{ route('menu.today') }}" class="text-danger ms-2" style="text-decoration: none;">&times;</a>
                                        @endif
                                        <button type="submit" class="btn btn-sm btn-primary rounded-pill px-3 ms-2" style="margin-top: 10px;">
                                            Cari
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <form action="{{ route('menu.set-today') }}" method="POST">
                            @csrf
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kalori</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Protein</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Lemak</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Rasa Dominan</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pilih</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($menus as $menu)
                                    <tr>
                                        <td>{{ $menu->nama_menu }}</td>
                                        <td>{{ $menu->kalori }}</td>
                                        <td>{{ $menu->protein }}</td>
                                        <td>{{ $menu->lemak }}</td>
                                        <td>{{ $menu->preferensiRasa->nama_rasa ?? '-' }}</td>
                                        <td>
                                            <input type="checkbox" name="id_menu[]" value="{{ $menu->id_menu }}" {{ $menu->is_today ? 'checked' : '' }}>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Tidak ada menu</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>

                            <div class="d-flex justify-content-center">
                                {{ $menus->withQueryString()->links('vendor.pagination.custom') }}
                            </div>

                            <div class="mt-3 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Simpan Menu Hari Ini</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection