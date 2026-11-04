@extends('layouts.app')

@section('title', 'Kelola berita | WiNews')

@section('content')
    <div class="page-container admin-page">
        <header class="admin-page__header">
            <div>
                <p class="eyebrow">Ruang redaksi</p>
                <h1 class="admin-page__title">Kelola berita</h1>
                <p class="admin-page__intro">Kelola artikel yang terbit di WiNews.</p>
            </div>
            <a href="{{ route('form') }}" class="editorial-button">Tulis berita</a>
        </header>

        @if (session('success'))
            <p class="admin-notice" role="status">{{ session('success') }}</p>
        @endif

        <section class="admin-list" id="admin-news-list" aria-labelledby="admin-list-title">
            <div class="admin-list__header">
                <div>
                    <h2 id="admin-list-title">Daftar artikel</h2>
                    <p class="admin-list__count" id="admin-result-count" aria-live="polite">
                        {{ $beritas->count() }} artikel
                    </p>
                </div>
                <div class="admin-search">
                    <label class="admin-search__label" for="admin-news-search">Cari artikel</label>
                    <input
                        type="search"
                        id="admin-news-search"
                        placeholder="Cari judul atau rubrik"
                        autocomplete="off"
                        aria-controls="admin-news-list"
                    >
                </div>
            </div>

            @forelse ($beritas as $berita)
                <article class="admin-story" data-admin-story>
                    <a class="admin-story__image" href="{{ route('berita.edit', $berita->id_berita) }}" aria-label="Edit {{ $berita->judul }}">
                        @if ($berita->gambar)
                            <img src="{{ asset($berita->gambar) }}" alt="" loading="lazy" decoding="async">
                        @else
                            <span class="admin-story__image-empty" aria-hidden="true">Tanpa gambar</span>
                        @endif
                    </a>
                    <div class="admin-story__content">
                        <p class="admin-story__category">{{ $berita->kategori }}</p>
                        <h3 class="admin-story__title">{{ $berita->judul }}</h3>
                        <p class="admin-story__subtitle">{{ $berita->sub_judul }}</p>
                        <p class="admin-story__excerpt">{{ \Illuminate\Support\Str::limit($berita->isi, 100) }}</p>
                        <p class="admin-story__date">{{ $berita->created_at->locale('id')->translatedFormat('d F Y') }}</p>
                    </div>
                    <div class="admin-story__actions" aria-label="Aksi artikel">
                        <a href="{{ route('berita.edit', $berita->id_berita) }}" class="admin-action admin-action--edit">Edit</a>
                        <form action="{{ route('berita.destroy', $berita->id_berita) }}" method="POST" class="delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="admin-action admin-action--delete">Hapus</button>
                        </form>
                    </div>
                </article>
            @empty
                <div class="admin-empty">
                    <h3>Belum ada berita</h3>
                    <p>Artikel yang Anda terbitkan akan muncul di sini.</p>
                    <a href="{{ route('form') }}" class="editorial-button">Tulis berita pertama</a>
                </div>
            @endforelse

            @if ($beritas->isNotEmpty())
                <p class="admin-empty admin-empty--filtered" id="admin-no-results" hidden>
                    Tidak ada artikel yang cocok dengan pencarian.
                </p>
            @endif
        </section>
    </div>

    @push('scripts')
        <script>
            const adminSearch = document.getElementById('admin-news-search');
            const adminStories = Array.from(document.querySelectorAll('[data-admin-story]'));
            const adminResultCount = document.getElementById('admin-result-count');
            const adminNoResults = document.getElementById('admin-no-results');

            adminSearch?.addEventListener('input', () => {
                const query = adminSearch.value.trim().toLocaleLowerCase();
                let visibleCount = 0;

                adminStories.forEach((story) => {
                    const matches = story.textContent.toLocaleLowerCase().includes(query);
                    story.hidden = !matches;
                    visibleCount += Number(matches);
                });

                if (adminResultCount) {
                    adminResultCount.textContent = `${visibleCount} artikel`;
                }

                if (adminNoResults) {
                    adminNoResults.hidden = visibleCount > 0;
                }
            });

            document.querySelectorAll('.delete-form').forEach((form) => {
                form.addEventListener('submit', (event) => {
                    if (!window.confirm('Hapus artikel ini? Tindakan ini tidak dapat dibatalkan.')) {
                        event.preventDefault();
                    }
                });
            });
        </script>
    @endpush
@endsection
