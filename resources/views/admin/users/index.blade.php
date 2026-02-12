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
                    <h6>Data Users</h6>
                    <a href="{{ route('users.create') }}"
                        class="btn btn-primary btn-sm position-absolute end-0 top-0 mt-3 me-3">
                        <i class="fas fa-plus me-1"></i> Tambah Data User
                    </a>
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
                                <form action="{{ route('users.index') }}" method="GET">
                                    <div class="d-flex align-items-center rounded-pill shadow-sm bg-white px-3 py-2" style="width: 100%; border: 1px solid #e0e0e0;">
                                        <i class="bi bi-search text-muted me-2"></i>
                                        <input
                                            type="text"
                                            name="search"
                                            class="form-control border-0 shadow-none bg-transparent"
                                            placeholder="Cari nama user..."
                                            value="{{ request('search') }}"
                                            style="box-shadow: none;">

                                        @if(request('search'))
                                        <a href="{{ route('users.index') }}" class="text-danger ms-2" style="text-decoration: none; font-size: 1.5rem;">&times;</a>
                                        @endif

                                        <div class="ms-2" style="margin-top: 10px;">
                                            <button type="submit" class="btn btn-sm btn-primary rounded-pill px-3">
                                                Cari
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Karyawan</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Role</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Bergabung</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <a href="{{ route('users.show', $user->id_user) }}">
                                                    <p class="text-xs text-secondary mb-0">{{ $user->email }}</p>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">
                                            {{ $user->role == 0 ? 'Admin' : 'User' }}
                                        </p>
                                        <p class="text-xs text-secondary mb-0">Karyawan</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        @if ($user->status === 'online')
                                        <span class="badge badge-sm bg-gradient-success">Online</span>
                                        @else
                                        <span class="badge badge-sm bg-gradient-secondary">Offline</span>
                                        @endif
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold">
                                            {{ $user->created_at->format('d/m/Y') }}
                                        </span>
                                    </td>
                                    <td class="align-middle">
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('users.edit', $user->id_user) }}" class="btn btn-sm btn-warning" title="Edit user">
                                                Edit
                                            </a>
                                            <form action="{{ route('users.destroy', $user->id_user) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-link text-danger p-0 m-0 align-baseline" title="Delete user">
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
                            {{ $users->withQueryString()->links('vendor.pagination.custom') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection