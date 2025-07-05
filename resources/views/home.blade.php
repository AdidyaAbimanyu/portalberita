@extends('layouts.app')

@section('title', 'Home')

@push('styles')
<style>
    .nav-link:hover {
        text-decoration: underline;
    }
</style>
@endpush

@section('content')
    <!-- Menu Bar -->
    <div class="container">
        <ul class="nav justify-content-center align-items-center text-center">
            <li class="nav-item"><a class="nav-link text-dark fw-bold" href="#">Home</a></li>
            <li class="nav-item"><a class="nav-link text-dark fw-bold" href="#">Terbaru</a></li>
            <li class="nav-item"><a class="nav-link text-dark fw-bold" href="#">Bisnis</a></li>
            <li class="nav-item"><a class="nav-link text-dark fw-bold" href="#">Pasar</a></li>
            <li class="nav-item"><a class="nav-link text-dark fw-bold" href="#">Teknologi</a></li>
            <li class="nav-item"><a class="nav-link text-dark fw-bold" href="#">Gaya Hidup</a></li>
            <li class="nav-item"><a class="nav-link text-dark fw-bold" href="#">Politik</a></li>
            <li class="nav-item"><a class="nav-link text-dark fw-bold" href="#">Olahraga</a></li>
            <li class="nav-item"><a class="nav-link text-dark fw-bold" href="#">Pendidikan</a></li>
            <li class="nav-item"><a class="nav-link text-dark fw-bold" href="#">Budaya</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="container pt-3">
        <div class="row">
            <div class="col-12 justify-content-center align-items-center text-center">
                <img src="{{ asset('static/dummy.png') }}" alt="Thumbnail" style="width: 290px; height: 145px; object-fit: cover;">

                <h5 class="fw-bold">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                </h5>

                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                </p>
            </div>
        </div>
    </div>

    <!-- Section Berita Terbaru + Daftar -->
    <div class="container pb-4">
        <div class="row border-top pt-4">
            <!-- Kolom Terbaru -->
            <div class="col-md-4 border-end pe-4">
                <h5 class="fw-bold mb-3">Terbaru</h5>

                @for ($i = 0; $i < 5; $i++)
                    <div class="mb-3">
                        <p class="mb-1 fw-medium">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </p>
                        <small class="text-muted">1 jam yang lalu</small>
                    </div>
                @endfor
            </div>

            <!-- Kolom List Berita -->
            <div class="col-md-8 ps-md-4">
                @for ($i = 0; $i < 4; $i++)
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <img src="{{ asset('static/dummy.png') }}" alt="Thumbnail" class="img-fluid">
                        </div>
                        <div class="col-md-8">
                            <h6 class="fw-bold">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            </h6>
                            <p class="mb-0">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            </p>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>

    <!-- Section 4 Kolom Kategori 1 -->
    <div class="container py-4">
        <div class="row border-top pt-4">
            <!-- Kolom Kategori -->
            @php
                $categories = ['Bisnis', 'Pasar', 'Teknologi', 'Gaya Hidup'];
            @endphp

            @foreach ($categories as $category)
                <div class="col-md-3 border-end">
                    <h5 class="fw-bold mb-3">{{ $category }}</h5>

                    @for ($i = 0; $i < 5; $i++)
                        <div class="d-flex align-items-center mb-5">
                            <img src="{{ asset('static/dummy.png') }}" alt="Thumbnail" class="me-2"
                                style="width: 110px; height: 55px; object-fit: cover;">
                            <p class="mb-0">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            </p>
                        </div>
                    @endfor

                    <a href="#" class="fw-bold text-decoration-underline" style="color: #7686A3">TAMPILKAN SEMUA</a>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Section 4 Kolom Kategori 2 -->
    <div class="container py-4">
        <div class="row border-top pt-4">
            <!-- Kolom Kategori -->
            @php
                $categories = ['Politik', 'Olahraga', 'Pendidikan', 'Budaya'];
            @endphp

            @foreach ($categories as $category)
                <div class="col-md-3 border-end">
                    <h5 class="fw-bold mb-3">{{ $category }}</h5>

                    @for ($i = 0; $i < 5; $i++)
                        <div class="d-flex align-items-center mb-5">
                            <img src="{{ asset('static/dummy.png') }}" alt="Thumbnail" class="me-2"
                                style="width: 110px; height: 55px; object-fit: cover;">
                            <p class="mb-0">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            </p>
                        </div>
                    @endfor

                    <a href="#" class="fw-bold text-decoration-underline" style="color: #7686A3">TAMPILKAN SEMUA</a>
                </div>
            @endforeach
        </div>
    </div>

@endsection
