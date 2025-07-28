<nav class="navbar navbar-expand-lg px-5 fixed-top"
    style="background-color: #F3F1ED; border-bottom: 1px solid #ddd; height: 105px;">
    <div class="container-fluid d-flex justify-content-between align-items-center px-5 h-100">

        <!-- Kiri: Logo -->
        <div class="d-flex align-items-center">
            <a href="{{ route('home') }}">
                <img class="navbar-brand fw-bold m-0" src="{{ asset('static/logo.png') }}" alt="Logo"
                    style="height: 105px;">
            </a>
        </div>

        <!-- Tengah Kiri: Icon Search + "Cari" -->
        <a href="{{ route('cari') }}" class="d-flex align-items-center gap-2 text-decoration-none text-dark">
            <img src="{{ asset('static/search.svg') }}" alt="">
            <p class="mt-3" style="font-size: 16px;">Cari</p>
        </a>

        <!-- Tengah Tengah: Judul Besar -->
        <div class="d-flex justify-content-center align-items-center">
            <a href="{{ route('home') }}" class="text-decoration-none"><span class="fw-bold text-dark"
                    style="font-size: 48px">WiNews</span></a>
        </div>

        <!-- Kanan -->
        <div>
            @if (Auth::check())
                <!-- Jika user sudah login, tampilkan icon user + dropdown -->
                <div class="dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('static/user.svg') }}" alt="">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        @if (Auth::user()->role == 'admin')
                            <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard Admin</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                        @endif
                        <li>
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            @else
                <!-- Jika belum login, tampilkan tombol login -->
                <a href="{{ route('ShowLogin') }}" class="btn btn-outline-dark">Login</a>
            @endif
        </div>
    </div>
</nav>
