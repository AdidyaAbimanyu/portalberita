@extends('layouts.app')

@section('title', 'Cari Berita')

@push('styles')
<style>
    :root {
        --primary-color: #27394a;
        --secondary-color: #27394a;
        --text-muted: #6C757D;
        --border-light: #E9ECEF;
    }

    .search-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 3rem 1rem;
    }

    .search-box-wrapper {
        background: white;
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        padding: 1.5rem;
        margin-bottom: 3rem;
        position: relative;
    }

    .search-form {
        display: flex;
        align-items: center;
        gap: 1rem;
        position: relative;
    }

    .search-icon {
        position: absolute;
        left: 1.5rem;
        color: var(--text-muted);
        font-size: 1.5rem;
        z-index: 1;
    }

    .search-input {
        flex: 1;
        border: 2px solid var(--border-light);
        border-radius: 50px;
        padding: 1rem 1.5rem 1rem 4rem;
        font-size: 1.1rem;
        transition: all 0.3s ease;
    }

    .search-input:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 4px rgba(39, 57, 74, 0.1);
        outline: none;
    }

    .search-button {
        padding: 1rem 2.5rem;
        border-radius: 50px;
        background: linear-gradient(135deg, var(--primary-color) 0%, #1a2633 100%);
        color: white;
        border: none;
        font-weight: 600;
        font-size: 1rem;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(39, 57, 74, 0.3);
    }

    .search-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(39, 57, 74, 0.4);
    }

    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
        padding-bottom: 1rem;
        border-bottom: 3px solid var(--primary-color);
    }

    .section-title {
        font-size: 1.75rem;
        font-weight: 700;
        color: var(--primary-color);
        margin: 0;
    }

    .results-count {
        background-color: var(--primary-color);
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-size: 0.9rem;
        font-weight: 600;
    }

    .news-item {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        margin-bottom: 2rem;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        border: 1px solid var(--border-light);
    }

    .news-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        border-color: var(--primary-color);
    }

    .news-item-content {
        display: flex;
        gap: 1.5rem;
        padding: 1.5rem;
    }

    .news-image-wrapper {
        flex-shrink: 0;
        width: 300px;
        height: 200px;
        border-radius: 10px;
        overflow: hidden;
    }

    .news-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .news-item:hover .news-image {
        transform: scale(1.1);
    }

    .news-details {
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .news-category {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: var(--primary-color);
        margin-bottom: 0.75rem;
    }

    .category-dot {
        width: 6px;
        height: 6px;
        background-color: var(--primary-color);
        border-radius: 50%;
    }

    .news-title {
        font-size: 1.5rem;
        font-weight: 700;
        line-height: 1.3;
        margin-bottom: 1rem;
        color: var(--primary-color);
    }

    .news-title a {
        color: var(--primary-color);
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .news-title a:hover {
        color: #1a2633;
    }

    .news-excerpt {
        font-size: 1rem;
        line-height: 1.6;
        color: var(--text-muted);
        margin: 0;
        flex: 1;
    }

    .news-meta {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-top: 1rem;
        padding-top: 1rem;
        border-top: 1px solid var(--border-light);
    }

    .meta-item {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.85rem;
        color: var(--text-muted);
    }

    .read-more {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        color: var(--primary-color);
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        margin-left: auto;
    }

    .read-more:hover {
        color: #1a2633;
        gap: 0.75rem;
    }

    .empty-state {
        text-align: center;
        padding: 5rem 1rem;
    }

    .empty-icon {
        font-size: 5rem;
        margin-bottom: 1.5rem;
        opacity: 0.3;
    }

    .empty-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--primary-color);
        margin-bottom: 0.5rem;
    }

    .empty-text {
        font-size: 1rem;
        color: var(--text-muted);
    }

    @media (max-width: 768px) {
        .search-form {
            flex-direction: column;
        }

        .search-button {
            width: 100%;
        }

        .news-item-content {
            flex-direction: column;
        }

        .news-image-wrapper {
            width: 100%;
            height: 200px;
        }

        .section-header {
            flex-direction: column;
            gap: 1rem;
            align-items: flex-start;
        }

        .news-title {
            font-size: 1.25rem;
        }
    }
</style>
@endpush

@section('content')
<div class="search-container">
    <div class="search-box-wrapper">
        <form action="" method="GET" class="search-form">
            <span class="search-icon">🔍</span>
            <input
                type="text"
                name="query"
                class="search-input"
                placeholder="Cari berita yang Anda inginkan..."
                value="{{ request('query') }}"
                autocomplete="off"
            >
            <button class="search-button" type="submit">Cari</button>
        </form>
    </div>

    @if(request('query'))
        <div class="section-header">
            <h1 class="section-title">Hasil Pencarian</h1>
            <span class="results-count">{{ $beritas->count() }} hasil</span>
        </div>
    @else
        <div class="section-header">
            <h1 class="section-title">Semua Berita</h1>
            <span class="results-count">{{ $beritas->count() }} berita</span>
        </div>
    @endif

    @forelse ($beritas as $berita)
        <article class="news-item">
            <div class="news-item-content">
                <div class="news-image-wrapper">
                    <img src="{{ asset($berita->gambar) }}" alt="{{ $berita->judul }}" class="news-image">
                </div>

                <div class="news-details">
                    <div class="news-category">
                        <span class="category-dot"></span>
                        {{ strtoupper($berita->kategori) }}
                    </div>

                    <h2 class="news-title">
                        <a href="{{ route('berita.show', $berita->id_berita) }}">
                            {{ $berita->judul }}
                        </a>
                    </h2>

                    <p class="news-excerpt">{{ Str::limit($berita->isi, 150) }}</p>

                    <div class="news-meta">
                        <span class="meta-item">
                            📅 {{ $berita->created_at->format('d M Y') }}
                        </span>
                        <span class="meta-item">
                            👤 {{ $berita->pengguna->nama ?? 'Admin' }}
                        </span>
                        <a href="{{ route('berita.show', $berita->id_berita) }}" class="read-more">
                            Baca Selengkapnya →
                        </a>
                    </div>
                </div>
            </div>
        </article>
    @empty
        <div class="empty-state">
            <div class="empty-icon">🔍</div>
            <h2 class="empty-title">Berita tidak ditemukan</h2>
            <p class="empty-text">Coba gunakan kata kunci yang berbeda</p>
        </div>
    @endforelse
</div>
@endsection
