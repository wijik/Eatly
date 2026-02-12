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
                    <h6>Data Menu</h6>
                    <div class="action-buttons position-absolute end-0 top-0 mt-3 me-3" style="display: flex; gap: 0.5rem;">
                        <a href="{{ route('menus.create') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus me-1"></i> Tambah Data Menu
                        </a>
                        <a href="{{ route('menu.today') }}" class="btn btn-secondary btn-sm">
                            <i class="bi bi-calendar-check me-2"></i>
                            Menu Hari Ini
                        </a>
                    </div>
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <div class="row m-2">
                            <div class="col-12">
                                <form action="{{ route('menus.index') }}" method="GET">
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
                                        <a href="{{ route('menus.index') }}" class="text-danger ms-2" style="text-decoration: none;">&times;</a>
                                        @endif
                                        <button type="submit" class="btn btn-sm btn-primary rounded-pill px-3 ms-2" style="margin-top: 10px;">
                                            Cari
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Kalori (25%)</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Protein (30%)</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Lemak (25%)</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Rasa Dominan (20%)</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($menus as $menu)
                                <tr data-id="{{ $menu->id_menu }}">
                                    <td class="align-middle text-center text-sm">
                                        <a href="{{ route('menus.show', $menu->id_menu) }}">
                                            {{ $menu->nama_menu }}
                                        </a>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        {{ $menu->kalori }}
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        {{ $menu->protein }}
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        {{ $menu->lemak }}
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        {{ $menu->preferensiRasa->nama_rasa ?? '-' }}
                                    </td>
                                    <td class="align-middle">
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('menus.edit', $menu->id_menu) }}" class="btn btn-sm btn-warning" title="Edit Menu">
                                                Edit
                                            </a>
                                            <form action="{{ route('menus.destroy', $menu->id_menu) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus menu ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-link text-danger p-0 m-0 align-baseline" title="Delete Menu">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper">
                            {{ $menus->withQueryString()->links('vendor.pagination.custom') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection