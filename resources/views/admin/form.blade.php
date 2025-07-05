@extends('layouts.app')

@section('title', 'Form Berita')

@push('styles')
    <style>
        .card {
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            border: 1px solid rgba(0, 0, 0, 0.125);
        }

        .card-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid rgba(0, 0, 0, 0.125);
        }

        .form-label {
            font-weight: 500;
            color: #333;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #80bdff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }
    </style>
@endpush

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Judul Field -->
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul"
                            name="judul" value="{{ old('judul') }}" placeholder="Masukkan judul">
                        @error('judul')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Sub Judul Field -->
                    <div class="mb-3">
                        <label for="sub_judul" class="form-label">Sub Judul</label>
                        <input type="text" class="form-control @error('sub_judul') is-invalid @enderror" id="sub_judul"
                            name="sub_judul" value="{{ old('sub_judul') }}" placeholder="Masukkan sub judul">
                        @error('sub_judul')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Isi Field -->
                    <div class="mb-3">
                        <label for="isi" class="form-label">Isi</label>
                        <textarea class="form-control @error('isi') is-invalid @enderror" id="isi" name="isi" rows="6"
                            placeholder="Masukkan isi konten">{{ old('isi') }}</textarea>
                        @error('isi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Gambar Field -->
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar</label>
                        <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar"
                            name="gambar">
                        @error('gambar')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Kategori Field -->
                    <div class="mb-3">
                        <label for="kategori" class="form-label">Kategori</label>
                        <select class="form-select" id="kategori" name="kategori">
                            <option value="">Pilih kategori</option>
                            @php
                                $categories = [
                                    'Bisnis',
                                    'Pasar',
                                    'Teknologi',
                                    'Gaya Hidup',
                                    'Politik',
                                    'Olahraga',
                                    'Pendidikan',
                                    'Budaya',
                                ];
                            @endphp
                            @foreach ($categories as $category)
                                <option value="{{ $category }}" {{ old('kategori') == $category ? 'selected' : '' }}>
                                    {{ $category }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3 justify-content-center" type="submit">
                        <a href="#" class="btn btn-outline-dark">Submit</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
