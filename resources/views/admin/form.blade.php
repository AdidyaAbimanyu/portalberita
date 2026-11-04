@extends('layouts.app')

@section('title', 'Tulis berita | WiNews')

@section('content')
    <div class="page-container admin-page admin-form-page">
        <nav class="admin-breadcrumb" aria-label="Breadcrumb">
            <a href="{{ route('dashboard') }}">Kelola berita</a>
            <span aria-hidden="true"> / </span>
            <span>Tulis berita</span>
        </nav>
        @include('admin._form', ['editing' => false])
    </div>
@endsection
