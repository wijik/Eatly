@extends('layouts.admin.app')
@section('content')
<!-- Navbar -->
@include('layouts.admin.navbar')
<!-- End Navbar -->
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Karyawan</p>
                                <h5 class="font-weight-bolder">
                                    {{ $totalEmployees }}
                                </h5>
                                <p class="mb-0">
                                    <span class="text-success text-sm font-weight-bolder">+{{ $employeeGrowth }}%</span>
                                    Dibanding bulan lalu
                                </p>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Menu Makanan</p>
                                <h5 class="font-weight-bolder">
                                    {{ $totalMenus }}
                                </h5>
                                <p class="mb-0">
                                    <span class="text-success text-sm font-weight-bolder">+{{ $menuGrowth }}%</span>
                                    sejak update terakhir
                                </p>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Preferensi Rasa</p>
                                <h5 class="font-weight-bolder">
                                    {{ $totalPreferensi }}
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-info shadow-info text-center rounded-circle">
                                <i class="ni ni-chart-bar-32 text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Rasa Terpopuler</p>
                                <h5 class="font-weight-bolder">
                                    {{ $mostPopularTaste }}
                                </h5>
                                <p class="mb-0">
                                    <span class="text-success text-sm font-weight-bolder">{{ $popularTasteCount }}</span> kali direkomendasikan
                                </p>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                                <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-lg-7 mb-lg-0 mb-4">
            <div class="card z-index-2 h-100">
                <div class="card-header pb-0 pt-3 bg-transparent">
                    <h6 class="text-capitalize">Tren Preferensi Rasa</h6>
                </div>
                <div class="card-body p-3">
                    <div class="chart">
                        <div style="max-width: 350px; margin: auto;">
                            <canvas id="rasaPieChart" class="chart-canvas" height="250"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="card card-carousel overflow-hidden h-100 p-0">
                <div id="carouselMenuMakanan" class="carousel slide h-100" data-bs-ride="carousel">
                    <div class="carousel-inner border-radius-lg h-100">
                        @foreach($menus as $key => $menu)
                        <div class="carousel-item h-100 {{ $key == 0 ? 'active' : '' }}"
                            style="background-image: url('{{ asset($menu->gambar) }}'); background-size: cover;">
                            <div class="carousel-caption d-none d-md-block bottom-0 start-0 end-0 px-4 pb-4">
                                <div class="box-liquid">
                                    <h5 class="mb-1 text-white" style="font-weight: 600; text-shadow: 1px 1px 10px rgba(0,0,0,0.7);">
                                        {{ $menu->nama_menu }}
                                    </h5>
                                    <p class="mb-0 text-white" style="font-weight: 500; text-shadow: 1px 1px 10px rgba(0,0,0,0.7);">
                                        {{ Str::limit($menu->deskripsi, 100) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev w-5 me-3" type="button" data-bs-target="#carouselMenuMakanan" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next w-5 me-3" type="button" data-bs-target="#carouselMenuMakanan" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-lg-7 mb-lg-0 mb-4">
            <div class="card ">
                <div class="card-header pb-0 p-3">
                    <div class="d-flex justify-content-between">
                        <h6 class="mb-2">Makanan paling sering direkomendasikan</h6>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center">
                        <tbody>
                            @foreach ($topMenus as $menu)
                            <tr>
                                <td class="w-30">
                                    <div class="d-flex px-2 py-1 align-items-center">
                                        <div>
                                            <img src="{{ asset($menu->gambar) }}" class="avatar avatar-sm me-3" alt="menu image">
                                        </div>
                                        <div class="ms-4">
                                            <p class="text-xs font-weight-bold mb-0">Menu:</p>
                                            <h6 class="text-sm mb-0">{{ $menu->nama_menu }}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">Total Rekomendasi:</p>
                                        <h6 class="text-sm mb-0">{{ $menu->total_rekomendasi }}</h6>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">Status:</p>
                                        <h6 class="text-sm mb-0">
                                            {{ $menu->is_today ? 'Menu Hari Ini' : 'Bukan Hari Ini' }}
                                        </h6>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="card">
                <div class="card-header pb-0 p-3">
                    <h6 class="mb-0">Menu Terakhir Diubah</h6>
                </div>
                <div class="card-body p-3">
                    <ul class="list-group">
                        @forelse ($recentlyUpdatedMenus as $menu)
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex align-items-center">
                                <div class="icon icon-shape icon-sm me-3 bg-gradient-info shadow text-center">
                                    <i class="ni ni-bullet-list-67 text-white opacity-10"></i>
                                </div>
                                <div class="d-flex flex-column">
                                    <h6 class="mb-1 text-dark text-sm">{{ $menu->nama_menu }}</h6>
                                    <span class="text-xs">Diubah {{ $menu->updated_at->translatedFormat('d F Y, H:i') }}</span>
                                </div>
                            </div>
                        </li>
                        @empty
                        <li class="list-group-item text-center text-muted">Belum ada perubahan menu.</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@push('script')
<script>
    const rasaData = @json($preferensiRasa);

    const rasaLabels = rasaData.map(item => item.nama_rasa);
    const rasaTotals = rasaData.map(item => item.total);

    const ctx = document.getElementById('rasaPieChart').getContext('2d');

    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: rasaLabels,
            datasets: [{
                data: rasaTotals,
                backgroundColor: [
                    '#f87171', '#60a5fa', '#34d399', '#facc15',
                    '#a78bfa', '#fb923c', '#f472b6', '#4ade80',
                    '#38bdf8', '#c084fc'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        color: '#344767',
                        font: {
                            size: 12,
                            weight: 'bold'
                        }
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return `${context.label}: ${context.parsed} pengguna`;
                        }
                    }
                }
            }
        }
    });
</script>
@endpush
@endsection