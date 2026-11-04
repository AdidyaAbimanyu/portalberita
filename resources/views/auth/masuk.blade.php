@extends('layouts.app')

@section('title', 'Masuk | WiNews')

@section('content')
    <section class="auth-page" aria-labelledby="auth-title">
        <div class="auth-panel">
            <p class="eyebrow">Akun WiNews</p>
            <h1 id="auth-title">Masuk</h1>
            <p class="auth-panel__intro">
                Belum punya akun? <a href="{{ route('ShowRegis') }}">Daftar di sini</a>
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

            <form action="{{ route('login') }}" method="POST" class="auth-form">
                @csrf
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

                <div class="mb-4">
                    <label for="password">Kata sandi</label>
                    <input
                        type="password"
                        class="form-control @error('password') is-invalid @enderror"
                        id="password"
                        name="password"
                        autocomplete="current-password"
                        required
                    >
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="editorial-button">Masuk</button>
            </form>
        </div>
    </section>
@endsection
