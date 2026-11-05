@php
    $navigationCategories = ['Bisnis', 'Pasar', 'Teknologi', 'Gaya Hidup', 'Politik', 'Olahraga', 'Pendidikan', 'Budaya'];
@endphp

<header class="site-header">
    <div class="masthead">
        <a class="wordmark" href="{{ route('home') }}" aria-label="WiNews, beranda">WiNews<span class="wordmark__period">.</span></a>
        <p class="masthead__note">Berita, dengan sudut pandang.</p>
        <div class="masthead__actions">
            <a class="header-link header-link--search" href="{{ route('cari') }}">Cari berita</a>
            @auth
                @if (Auth::user()->role === 'admin')
                    <a class="header-link header-link--account" href="{{ route('dashboard') }}">Dashboard</a>
                @endif
                <form action="{{ route('logout') }}" method="POST" class="header-logout">
                    @csrf
                    <button class="header-link" type="submit">Keluar</button>
                </form>
            @else
                <a class="header-link header-link--account" href="{{ route('ShowLogin') }}">Masuk</a>
            @endauth
            <button class="theme-toggle header-link" type="button" aria-label="Toggle dark theme" aria-pressed="false">
                <span class="theme-toggle__icon" aria-hidden="true">◐</span>
            </button>
            <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="section-navigation">
                <span class="menu-toggle__lines" aria-hidden="true"></span>
                <span class="menu-toggle__label">Rubrik</span>
            </button>
        </div>
    </div>

    <nav class="section-nav" id="section-navigation" aria-label="Rubrik berita">
        <a class="section-nav__home" href="{{ route('home') }}">Beranda</a>
        <a href="{{ route('cari') }}">Terbaru</a>
        @foreach ($navigationCategories as $category)
            <a href="{{ route('cari', ['query' => $category]) }}">{{ $category }}</a>
        @endforeach
        @auth
            @if (Auth::user()->role === 'admin')
                <a class="section-nav__admin" href="{{ route('dashboard') }}">Dashboard redaksi</a>
            @endif
        @endauth
    </nav>
</header>
