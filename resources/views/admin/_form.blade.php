<section class="admin-editor" aria-labelledby="admin-editor-title">
    <header class="admin-editor__header">
        <p class="eyebrow">Ruang redaksi</p>
        <h1 id="admin-editor-title">{{ $editing ? 'Sunting berita' : 'Tulis berita' }}</h1>
        <p>{{ $editing ? 'Perbarui isi dan informasi artikel.' : 'Siapkan artikel untuk diterbitkan di WiNews.' }}</p>
    </header>

    @if ($errors->any())
        <div class="admin-errors" role="alert" aria-labelledby="admin-errors-title">
            <h2 id="admin-errors-title">Periksa kembali informasi berikut</h2>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form
        action="{{ $editing ? route('berita.update', $berita->id_berita) : route('berita.store') }}"
        method="POST"
        enctype="multipart/form-data"
        class="admin-editor__form"
    >
        @csrf
        @if ($editing)
            @method('PUT')
        @endif

        <div class="admin-field">
            <label for="judul">Judul</label>
            <input
                type="text"
                id="judul"
                name="judul"
                class="form-control @error('judul') is-invalid @enderror"
                value="{{ old('judul', $editing ? $berita->judul : '') }}"
                required
                aria-describedby="@error('judul') judul-error @enderror"
            >
            @error('judul')
                <p class="admin-field__error" id="judul-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="admin-field">
            <label for="sub_judul">Subjudul</label>
            <input
                type="text"
                id="sub_judul"
                name="sub_judul"
                class="form-control @error('sub_judul') is-invalid @enderror"
                value="{{ old('sub_judul', $editing ? $berita->sub_judul : '') }}"
                required
                aria-describedby="@error('sub_judul') sub_judul-error @enderror"
            >
            @error('sub_judul')
                <p class="admin-field__error" id="sub_judul-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="admin-field">
            <label for="isi">Isi berita</label>
            <textarea
                id="isi"
                name="isi"
                class="form-control @error('isi') is-invalid @enderror"
                rows="12"
                required
                aria-describedby="@error('isi') isi-error @enderror"
            >{{ old('isi', $editing ? $berita->isi : '') }}</textarea>
            @error('isi')
                <p class="admin-field__error" id="isi-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="admin-field">
            <label for="gambar">Gambar utama</label>
            @if ($editing && $berita->gambar)
                <img
                    class="admin-editor__current-image"
                    src="{{ asset($berita->gambar) }}"
                    alt="Gambar saat ini untuk {{ $berita->judul }}"
                    loading="lazy"
                >
                <span class="admin-field__hint">Pilih file baru hanya jika ingin mengganti gambar.</span>
            @else
                <span class="admin-field__hint">Format JPG atau PNG, maksimal 2 MB.</span>
            @endif
            <input
                type="file"
                id="gambar"
                name="gambar"
                class="form-control @error('gambar') is-invalid @enderror"
                accept="image/jpeg,image/png"
                @unless ($editing) required @endunless
                aria-describedby="@error('gambar') gambar-error @enderror"
            >
            @error('gambar')
                <p class="admin-field__error" id="gambar-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="admin-field">
            <label for="kategori">Rubrik</label>
            <select
                id="kategori"
                name="kategori"
                class="form-select @error('kategori') is-invalid @enderror"
                required
                aria-describedby="@error('kategori') kategori-error @enderror"
            >
                <option value="">Pilih rubrik</option>
                @foreach (['Bisnis', 'Pasar', 'Teknologi', 'Gaya Hidup', 'Politik', 'Olahraga', 'Pendidikan', 'Budaya'] as $category)
                    <option
                        value="{{ $category }}"
                        @selected(old('kategori', $editing ? $berita->kategori : '') === $category)
                    >{{ $category }}</option>
                @endforeach
            </select>
            @error('kategori')
                <p class="admin-field__error" id="kategori-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="admin-editor__actions">
            <a class="admin-editor__cancel" href="{{ route('dashboard') }}">Batal</a>
            <button type="submit" class="editorial-button">{{ $editing ? 'Simpan perubahan' : 'Terbitkan berita' }}</button>
        </div>
    </form>
</section>
