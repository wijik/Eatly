@extends('layouts.user.app')
@section('content')
<section class="mb-5">
    <h4 class="section-title">Rekomendasi Menu Hari Ini</h4>
    <div class="row">
        @forelse ($rekomendasi as $item)
        @php
        $menu = is_array($item) ? $item['menu'] : $item->menu;
        @endphp
        <div class="col-md-4 mb-4">
            <div class="reco-card">
                @if ($menu && $menu->gambar)
                <img src="{{ asset($menu->gambar) }}"
                    alt="{{ $menu->nama_menu }}"
                    class="img-fluid rounded shadow"
                    style="max-height: 300px; object-fit: cover;">
                @else
                <img src="{{ asset('images/default.jpg') }}"
                    alt="Default Menu"
                    class="img-fluid rounded shadow"
                    style="max-height: 300px; object-fit: cover;">
                @endif
                <div class="reco-card-body">
                    <h5 class="reco-card-title">{{ $item['menu']->nama_menu }}</h5>
                    <p class="reco-card-text">Kalori: {{ $item['menu']->kalori }} kkal</p>
                    @php
                    $deskripsi = $item['menu']->deskripsi ?? 'Menu bergizi dan sesuai dengan preferensi rasa Anda.';
                    $maxWords = 30;
                    $words = explode(' ', $deskripsi);
                    @endphp
                    <p class="reco-card-text">
                        {{ implode(' ', array_slice($words, 0, $maxWords)) }}
                        @if (count($words) > $maxWords)
                        ... <a href="{{ route('menu.showDetail', $item['menu']->id) }}">Lihat selengkapnya</a>
                        @endif
                    </p>
                    <div class="mt-3 d-flex align-items-center gap-3">
                        <div class="position-relative" style="width: 60px; height: 60px;">
                            <svg width="60" height="60">
                                <circle cx="30" cy="30" r="26" stroke="#eee" stroke-width="6" fill="none" />
                                <circle cx="30" cy="30" r="26" stroke="url(#grad1)" stroke-width="6" fill="none"
                                    stroke-dasharray="163.36"
                                    stroke-dashoffset="{{ 163.36 - (163.36 * $item['skor']) }}"
                                    transform="rotate(-90 30 30)" />
                                <defs>
                                    <linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="0%">
                                        <stop offset="0%" style="stop-color:#00c6ff;" />
                                        <stop offset="100%" style="stop-color:#0072ff;" />
                                    </linearGradient>
                                </defs>
                            </svg>
                            <div class="position-absolute top-50 start-50 translate-middle text-dark fw-bold small">
                                {{ number_format($item['skor'] * 100, 0) }}%
                            </div>
                        </div>
                        <div>
                            <label class="small text-secondary">Tingkat Rekomendasi</label><br>
                            <span class="text-dark fw-semibold">{{ $item['menu']->nama_menu }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <p>Tidak ada menu yang direkomendasikan hari ini.</p>
        </div>
        @endforelse
    </div>
</section>
@endsection