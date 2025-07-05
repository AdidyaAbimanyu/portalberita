<nav class="navbar navbar-expand-lg px-5 fixed-top" style="background-color: #F3F1ED; border-bottom: 1px solid #ddd; height: 105px;">
    <div class="container-fluid d-flex justify-content-between align-items-center px-5 h-100">

        <!-- Kiri: Logo -->
        <div class="d-flex align-items-center">
            <img class="navbar-brand fw-bold m-0" href="#" src="{{ asset('static/logo.png') }}" alt="Logo" style="height: 105px;">
        </div>

        <!-- Tengah Kiri: Icon Search + "Cari" -->
        <div class="d-flex align-items-center gap-2">
            <img src="{{ asset('static/search.svg') }}" alt="">
            <p class="mt-3" style="font-size: 16px">Cari</p>
        </div>

        <!-- Tengah Tengah: Judul Besar -->
        <div class="dflex justify-content-center align-items-center">
            <span class="fw-bold" style="font-size: 48px">WiNews</span>
        </div>

        <!-- Kanan: Icon User -->
        <div class="d-flex align-items-center">
            <a href="#"><img src="{{ asset('static/user.svg') }}" alt=""></i></a>
        </div>

    </div>
</nav>
