@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
    <div class="container py-4">
        <!-- Tombol Tambahkan Berita -->
        <div class="mb-3">
            <a href="{{ route('form') }}" class="btn btn-outline-dark">
                Tambahkan Berita <span class="fw-bold">+</span>
            </a>
        </div>

        <!-- Tabel Berita -->
        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead style="background-color: #F3F1ED;">
                    <tr>
                        <th scope="col">Gambar</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Sub Judul</th>
                        <th scope="col">Isi</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($beritas as $berita)
                        <tr>
                            <td style="width: 150px;">
                                <img src="{{ asset($berita->gambar) }}" alt="Thumbnail" class="img-fluid">
                            </td>
                            <td>{{ $berita->judul }}</td>
                            <td>{{ $berita->sub_judul }}</td>
                            <td>{{ Str::limit($berita->isi, 50) }}</td>
                            <td>{{ $berita->kategori }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('berita.edit', $berita->id_berita) }}"
                                        class="btn btn-outline-dark btn-sm">Edit</a>
                                    <form action="{{ route('berita.destroy', $berita->id_berita) }}" method="POST"
                                        class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Belum ada berita yang tersedia.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const deleteForms = document.querySelectorAll('.delete-form');

                deleteForms.forEach(form => {
                    form.addEventListener('submit', function(e) {
                        e.preventDefault(); // Mencegah submit default form

                        Swal.fire({
                            title: 'Yakin ingin menghapus?',
                            text: "Data yang dihapus tidak bisa dikembalikan!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#d33',
                            cancelButtonColor: '#6c757d',
                            confirmButtonText: 'Ya, hapus!',
                            cancelButtonText: 'Batal'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                form.submit(); // Kirim form jika konfirmasi
                            }
                        });
                    });
                });
            });
        </script>
    @endpush

@endsection
