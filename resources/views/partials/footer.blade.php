<footer class="site-footer">
    <div class="site-footer__inner">
        <div>
            <a class="wordmark wordmark--footer" href="{{ route('home') }}">WiNews<span class="wordmark__period">.</span></a>
            <p class="site-footer__description">Membaca lebih dekat apa yang sedang terjadi.</p>
        </div>
        <nav class="footer-nav" aria-label="Navigasi footer">
            <a href="{{ route('home') }}">Beranda</a>
            <a href="{{ route('cari') }}">Cari berita</a>
            @guest
                <a href="{{ route('ShowLogin') }}">Masuk</a>
            @endguest
        </nav>
        <p class="site-footer__copyright">&copy; {{ date('Y') }} WiNews</p>
    </div>
</footer>
