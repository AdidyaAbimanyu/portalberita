@extends('layouts.app')

@section('title', 'Daftar | WiNews')

@section('content')
    <section class="auth-page" aria-labelledby="auth-title">
        <div class="auth-panel">
            <p class="eyebrow">Bergabung dengan WiNews</p>
            <h1 id="auth-title">Buat akun</h1>
            <p class="auth-panel__intro">
                Sudah punya akun? <a href="{{ route('ShowLogin') }}">Masuk di sini</a>
            </p>

            @if ($errors->any())
                <div class="auth-errors" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('register') }}" method="POST" class="auth-form">
                @csrf
                <div class="mb-3">
                    <label for="name">Nama lengkap</label>
                    <input
                        type="text"
                        class="form-control @error('name') is-invalid @enderror"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        autocomplete="name"
                        required
                    >
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email">Email</label>
                    <input
                        type="email"
                        class="form-control @error('email') is-invalid @enderror"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        autocomplete="email"
                        required
                    >
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="role">Peran</label>
                    <select class="form-select @error('role') is-invalid @enderror" id="role" name="role" required>
                        <option value="" disabled @selected(old('role') === null)>Pilih peran</option>
                        <option value="pembaca" @selected(old('role') === 'pembaca')>Pembaca</option>
                        <option value="admin" @selected(old('role') === 'admin')>Admin</option>
                    </select>
                    @error('role')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password">Kata sandi</label>
                    <input
                        type="password"
                        class="form-control @error('password') is-invalid @enderror"
                        id="password"
                        name="password"
                        autocomplete="new-password"
                        required
                    >
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password_confirmation">Konfirmasi kata sandi</label>
                    <input
                        type="password"
                        class="form-control"
                        id="password_confirmation"
                        name="password_confirmation"
                        autocomplete="new-password"
                        required
                    >
                </div>

                <button type="submit" class="editorial-button">Daftar</button>
            </form>
        </div>
    </section>
@endsection
