@extends('layouts.app')

@section('title', $berita->judul)

@section('content')
    <div class="container py-4">
        <!-- Judul Berita -->
        <h4 class="fw-bold mb-2">
            {{ $berita->judul }}
        </h4>

        <!-- Subjudul -->
        <p class="text-muted">
            {{ $berita->sub_judul }}
        </p>

        <!-- Info Penulis dan Icon Bagikan -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <p class="fw-medium mb-0">Ditulis oleh <strong>{{ $berita->pengguna->nama ?? 'Admin' }}</strong></p>
            <div class="pe-5">
                <button onclick="copyLink('{{ url()->current() }}')" class="btn btn-sm btn-light">
                    <img src="{{ asset('static/bagikan.png') }}" alt="Bagikan" width="18" height="18">
                </button>
            </div>
        </div>

        <!-- Gambar Artikel -->
        <img src="{{ asset($berita->gambar) }}" alt="Gambar Artikel" class="img-fluid mb-4 rounded">

        <!-- Isi Artikel -->
        <div class="mb-4" style="text-align: justify; word-break: break-word;">
            @foreach (explode("\n", $berita->isi) as $paragraf)
                @if (trim($paragraf) !== '')
                    <p>{{ $paragraf }}</p>
                @endif
            @endforeach
        </div>
    </div>

    <!-- Komentar -->
    <div class="container pb-5">
        <h6 class="fw-bold mb-3">Komentar ({{ $berita->komentar->count() }})</h6>

        <!-- Form Tambah Komentar -->
        <form action="{{ route('komentar.store', ['id' => $berita->id_berita]) }}" method="POST" class="mb-4">
            @csrf
            <input type="hidden" name="id_berita" value="{{ $berita->id_berita }}">
            <div class="mb-3">
                <textarea name="isi" class="form-control" rows="3" placeholder="Tulis komentar anda..." required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Kirim Komentar</button>
        </form>

        <!-- List Komentar -->
        @forelse ($berita->komentar->take(5) as $komentar)
            <div class="p-3 mb-3 bg-light rounded">
                <p class="fw-bold mb-1">{{ $komentar->pengguna->nama ?? 'Anonim' }}</p>
                <p class="mb-2">{{ $komentar->isi }}</p>
                <p class="text-muted">
                    Komentar oleh ID {{ $komentar->id_pengguna }} |
                    Anda ID: {{ auth()->check() ? auth()->user()->getKey() : 'Tidak login' }}
                </p>

                @auth
                    @if (auth()->user()->getKey() == $komentar->id_pengguna)
                        <form id="form-hapus-{{ $komentar->id_komentar }}"
                            action="{{ route('komentar.destroy', $komentar->id_komentar) }}" method="POST"
                            class="form-hapus-komentar d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" data-id="{{ $komentar->id_komentar }}">
                                Hapus
                            </button>
                        </form>
                    @endif
                @endauth
            </div>
        @empty
            <p class="text-muted">Belum ada komentar.</p>
        @endforelse
    </div>

    @stack('scripts')
    <!-- JS untuk Copy Link -->
    <script>
        function copyLink(link) {
            navigator.clipboard.writeText(link).then(function() {
                alert("Link berita disalin!");
            }).catch(function(err) {
                alert("Gagal menyalin link");
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            const forms = document.querySelectorAll('.form-hapus-komentar');

            forms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault(); // Cegah langsung submit

                    Swal.fire({
                        title: 'Yakin ingin menghapus komentar?',
                        text: "Tindakan ini tidak bisa dibatalkan!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit(); // Submit form jika dikonfirmasi
                        }
                    });
                });
            });
        });
    </script>
@endsection
