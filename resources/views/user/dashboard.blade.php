@extends('layouts.user.app')
@section('content')
<section>
    <h4 class="section-title">Quick Stats</h4>
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card stat-card p-4">
                <div class="emoji-bg emoji-bottom-right">📋</div>
                <h5 class="card-title mb-2">Total Menu</h5>
                <h3 class="card-text">{{ $totalMenu }}</h3>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card stat-card p-4">
                <div class="emoji-bg emoji-bottom-right">⚖️</div>
                <h5 class="card-title mb-2">Kebutuhan Kalori</h5>
                <h3 class="card-text">{{ $kebutuhanKalori }} kkal</h3>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card stat-card p-4">
                <div class="emoji-bg emoji-bottom-right">⭐</div>
                <h5 class="card-title mb-2">Skor SAW Tertinggi</h5>
                <h3 class="card-text">
                    {{ $skorTertinggi ? number_format($skorTertinggi, 2) : 'Belum Ada' }}
                </h3>
            </div>
        </div>
    </div>
</section>


<section>
    <h4 class="section-title">Rekomendasi Hari Ini</h4>
    <div class="row">
        @foreach($rekomendasiHariIni as $rekomendasi)
        <div class="col-md-4">
            <div class="card card-custom p-3">
                <h5>{{ $rekomendasi->menu->nama_menu }}</h5>
                <p>Skor SAW: <strong>{{ $rekomendasi->skor }}</strong></p>
                <p>Kalori: {{ $rekomendasi->menu->kalori }} kkal</p>
            </div>
        </div>
        @endforeach
    </div>
</section>

<section>
    <h4 class="section-title">Grafik Konsumsi Kalori Minggu Ini</h4>
    <div class="card card-custom p-4">
        <canvas id="calorieChart" height="100"></canvas>
    </div>
</section>
@endsection