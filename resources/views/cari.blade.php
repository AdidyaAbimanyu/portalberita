@extends('layouts.app')

@section('title', 'Cari Berita')

@section('content')
    <div class="container py-4">
        <!-- Search Box -->
        <div class="mb-4 border-bottom pb-2">
            <form action="" method="GET" class="d-flex align-items-center">
                <input type="text" name="query" class="form-control border-0 shadow-none fs-5" placeholder="Mencari berita..."
                       value="{{ request('query') }}"
                    style="height: 48px;">
                <button class="btn bg-transparent text-dark" type="submit">
                    <i class="bi bi-search fs-4"></i>
                </button>
            </form>
        </div>

        <!-- Heading -->
        <h5 class="fw-semibold mb-4">Berita Terbaru dari WiNews</h5>

        <!-- List of Berita -->
        @foreach ($beritas as $berita)
            <div class="row mb-4 border-bottom pb-3">
                <div class="col-md-4">
                    <img src="{{ asset($berita->gambar) }}" alt="Gambar Berita" class="img-fluid"
                        style="max-height: 200px; object-fit: cover;">
                </div>
                <div class="col-md-8">
                    <p class="text-uppercase fw-semibold text-secondary small mb-1">
                        {{ strtoupper($berita->kategori) }} &raquo; {{ strtoupper(Str::slug($berita->judul, ' ')) }}
                    </p>
                    <h5 class="fw-bold mb-1">
                        <a href="{{ route('berita.show', $berita->id_berita) }}" class="text-dark text-decoration-none">
                            {{ $berita->judul }}
                        </a>
                    </h5>
                    <p class="text-muted mb-0">{{ Str::limit($berita->isi, 130) }}</p>
                </div>
            </div>
        @endforeach
    </div>
@endsection
