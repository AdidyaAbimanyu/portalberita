@extends('layouts.app')

@section('title', 'Dashboard Admin')

@push('styles')
<style>
    :root {
        --primary-color: #2C3E50;
        --secondary-color: #E74C3C;
        --success-color: #27AE60;
        --info-color: #3498DB;
        --text-muted: #6C757D;
        --border-light: #E9ECEF;
    }

    .dashboard-container {
        padding: 2rem;
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        min-height: calc(100vh - 80px);
    }

    .dashboard-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
        padding: 1.5rem;
        background: white;
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .dashboard-title {
        font-size: 2rem;
        font-weight: 700;
        color: var(--primary-color);
        margin: 0;
    }

    .btn-add-news {
        padding: 0.75rem 2rem;
        border-radius: 50px;
        background: linear-gradient(135deg, var(--secondary-color) 0%, #c0392b 100%);
        color: white;
        border: none;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(231, 76, 60, 0.3);
    }

    .btn-add-news:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(231, 76, 60, 0.4);
        color: white;
    }

    .stats-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .stat-card {
        background: white;
        border-radius: 15px;
        padding: 1.5rem;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        border-left: 4px solid;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }

    .stat-card.total {
        border-left-color: var(--info-color);
    }

    .stat-card.published {
        border-left-color: var(--success-color);
    }

    .stat-icon {
        font-size: 2.5rem;
        margin-bottom: 0.5rem;
    }

    .stat-value {
        font-size: 2rem;
        font-weight: 700;
        color: var(--primary-color);
        margin: 0;
    }

    .stat-label {
        font-size: 0.9rem;
        color: var(--text-muted);
        text-transform: uppercase;
        letter-spacing: 1px;
        margin: 0;
    }

    .table-card {
        background: white;
        border-radius: 15px;
        padding: 2rem;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .table-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
    }

    .table-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--primary-color);
        margin: 0;
    }

    .search-box {
        position: relative;
        width: 300px;
    }

    .search-box input {
        width: 100%;
        padding: 0.75rem 1rem 0.75rem 3rem;
        border: 2px solid var(--border-light);
        border-radius: 50px;
        transition: all 0.3s ease;
    }

    .search-box input:focus {
        border-color: var(--secondary-color);
        box-shadow: 0 0 0 3px rgba(231, 76, 60, 0.1);
        outline: none;
    }

    .search-box::before {
        content: '🔍';
        position: absolute;
        left: 1rem;
        top: 50%;
        transform: translateY(-50%);
        font-size: 1.2rem;
    }

    .modern-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
    }

    .modern-table thead th {
        background: linear-gradient(135deg, var(--primary-color) 0%, #34495e 100%);
        color: white;
        padding: 1rem;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 0.5px;
        border: none;
    }

    .modern-table thead th:first-child {
        border-top-left-radius: 10px;
    }

    .modern-table thead th:last-child {
        border-top-right-radius: 10px;
    }

    .modern-table tbody tr {
        transition: all 0.3s ease;
        border-bottom: 1px solid var(--border-light);
    }

    .modern-table tbody tr:hover {
        background-color: #f8f9fa;
        transform: scale(1.01);
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    .modern-table tbody td {
        padding: 1rem;
        vertical-align: middle;
    }

    .news-thumbnail {
        width: 120px;
        height: 80px;
        object-fit: cover;
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .news-thumbnail:hover {
        transform: scale(1.1);
    }

    .news-title {
        font-weight: 600;
        color: var(--primary-color);
        margin-bottom: 0.25rem;
    }

    .category-badge {
        display: inline-block;
        padding: 0.35rem 0.75rem;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .category-badge.bisnis {
        background-color: #e3f2fd;
        color: #1976d2;
    }

    .category-badge.teknologi {
        background-color: #f3e5f5;
        color: #7b1fa2;
    }

    .category-badge.olahraga {
        background-color: #e8f5e9;
        color: #388e3c;
    }

    .category-badge.politik {
        background-color: #fff3e0;
        color: #f57c00;
    }

    .category-badge.gaya-hidup {
        background-color: #fce4ec;
        color: #c2185b;
    }

    .action-buttons {
        display: flex;
        gap: 0.5rem;
    }

    .btn-action {
        padding: 0.5rem 1rem;
        border-radius: 8px;
        font-weight: 600;
        font-size: 0.85rem;
        transition: all 0.3s ease;
        border: none;
    }

    .btn-edit {
        background-color: var(--info-color);
        color: white;
    }

    .btn-edit:hover {
        background-color: #2980b9;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(52, 152, 219, 0.3);
    }

    .btn-delete {
        background-color: var(--secondary-color);
        color: white;
    }

    .btn-delete:hover {
        background-color: #c0392b;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(231, 76, 60, 0.3);
    }

    .empty-state {
        text-align: center;
        padding: 3rem;
        color: var(--text-muted);
    }

    .empty-state-icon {
        font-size: 4rem;
        margin-bottom: 1rem;
        opacity: 0.3;
    }

    .empty-state-text {
        font-size: 1.2rem;
        font-weight: 600;
    }

    @media (max-width: 768px) {
        .dashboard-header {
            flex-direction: column;
            gap: 1rem;
        }

        .search-box {
            width: 100%;
        }

        .table-header {
            flex-direction: column;
            gap: 1rem;
        }

        .stats-container {
            grid-template-columns: 1fr;
        }
    }
</style>
@endpush

@section('content')
<div class="dashboard-container">
    <div class="dashboard-header">
        <h1 class="dashboard-title">📰 Dashboard Admin</h1>
        <a href="{{ route('form') }}" class="btn btn-add-news">
            ➕ Tambah Berita Baru
        </a>
    </div>

    <div class="stats-container">
        <div class="stat-card total">
            <div class="stat-icon">📊</div>
            <p class="stat-value">{{ $beritas->count() }}</p>
            <p class="stat-label">Total Berita</p>
        </div>
        <div class="stat-card published">
            <div class="stat-icon">✅</div>
            <p class="stat-value">{{ $beritas->count() }}</p>
            <p class="stat-label">Dipublikasi</p>
        </div>
    </div>

    <div class="table-card">
        <div class="table-header">
            <h2 class="table-title">Daftar Berita</h2>
            <div class="search-box">
                <input type="text" id="searchInput" placeholder="Cari berita...">
            </div>
        </div>

        <div class="table-responsive">
            <table class="modern-table">
                <thead>
                    <tr>
                        <th>Gambar</th>
                        <th>Judul</th>
                        <th>Sub Judul</th>
                        <th>Isi</th>
                        <th>Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="newsTableBody">
                    @forelse ($beritas as $berita)
                        <tr>
                            <td>
                                <img src="{{ asset($berita->gambar) }}" alt="Thumbnail" class="news-thumbnail">
                            </td>
                            <td>
                                <div class="news-title">{{ Str::limit($berita->judul, 50) }}</div>
                            </td>
                            <td>{{ Str::limit($berita->sub_judul, 50) }}</td>
                            <td>{{ Str::limit($berita->isi, 50) }}</td>
                            <td>
                                <span class="category-badge {{ strtolower(str_replace(' ', '-', $berita->kategori)) }}">
                                    {{ $berita->kategori }}
                                </span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('berita.edit', $berita->id_berita) }}" class="btn-action btn-edit">
                                        ✏️ Edit
                                    </a>
                                    <form action="{{ route('berita.destroy', $berita->id_berita) }}" method="POST" class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-action btn-delete">🗑️ Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">
                                <div class="empty-state">
                                    <div class="empty-state-icon">📭</div>
                                    <p class="empty-state-text">Belum ada berita yang tersedia</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteForms = document.querySelectorAll('.delete-form');
        const searchInput = document.getElementById('searchInput');
        const tableBody = document.getElementById('newsTableBody');

        deleteForms.forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();

                Swal.fire({
                    title: 'Yakin ingin menghapus?',
                    text: "Data yang dihapus tidak bisa dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#E74C3C',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal',
                    customClass: {
                        popup: 'animated fadeInDown'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });

        if (searchInput && tableBody) {
            searchInput.addEventListener('keyup', function() {
                const filter = this.value.toLowerCase();
                const rows = tableBody.getElementsByTagName('tr');

                Array.from(rows).forEach(row => {
                    const text = row.textContent.toLowerCase();
                    row.style.display = text.includes(filter) ? '' : 'none';
                });
            });
        }
    });
</script>
@endpush
@endsection
