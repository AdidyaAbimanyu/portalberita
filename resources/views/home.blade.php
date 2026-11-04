@extends('layouts.app')

@section('title', 'WiNews | Berita Indonesia')

@section('content')
    <div class="page-container home-page">
        @if ($beritaUtama)
            <section class="home-lead" aria-labelledby="lead-headline">
                <a class="home-lead__image" href="{{ route('berita.show', $beritaUtama->id_berita) }}">
                    @if ($beritaUtama->gambar)
                        <img
                            src="{{ asset($beritaUtama->gambar) }}"
                            alt="{{ $beritaUtama->judul }}"
                            fetchpriority="high"
                            decoding="async"
                        >
                    @endif
                </a>
                <div class="home-lead__copy">
                    <a class="eyebrow" href="{{ route('cari', ['query' => $beritaUtama->kategori]) }}">
                        {{ $beritaUtama->kategori }}
                    </a>
                    <h1 class="home-lead__title" id="lead-headline">
                        <a href="{{ route('berita.show', $beritaUtama->id_berita) }}">{{ $beritaUtama->judul }}</a>
                    </h1>
                    <p class="home-lead__summary">{{ $beritaUtama->sub_judul }}</p>
                    <div class="story-meta">
                        <span>{{ $beritaUtama->created_at->locale('id')->translatedFormat('d F Y') }}</span>
                        @if ($beritaUtama->pengguna)
                            <span>{{ $beritaUtama->pengguna->nama }}</span>
                        @endif
                    </div>
                </div>
            </section>
        @else
            <section class="home-lead">
                <div class="home-lead__copy">
                    <p class="eyebrow">WiNews</p>
                    <h1 class="home-lead__title">Berita terbaru, segera hadir.</h1>
                    <p class="home-lead__summary">Belum ada berita yang diterbitkan.</p>
                </div>
            </section>
        @endif

        <section class="home-section latest-layout" aria-label="Berita terbaru">
            <div>
                <div class="section-heading">
                    <h2>Terbaru</h2>
                    <a href="{{ route('cari') }}">Semua berita</a>
                </div>
                <ol class="latest-list">
                    @forelse ($beritaTerbaru->take(5) as $berita)
                        <li>
                            <p class="story-category">{{ $berita->kategori }}</p>
                            <h3 class="story-title">
                                <a href="{{ route('berita.show', $berita->id_berita) }}">{{ $berita->judul }}</a>
                            </h3>
                            <div class="story-meta">
                                <span>{{ $berita->created_at->diffForHumans() }}</span>
                            </div>
                        </li>
                    @empty
                        <li class="comments-empty">Belum ada berita terbaru.</li>
                    @endforelse
                </ol>
            </div>

            <div class="latest-grid">
                @foreach ($beritaTerbaru->skip(5)->take(4) as $berita)
                    <article>
                        <a href="{{ route('berita.show', $berita->id_berita) }}" aria-label="{{ $berita->judul }}">
                            @if ($berita->gambar)
                                <img
                                    class="story-image"
                                    src="{{ asset($berita->gambar) }}"
                                    alt="{{ $berita->judul }}"
                                    loading="lazy"
                                    decoding="async"
                                >
                            @endif
                        </a>
                        <p class="story-category">{{ $berita->kategori }}</p>
                        <h3 class="story-title">
                            <a href="{{ route('berita.show', $berita->id_berita) }}">{{ $berita->judul }}</a>
                        </h3>
                        <p class="story-summary">{{ \Illuminate\Support\Str::limit($berita->sub_judul, 100) }}</p>
                        <div class="story-meta">
                            <span>{{ $berita->created_at->diffForHumans() }}</span>
                        </div>
                    </article>
                @endforeach
            </div>
        </section>

        <div class="category-sections">
            @foreach ($beritaKategori as $kategori => $beritaList)
                @if ($beritaList->isNotEmpty())
                    <section class="category-section" aria-labelledby="category-{{ \Illuminate\Support\Str::slug($kategori) }}">
                        <h2 class="category-section__title" id="category-{{ \Illuminate\Support\Str::slug($kategori) }}">
                            <a href="{{ route('cari', ['query' => $kategori]) }}">{{ $kategori }}</a>
                        </h2>
                        @foreach ($beritaList->take(4) as $berita)
                            <article class="category-story">
                                @if ($berita->gambar)
                                    <a href="{{ route('berita.show', $berita->id_berita) }}" aria-label="{{ $berita->judul }}">
                                        <img
                                            src="{{ asset($berita->gambar) }}"
                                            alt="{{ $berita->judul }}"
                                            loading="lazy"
                                            decoding="async"
                                        >
                                    </a>
                                @endif
                                <div>
                                    <h3 class="story-title">
                                        <a href="{{ route('berita.show', $berita->id_berita) }}">{{ $berita->judul }}</a>
                                    </h3>
                                    <div class="story-meta">
                                        <span>{{ $berita->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </section>
                @endif
            @endforeach
        </div>
    </div>
@endsection
