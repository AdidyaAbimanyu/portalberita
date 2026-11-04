@extends('layouts.app')

@section('title', request('query') ? 'Cari: ' . request('query') . ' | WiNews' : 'Berita terbaru | WiNews')

@section('content')
    <div class="page-container search-page">
        <p class="eyebrow">Arsip WiNews</p>
        <h1 class="search-heading">{{ request('query') ? 'Hasil pencarian' : 'Berita terbaru' }}</h1>

        <form action="{{ route('cari') }}" method="GET" class="search-form" role="search">
            <label class="search-form__label" for="news-search">Cari berita</label>
            <input
                type="search"
                id="news-search"
                name="query"
                class="form-control"
                placeholder="Masukkan kata kunci"
                value="{{ request('query') }}"
                autocomplete="off"
            >
            <button type="submit" class="editorial-button">Cari</button>
        </form>

        <div class="search-result-heading">
            <h2>{{ request('query') ? 'Untuk “' . request('query') . '”' : 'Semua berita' }}</h2>
            <p>{{ $beritas->count() }} berita</p>
        </div>

        @forelse ($beritas as $berita)
            <article class="search-result">
                @if ($berita->gambar)
                    <a class="search-result__image" href="{{ route('berita.show', $berita->id_berita) }}">
                        <img
                            src="{{ asset($berita->gambar) }}"
                            alt="{{ $berita->judul }}"
                            loading="lazy"
                            decoding="async"
                        >
                    </a>
                @endif
                <div>
                    <a class="story-category" href="{{ route('cari', ['query' => $berita->kategori]) }}">
                        {{ $berita->kategori }}
                    </a>
                    <h3 class="story-title">
                        <a href="{{ route('berita.show', $berita->id_berita) }}">{{ $berita->judul }}</a>
                    </h3>
                    <p class="story-summary">{{ \Illuminate\Support\Str::limit($berita->sub_judul, 160) }}</p>
                    <div class="story-meta">
                        <span>{{ $berita->created_at->locale('id')->translatedFormat('d F Y') }}</span>
                        <span>{{ $berita->pengguna->nama ?? 'Redaksi WiNews' }}</span>
                    </div>
                </div>
            </article>
        @empty
            <div class="search-empty" role="status">
                <h2>Berita belum ditemukan</h2>
                <p>Coba kata kunci lain, atau kembali untuk membaca berita terbaru.</p>
            </div>
        @endforelse
    </div>
@endsection
