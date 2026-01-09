@extends('layouts.app')

@section('title', $berita->judul)

@push('styles')
<style>
    :root {
        --primary-color: #27394a;
        --secondary-color: #27394a;
        --success-color: #27AE60;
        --text-muted: #6C757D;
        --border-light: #E9ECEF;
    }

    body {
        overflow-x: hidden;
    }

    .article-container {
        max-width: 900px;
        margin: 0 auto;
        padding: 3rem 1rem;
        overflow-x: hidden;
    }

    .article-header {
        margin-bottom: 2rem;
    }

    .article-title {
        font-size: 2.5rem;
        font-weight: 800;
        line-height: 1.2;
        color: var(--primary-color);
        margin-bottom: 1rem;
        word-wrap: break-word;
        overflow-wrap: break-word;
    }

    .article-subtitle {
        font-size: 1.25rem;
        color: var(--text-muted);
        line-height: 1.6;
        font-weight: 400;
        margin-bottom: 2rem;
        word-wrap: break-word;
        overflow-wrap: break-word;
    }

    .article-meta {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1.5rem;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border-radius: 15px;
        margin-bottom: 2rem;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    .author-info {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .author-avatar {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--secondary-color) 0%, #1a2633 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 700;
        font-size: 1.2rem;
        flex-shrink: 0;
    }

    .author-details {
        display: flex;
        flex-direction: column;
    }

    .author-label {
        font-size: 0.75rem;
        color: var(--text-muted);
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .author-name {
        font-size: 1rem;
        font-weight: 600;
        color: var(--primary-color);
        margin: 0;
    }

    .share-button {
        padding: 0.75rem 1.5rem;
        border-radius: 50px;
        background-color: white;
        border: 2px solid var(--border-light);
        color: var(--primary-color);
        font-weight: 600;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        flex-shrink: 0;
    }

    .share-button:hover {
        background-color: var(--secondary-color);
        border-color: var(--secondary-color);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(39, 57, 74, 0.3);
    }

    .share-button img {
        width: 20px;
        height: 20px;
        transition: transform 0.3s ease;
    }

    .share-button:hover img {
        transform: rotate(360deg);
        filter: brightness(0) invert(1);
    }

    .article-image {
        width: 100%;
        height: auto;
        max-height: 500px;
        object-fit: cover;
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
        margin-bottom: 3rem;
    }

    .article-content {
        font-size: 1.1rem;
        line-height: 1.8;
        color: #333;
        margin-bottom: 3rem;
        word-wrap: break-word;
        overflow-wrap: break-word;
        word-break: break-word;
    }

    .article-content p {
        margin-bottom: 1.5rem;
        text-align: justify;
        word-wrap: break-word;
        overflow-wrap: break-word;
        word-break: break-word;
        max-width: 100%;
    }

    .comments-section {
        max-width: 900px;
        margin: 0 auto;
        padding: 3rem 1rem;
        border-top: 2px solid var(--border-light);
        overflow-x: hidden;
    }

    .comments-header {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-bottom: 2rem;
    }

    .comments-title {
        font-size: 1.75rem;
        font-weight: 700;
        color: var(--primary-color);
        margin: 0;
    }

    .comments-count {
        background-color: var(--secondary-color);
        color: white;
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.9rem;
        font-weight: 600;
    }

    .comment-form {
        background: white;
        padding: 2rem;
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        margin-bottom: 2rem;
    }

    .comment-form textarea {
        border: 2px solid var(--border-light);
        border-radius: 12px;
        padding: 1rem;
        font-size: 1rem;
        transition: all 0.3s ease;
        resize: vertical;
        width: 100%;
    }

    .comment-form textarea:focus {
        border-color: var(--secondary-color);
        box-shadow: 0 0 0 3px rgba(39, 57, 74, 0.1);
        outline: none;
    }

    .btn-submit-comment {
        padding: 0.75rem 2rem;
        border-radius: 50px;
        background: linear-gradient(135deg, var(--secondary-color) 0%, #1a2633 100%);
        color: white;
        border: none;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(39, 57, 74, 0.3);
    }

    .btn-submit-comment:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(39, 57, 74, 0.4);
    }

    .comment-item {
        background: white;
        padding: 1.5rem;
        border-radius: 15px;
        margin-bottom: 1rem;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
        border-left: 4px solid transparent;
        overflow-x: hidden;
    }

    .comment-item:hover {
        border-left-color: var(--secondary-color);
        transform: translateX(5px);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .comment-header {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1rem;
    }

    .comment-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--secondary-color) 0%, #1a2633 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 700;
        font-size: 1rem;
        flex-shrink: 0;
    }

    .comment-author {
        font-size: 1rem;
        font-weight: 600;
        color: var(--primary-color);
        margin: 0;
    }

    .comment-text {
        font-size: 1rem;
        line-height: 1.6;
        color: #555;
        margin-bottom: 1rem;
        word-wrap: break-word;
        overflow-wrap: break-word;
        word-break: break-word;
        max-width: 100%;
    }

    .btn-delete-comment {
        padding: 0.4rem 1rem;
        border-radius: 20px;
        background-color: transparent;
        border: 2px solid var(--secondary-color);
        color: var(--secondary-color);
        font-size: 0.85rem;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-delete-comment:hover {
        background-color: var(--secondary-color);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(39, 57, 74, 0.3);
    }

    .empty-comments {
        text-align: center;
        padding: 3rem;
        color: var(--text-muted);
    }

    .empty-comments-icon {
        font-size: 4rem;
        margin-bottom: 1rem;
        opacity: 0.3;
    }

    .empty-comments-text {
        font-size: 1.1rem;
        font-weight: 500;
    }

    @media (max-width: 768px) {
        .article-title {
            font-size: 1.75rem;
        }

        .article-subtitle {
            font-size: 1rem;
        }

        .article-meta {
            flex-direction: column;
            gap: 1rem;
        }

        .article-content {
            font-size: 1rem;
        }

        .comments-title {
            font-size: 1.5rem;
        }
    }
</style>
@endpush

@section('content')
<div class="article-container">
    <article class="article-header">
        <h1 class="article-title">{{ $berita->judul }}</h1>
        <p class="article-subtitle">{{ $berita->sub_judul }}</p>

        <div class="article-meta">
            <div class="author-info">
                <div class="author-avatar">
                    {{ strtoupper(substr($berita->pengguna->nama ?? 'Admin', 0, 1)) }}
                </div>
                <div class="author-details">
                    <span class="author-label">Ditulis oleh</span>
                    <p class="author-name">{{ $berita->pengguna->nama ?? 'Admin' }}</p>
                </div>
            </div>

            <button onclick="copyLink('{{ url()->current() }}')" class="share-button">
                <img src="{{ asset('static/bagikan.png') }}" alt="Bagikan">
                <span>Bagikan</span>
            </button>
        </div>
    </article>

    <img src="{{ asset($berita->gambar) }}" alt="{{ $berita->judul }}" class="article-image">

    <div class="article-content">
        @foreach (explode("\n", $berita->isi) as $paragraf)
            @if (trim($paragraf) !== '')
                <p>{{ $paragraf }}</p>
            @endif
        @endforeach
    </div>
</div>

<div class="comments-section">
    <div class="comments-header">
        <h2 class="comments-title">💬 Komentar</h2>
        <span class="comments-count">{{ $berita->komentar->count() }}</span>
    </div>

    <div class="comment-form">
        <form action="{{ route('komentar.store', ['id' => $berita->id_berita]) }}" method="POST">
            @csrf
            <input type="hidden" name="id_berita" value="{{ $berita->id_berita }}">
            <div class="mb-3">
                <textarea name="isi" class="form-control" rows="4" placeholder="Tulis komentar Anda di sini..." required></textarea>
            </div>
            <button type="submit" class="btn btn-submit-comment">📤 Kirim Komentar</button>
        </form>
    </div>

    <div class="comments-list">
        @forelse ($berita->komentar as $komentar)
            <div class="comment-item">
                <div class="comment-header">
                    <div class="comment-avatar">
                        {{ strtoupper(substr($komentar->pengguna->nama ?? 'Anonim', 0, 1)) }}
                    </div>
                    <p class="comment-author">{{ $komentar->pengguna->nama ?? 'Anonim' }}</p>
                </div>
                <p class="comment-text">{{ $komentar->isi }}</p>
                @auth
                    @if (auth()->user()->getKey() == $komentar->id_pengguna)
                        <form action="{{ route('komentar.destroy', $komentar->id_komentar) }}" method="POST" class="form-hapus-komentar">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete-comment">🗑️ Hapus</button>
                        </form>
                    @endif
                @endauth
            </div>
        @empty
            <div class="empty-comments">
                <div class="empty-comments-icon">💬</div>
                <p class="empty-comments-text">Belum ada komentar. Jadilah yang pertama berkomentar!</p>
            </div>
        @endforelse
    </div>
</div>

@push('scripts')
<script>
    function copyLink(link) {
        navigator.clipboard.writeText(link).then(function() {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: 'Link berita telah disalin ke clipboard',
                timer: 2000,
                showConfirmButton: false
            });
        }).catch(function(err) {
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: 'Gagal menyalin link',
                timer: 2000,
                showConfirmButton: false
            });
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        const forms = document.querySelectorAll('.form-hapus-komentar');

        forms.forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();

                Swal.fire({
                    title: 'Yakin ingin menghapus komentar?',
                    text: "Tindakan ini tidak bisa dibatalkan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#27394a',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    });
</script>
@endpush
@endsection
