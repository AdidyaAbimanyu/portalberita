@extends('layouts.app')

@section('title', 'Home')

@push('styles')
<style>
    :root {
        --primary-color: #27394a;
        --secondary-color: #27394a;
        --text-muted: #6C757D;
        --border-light: #E9ECEF;
    }

    .category-nav {
        background: linear-gradient(to bottom, #ffffff 0%, #f8f9fa 100%);
        border-bottom: 2px solid var(--border-light);
        padding: 1rem 0;
        position: sticky;
        top: 80px;
        z-index: 1000;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }

    .category-nav .nav-link {
        position: relative;
        transition: all 0.3s ease;
        font-weight: 600;
        font-size: 0.95rem;
        padding: 0.5rem 1rem !important;
    }

    .category-nav .nav-link:hover {
        color: var(--secondary-color) !important;
        text-decoration: none;
        transform: translateY(-2px);
    }

    .category-nav .nav-link::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        width: 0;
        height: 2px;
        background: var(--secondary-color);
        transition: all 0.3s ease;
        transform: translateX(-50%);
    }

    .category-nav .nav-link:hover::after {
        width: 80%;
    }

    .headline-section {
        position: relative;
        overflow: hidden;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        margin-bottom: 3rem;
    }

    .headline-image {
        position: relative;
        overflow: hidden;
        border-radius: 12px;
    }

    .headline-image img {
        transition: transform 0.5s ease;
        width: 100%;
        height: 500px;
        object-fit: cover;
    }

    .headline-image:hover img {
        transform: scale(1.05);
    }

    .headline-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, transparent 100%);
        padding: 2rem;
        color: white;
    }

    .headline-title {
        font-size: 2rem;
        font-weight: 700;
        line-height: 1.3;
        margin-bottom: 0.5rem;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
    }

    .headline-subtitle {
        font-size: 1.1rem;
        opacity: 0.9;
    }

    .news-card {
        border: none;
        border-radius: 10px;
        overflow: hidden;
        transition: all 0.3s ease;
        background: white;
        height: 100%;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    }

    .news-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    }

    .news-card img {
        transition: transform 0.5s ease;
    }

    .news-card:hover img {
        transform: scale(1.1);
    }

    .card-img-wrapper {
        overflow: hidden;
        position: relative;
    }

    .latest-news-item {
        padding: 1rem 0;
        border-bottom: 1px solid var(--border-light);
        transition: all 0.3s ease;
    }

    .latest-news-item:hover {
        background-color: #f8f9fa;
        padding-left: 1rem;
        border-left: 3px solid var(--secondary-color);
    }

    .latest-news-item:last-child {
        border-bottom: none;
    }

    .section-header {
        position: relative;
        padding-bottom: 0.75rem;
        margin-bottom: 1.5rem;
        font-weight: 700;
        font-size: 1.5rem;
        color: var(--primary-color);
    }

    .section-header::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 60px;
        height: 4px;
        background: var(--secondary-color);
        border-radius: 2px;
    }

    .category-badge {
        display: inline-block;
        padding: 0.25rem 0.75rem;
        background: var(--secondary-color);
        color: white;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 0.5rem;
    }

    .thumbnail-small {
        width: 110px;
        height: 75px;
        object-fit: cover;
        border-radius: 8px;
    }

    .view-all-link {
        display: inline-flex;
        align-items: center;
        color: var(--secondary-color);
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        margin-top: 1rem;
    }

    .view-all-link:hover {
        color: #1a2633;
        transform: translateX(5px);
    }

    .view-all-link::after {
        content: '→';
        margin-left: 0.5rem;
        transition: margin-left 0.3s ease;
    }

    .view-all-link:hover::after {
        margin-left: 1rem;
    }

    .news-title {
        font-weight: 600;
        line-height: 1.4;
        color: var(--primary-color);
        transition: color 0.3s ease;
    }

    .news-title:hover {
        color: var(--secondary-color);
    }

    .time-badge {
        display: inline-flex;
        align-items: center;
        font-size: 0.85rem;
        color: var(--text-muted);
    }

    .time-badge::before {
        content: '🕒';
        margin-right: 0.25rem;
    }

    .content-section {
        padding: 3rem 0;
    }

    .divider-section {
        border-top: 1px solid var(--border-light);
        margin: 2rem 0;
    }

    @media (max-width: 768px) {
        .headline-title {
            font-size: 1.5rem;
        }

        .section-header {
            font-size: 1.25rem;
        }

        .category-nav .nav-link {
            font-size: 0.85rem;
            padding: 0.4rem 0.6rem !important;
        }
    }
