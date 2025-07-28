@extends('layouts.app')

@section('title', 'Home')

@push('styles')
    <style>
        .nav-link:hover {
            text-decoration: underline;
        }
    </style>
@endpush

@section('content')
    <!-- Menu Bar -->
    <div class="container">
        <ul class="nav justify-content-center align-items-center text-center">
            @php
                $menus = [
                    'Home',
                    'Terbaru',
                    'Bisnis',
                    'Pasar',
                    'Teknologi',
                    'Gaya Hidup',
                    'Politik',
                    'Olahraga',
                    'Pendidikan',
                    'Budaya',
                ];
            @endphp
            @foreach ($menus as $menu)
                <li class="nav-item">
                    <a class="nav-link text-dark fw-bold" href="/cari?query={{ $menu }}">{{ $menu }}</a>
                </li>
            @endforeach
        </ul>
    </div>

    <!-- Headline Berita Utama -->
    <div class="container pt-3">
        <div class="row">
            <div class="col-12 text-center">
                <a href="{{ route('berita.show', $beritaUtama->id_berita) }}">
                    <img src="{{ asset($beritaUtama->gambar) }}" alt="Thumbnail"
                        style="width: 100%; max-width: 1100px; height: 400px; object-fit: cover;">
                </a>
                <h5 class="fw-bold mt-3">
                    <a href="{{ route('berita.show', $beritaUtama->id_berita) }}" class="text-dark text-decoration-none">
                        {{ $beritaUtama->judul }}
                    </a>
                </h5>
                <p>{{ $beritaUtama->sub_judul }}</p>
            </div>
        </div>
    </div>

    <!-- Section Berita Terbaru -->
    <div class="container pb-4">
        <div class="row border-top pt-4">
            <!-- Kolom Terbaru tanpa gambar -->
            <div class="col-md-4 border-end pe-4">
                <h5 class="fw-bold mb-3">Terbaru</h5>
                @foreach ($beritaTerbaru->take(5) as $bt)
                    <div class="mb-3">
                        <p class="mb-1 fw-medium">
                            <a href="{{ route('berita.show', $bt->id_berita) }}" class="text-dark text-decoration-none">
                                {{ $bt->judul }}
                            </a>
                        </p>
                        <small class="text-muted">{{ $bt->created_at->diffForHumans() }}</small>
                    </div>
                @endforeach
            </div>

            <!-- Kolom dengan gambar -->
            <div class="col-md-8 ps-md-4">
                @foreach ($beritaTerbaru->skip(5)->take(4) as $bt)
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <a href="{{ route('berita.show', $bt->id_berita) }}">
                                <img src="{{ asset($bt->gambar) }}" alt="Thumbnail" class="img-fluid">
                            </a>
                        </div>
                        <div class="col-md-8">
                            <h6 class="fw-bold">
                                <a href="{{ route('berita.show', $bt->id_berita) }}"
                                    class="text-dark text-decoration-none">
                                    {{ $bt->judul }}
                                </a>
                            </h6>
                            <p class="mb-0">{{ Str::limit($bt->sub_judul, 100) }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Section 4 Kolom Kategori 1 -->
    <div class="container py-4">
        <div class="row border-top pt-4">
            @php
                $firstHalf = array_slice(array_keys($beritaKategori), 0, 4);
            @endphp
            @foreach ($firstHalf as $kategori)
                <div class="col-md-3 border-end">
                    <h5 class="fw-bold mb-3">{{ $kategori }}</h5>
                    @foreach ($beritaKategori[$kategori] as $berita)
                        <a href="{{ route('berita.show', $berita->id_berita) }}"
                            class="d-flex align-items-center mb-5 text-dark text-decoration-none">
                            <img src="{{ asset($berita->gambar) }}" alt="Thumbnail" class="me-2"
                                style="width: 110px; height: 55px; object-fit: cover;">
                            <p class="mb-0">{{ Str::limit($berita->judul, 60) }}</p>
                        </a>
                    @endforeach
                    <a href="/cari?query={{ $kategori }}" class="fw-bold text-decoration-underline"
                        style="color: #7686A3">TAMPILKAN SEMUA</a>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Section 4 Kolom Kategori 2 -->
    <div class="container py-4">
        <div class="row border-top pt-4">
            @php
                $secondHalf = array_slice(array_keys($beritaKategori), 4, 4);
            @endphp
            @foreach ($secondHalf as $kategori)
                <div class="col-md-3 border-end">
                    <h5 class="fw-bold mb-3">{{ $kategori }}</h5>
                    @foreach ($beritaKategori[$kategori] as $berita)
                        <a href="{{ route('berita.show', $berita->id_berita) }}"
                            class="d-flex align-items-center mb-5 text-dark text-decoration-none">
                            <img src="{{ asset($berita->gambar) }}" alt="Thumbnail" class="me-2"
                                style="width: 110px; height: 55px; object-fit: cover;">
                            <p class="mb-0">{{ Str::limit($berita->judul, 60) }}</p>
                        </a>
                    @endforeach
                    <a href="/cari?query={{ $kategori }}" class="fw-bold text-decoration-underline"
                        style="color: #7686A3">TAMPILKAN SEMUA</a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
