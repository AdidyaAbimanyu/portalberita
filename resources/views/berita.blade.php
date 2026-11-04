@extends('layouts.app')

@section('title', $berita->judul . ' | WiNews')

@section('content')
    <article class="page-container article-page">
        <header class="article-header">
            <nav class="article-breadcrumb" aria-label="Breadcrumb">
                <a href="{{ route('home') }}">Beranda</a>
                <span aria-hidden="true"> / </span>
                <a href="{{ route('cari', ['query' => $berita->kategori]) }}">{{ $berita->kategori }}</a>
            </nav>

            <a class="article-category" href="{{ route('cari', ['query' => $berita->kategori]) }}">
                {{ $berita->kategori }}
            </a>
            <h1 class="article-title">{{ $berita->judul }}</h1>
            <p class="article-subtitle">{{ $berita->sub_judul }}</p>

            <div class="article-byline">
                <p class="article-byline__author">
                    {{ $berita->pengguna->nama ?? 'Redaksi WiNews' }}
                    <span class="article-byline__date">
                        {{ $berita->created_at->locale('id')->translatedFormat('l, d F Y') }}
                    </span>
                </p>
                <button class="share-button" type="button" data-share-url="{{ url()->current() }}">
                    Salin tautan
                </button>
            </div>
        </header>

        @if ($berita->gambar)
            <figure class="article-figure">
                <img
                    class="article-image"
                    src="{{ asset($berita->gambar) }}"
                    alt="{{ $berita->judul }}"
                    fetchpriority="high"
                    decoding="async"
                >
            </figure>
        @endif

        <div class="article-content">
            @foreach (explode("\n", $berita->isi) as $paragraf)
                @if (trim($paragraf) !== '')
                    <p>{{ $paragraf }}</p>
                @endif
            @endforeach
        </div>
    </article>

    <section class="page-container comments-section" aria-labelledby="comments-title">
        <h2 class="comments-title" id="comments-title">Komentar ({{ $berita->komentar->count() }})</h2>

        <form action="{{ route('komentar.store', ['id' => $berita->id_berita]) }}" method="POST" class="comment-form">
            @csrf
            <label for="comment-body">Tulis komentar</label>
            <textarea
                id="comment-body"
                name="isi"
                class="form-control @error('isi') is-invalid @enderror"
                rows="4"
                maxlength="1000"
                required
                aria-describedby="@error('isi') comment-error @enderror"
            >{{ old('isi') }}</textarea>
            @error('isi')
                <div class="invalid-feedback" id="comment-error">{{ $message }}</div>
            @enderror
            <button type="submit" class="editorial-button">Kirim komentar</button>
        </form>

        <div class="comments-list">
            @forelse ($berita->komentar as $komentar)
                <article class="comment-item">
                    <p class="comment-item__author">{{ $komentar->pengguna->nama ?? 'Pembaca' }}</p>
                    <p class="comment-item__text">{{ $komentar->isi }}</p>
                    @auth
                        @if (auth()->user()->getKey() == $komentar->id_pengguna)
                            <form action="{{ route('komentar.destroy', $komentar->id_komentar) }}" method="POST" class="form-hapus-komentar">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="comment-delete">Hapus komentar</button>
                            </form>
                        @endif
                    @endauth
                </article>
            @empty
                <p class="comments-empty">Belum ada komentar. Anda dapat memulai percakapan.</p>
            @endforelse
        </div>
    </section>

    @push('scripts')
        <script>
            document.querySelectorAll('[data-share-url]').forEach((button) => {
                button.addEventListener('click', async () => {
                    try {
                        await navigator.clipboard.writeText(button.dataset.shareUrl);
                        button.textContent = 'Tautan tersalin';
                    } catch {
                        button.textContent = 'Salin tidak tersedia di browser ini';
                    }
                });
            });

            document.querySelectorAll('.form-hapus-komentar').forEach((form) => {
                form.addEventListener('submit', (event) => {
                    if (!window.confirm('Hapus komentar ini? Tindakan ini tidak dapat dibatalkan.')) {
                        event.preventDefault();
                    }
                });
            });
        </script>
    @endpush
@endsection