</style>
@endpush

@section('content')
    <div class="category-nav">
        <div class="container">
            <ul class="nav justify-content-center align-items-center flex-wrap">
                @php
                    $menus = ['Terbaru', 'Bisnis', 'Pasar', 'Teknologi', 'Gaya Hidup', 'Politik', 'Olahraga', 'Pendidikan', 'Budaya'];
                @endphp
                @foreach ($menus as $menu)
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="/cari?query={{ $menu }}">{{ $menu }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="container mt-4">
        <div class="headline-section">
            <a href="{{ route('berita.show', $beritaUtama->id_berita) }}" class="headline-image d-block">
                <img src="{{ asset($beritaUtama->gambar) }}" alt="{{ $beritaUtama->judul }}">
                <div class="headline-overlay">
                    <div class="category-badge">Breaking News</div>
                    <h1 class="headline-title">{{ $beritaUtama->judul }}</h1>
                    <p class="headline-subtitle mb-0">{{ $beritaUtama->sub_judul }}</p>
                </div>
            </a>
        </div>
    </div>

    <div class="container content-section">
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="card news-card h-100">
                    <div class="card-body">
                        <h2 class="section-header">Terbaru</h2>
                        @foreach ($beritaTerbaru->take(5) as $bt)
                            <div class="latest-news-item">
                                <a href="{{ route('berita.show', $bt->id_berita) }}" class="text-decoration-none">
                                    <h6 class="news-title mb-2">{{ $bt->judul }}</h6>
                                    <small class="time-badge">{{ $bt->created_at->diffForHumans() }}</small>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="row g-4">
                    @foreach ($beritaTerbaru->skip(5)->take(4) as $bt)
                        <div class="col-md-6">
                            <div class="card news-card">
                                <div class="card-img-wrapper">
                                    <a href="{{ route('berita.show', $bt->id_berita) }}">
                                        <img src="{{ asset($bt->gambar) }}" class="card-img-top" alt="{{ $bt->judul }}" style="height: 200px; object-fit: cover;">
                                    </a>
                                </div>
                                <div class="card-body">
                                    <a href="{{ route('berita.show', $bt->id_berita) }}" class="text-decoration-none">
                                        <h5 class="news-title mb-2">{{ $bt->judul }}</h5>
                                        <p class="text-muted small mb-2">{{ Str::limit($bt->sub_judul, 100) }}</p>
                                        <small class="time-badge">{{ $bt->created_at->diffForHumans() }}</small>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="divider-section"></div>

    <div class="container content-section">
        <div class="row g-4">
            @php
                $firstHalf = array_slice(array_keys($beritaKategori), 0, 4);
            @endphp
            @foreach ($firstHalf as $kategori)
                <div class="col-lg-3 col-md-6">
                    <div class="card news-card h-100">
                        <div class="card-body">
                            <h3 class="section-header">{{ $kategori }}</h3>
                            @foreach ($beritaKategori[$kategori] as $berita)
                                <a href="{{ route('berita.show', $berita->id_berita) }}" class="d-flex align-items-start mb-3 text-decoration-none">
                                    <img src="{{ asset($berita->gambar) }}" alt="{{ $berita->judul }}" class="thumbnail-small me-3 flex-shrink-0">
                                    <p class="news-title mb-0 small">{{ Str::limit($berita->judul, 60) }}</p>
                                </a>
                            @endforeach
                            <a href="/cari?query={{ $kategori }}" class="view-all-link">Lihat Semua</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="divider-section"></div>

    <div class="container content-section pb-5">
        <div class="row g-4">
            @php
                $secondHalf = array_slice(array_keys($beritaKategori), 4, 4);
            @endphp
            @foreach ($secondHalf as $kategori)
                <div class="col-lg-3 col-md-6">
                    <div class="card news-card h-100">
                        <div class="card-body">
                            <h3 class="section-header">{{ $kategori }}</h3>
                            @foreach ($beritaKategori[$kategori] as $berita)
                                <a href="{{ route('berita.show', $berita->id_berita) }}" class="d-flex align-items-start mb-3 text-decoration-none">
                                    <img src="{{ asset($berita->gambar) }}" alt="{{ $berita->judul }}" class="thumbnail-small me-3 flex-shrink-0">
                                    <p class="news-title mb-0 small">{{ Str::limit($berita->judul, 60) }}</p>
                                </a>
                            @endforeach
                            <a href="/cari?query={{ $kategori }}" class="view-all-link">Lihat Semua</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
