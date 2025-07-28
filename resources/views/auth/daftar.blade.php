@extends('layouts.app')

@section('title', 'Daftar')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <!-- Judul -->
                <h3 class="fw-bold">Daftar</h3>
                <p>Sudah punya akun? <a href="{{ route('ShowLogin') }}" class="text-primary text-decoration-none">Masuk
                        Disini</a></p>

                <!-- Form -->
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <!-- Nama -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap">
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                    </div>

                    <!-- Role -->
                    <div class="mb-3">
                        <label for="role" class="form-label">Pilih Role</label>
                        <select class="form-select" id="role" name="role" required>
                            <option value="" disabled selected>Pilih role Anda</option>
                            <option value="admin">Admin</option>
                            <option value="pembaca">Pembaca</option>
                        </select>
                    </div>

                    <!-- Kata Sandi -->
                    <div class="mb-4">
                        <label for="password" class="form-label">Kata Sandi</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Kata Sandi">
                    </div>

                    <!-- Konfirmasi Kata Sandi -->
                    <div class="mb-4">
                        <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                            placeholder="Konfirmasi Kata Sandi">
                    </div>

                    <!-- Tombol -->
                    <button type="submit" class="btn w-100 fw-bold text-white" style="background-color: #2a3b47;">
                        Daftar
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
