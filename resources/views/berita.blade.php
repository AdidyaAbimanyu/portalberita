@extends('layouts.app')

@section('title', 'Detail Berita')

@section('content')
    <div class="container py-4">
        <!-- Judul Besar -->
        <h4 class="fw-bold mb-2">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
        </h4>

        <!-- Deskripsi Ringkas -->
        <p class="text-muted">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
        </p>

        <!-- Info Penulis -->
        <p class="fw-medium mb-4">Ditulis oleh Lorem Ipsum</p>

        <!-- Gambar Konten -->
        <img src="{{ asset('static/dummy.png') }}" alt="Gambar Artikel" class="img-fluid mb-4">

        <!-- Isi Artikel -->
        <p>
            Lorem ipsum dolor sit amet consectetur adipiscing elit. Semper vel class aptent taciti sociosqu ad litora.
            Blandit quis suspendisse aliquet nisi sodales consequat magna. Cras euismod turpis fames gravida vulputate
            amet sapien. Sit placerat in iaculis eu pretium tellus. Orci varius torquent conubia et magna sagittis
            parturient. Ebitundis facilisis dapibus etiam interdum tortor ligula congue. Posui libero feugiat tristique
            accumsan maximus posuere varius. Sed diam urna tempor pharetra vivamus fringilla lacus. Eros lobortis nulla
            sodales mattis scelerisque maximus eget. Porta elementum a enim euismod quam luctus lectus.
        </p>

        <p>
            Curabitur posuere nulla ornare ex bibendum rutrum. Nisi malesuada lectus integer mauris posuere et hendrerit.
            Efficitur lorem mauris pharetra vestibulum fusce dictum risus. Imperdiet nullam nullam vulputate porttitor
            ullamcorper vivamus gravida purus gravida. Adipiscing elit quisque faucibus ex sapien vitae pellentesque.
            At lacinia torquent per conubia nostra inceptos himenaeos.
        </p>

        <p>
            Consequat magna ante condimentum augue ut luctus nibh. Ornare sagittis vehicula praesent sed felis venenatis
            ultrices. Pretium tellus dui class convallis tempus leo eget arcu. Dis parturient sociosqu nascetur ridiculus
            mus conubia molestie. Ligula conubia nec ante litora suspendisse penatibus netus. Netus ultricies habitant
            morbi senectus metus suscipit auctor. Fringilla lacus massa vehicula egestas lacus massa. Massa neque est
            fermentum odio phasellus lorem ipsum erat justo accumsan eu augue arcu dignissim velit aliquam. Platea
            dictumst lorem pen ae dolor sit amet consectetur.
        </p>

        <p>
            Ut hendrerit semper vel class aptent taciti sociosqu. Dictum class blandit quis suspendisse euismod amet magna
            gravida arcu erat eleifend purus tempus. Vestibulum vitae vivamus potenti ultrices habitant morbi senectus
            netus.
            Pulvinar vivamus fringilla lacus nec metus bibendum egestas.
        </p>
    </div>

    <!-- Section Komentar -->
    <div class="container pb-5">
        <h6 class="fw-bold mb-3">Komentar</h6>

        @for ($i = 0; $i < 4; $i++)
            <div class="p-3 mb-3" style="background-color: #f2eee9; border-radius: 15px;">
                <p class="fw-bold mb-1">Pengguna</p>
                <p class="mb-0">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                </p>
            </div>
        @endfor

        <a href="#" class="fw-bold text-decoration-none" style="color: #7686A3">Tampilkan lebih banyak</a>
    </div>

@endsection
