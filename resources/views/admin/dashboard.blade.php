@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
    <div class="container py-4">
        <!-- Tombol Tambahkan Berita -->
        <div class="mb-3">
            <a href="#" class="btn btn-outline-dark">
                Tambahkan Berita <span class="fw-bold">+</span>
            </a>
        </div>

        <!-- Tabel Berita -->
        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead style="background-color: #F3F1ED;">
                    <tr>
                        <th scope="col">Gambar</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Sub Judul</th>
                        <th scope="col">Isi</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody >
                    @for ($i = 0; $i < 7; $i++)
                        <tr>
                            <td style="width: 150px;">
                                <img src="{{ asset('static/dummy.png') }}" alt="Thumbnail" class="img-fluid">
                            </td>
                            <td>
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            </td>
                            <td>
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            </td>
                            <td>
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry.......
                            </td>
                            <td>Politik</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="#" class="btn btn-outline-dark btn-sm">Edit</a>
                                    <a href="#" class="btn btn-outline-dark btn-sm">Delete</a>
                                </div>
                            </td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </div>
@endsection
