@extends('layouts.app')

@section('title', 'Masuk')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <!-- Judul -->
                <h3 class="fw-bold">Masuk</h3>
                <p>Belum punya akun? <a href="#" class="text-primary text-decoration-none">Daftar Disini</a></p>

                <!-- Form -->
                <form action="#" method="POST">
                    @csrf
                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                    </div>

                    <!-- Kata Sandi -->
                    <div class="mb-4">
                        <label for="password" class="form-label">Kata Sandi</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Kata Sandi">
                    </div>

                    <!-- Tombol -->
                    <button type="submit" class="btn w-100 fw-bold text-white" style="background-color: #2a3b47;">
                        Masuk
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
