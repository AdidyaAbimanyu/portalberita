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

        <!-- Info Penulis -->
        <p class="fw-medium mb-4">Ditulis oleh <strong>{{ $berita->pengguna->nama ?? 'Admin' }}</strong></p>

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

                @auth
                    @if (auth()->user()->id === $komentar->id_pengguna)
                        <form action="{{ route('komentar.destroy', $komentar->id_komentar) }}" method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus komentar ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    @endif
                @endauth
            </div>
        @empty
            <p class="text-muted">Belum ada komentar.</p>
        @endforelse
    </div>
@endsection
