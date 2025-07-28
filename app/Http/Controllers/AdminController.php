<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        $beritas = Berita::all();
        return view('admin.dashboard', compact('beritas'));
    }

    public function form()
    {
        return view('admin.form');
    }

    public function addBerita(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'sub_judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'gambar' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'kategori' => 'required|string',
        ]);

        // Simpan gambar ke public/berita
        $gambar = $request->file('gambar');
        $namaGambar = time() . '_' . $gambar->getClientOriginalName();
        $gambar->move(public_path('berita'), $namaGambar);

        Berita::create([
            'judul' => $validated['judul'],
            'sub_judul' => $validated['sub_judul'],
            'isi' => $validated['isi'],
            'gambar' => 'berita/' . $namaGambar,
            'kategori' => $validated['kategori'],
            'id_pengguna' => auth()->id(),
        ]);

        return redirect()->route('dashboard')->with('success', 'Berita berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('admin.edit', compact('berita'));
    }

    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'sub_judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'kategori' => 'required|string',
        ]);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama
            if (file_exists(public_path($berita->gambar))) {
                unlink(public_path($berita->gambar));
            }

            $gambar = $request->file('gambar');
            $namaGambar = time() . '_' . $gambar->getClientOriginalName();
            $gambar->move(public_path('berita'), $namaGambar);
            $validated['gambar'] = 'berita/' . $namaGambar;
        } else {
            unset($validated['gambar']);
        }

        $berita->update($validated);

        return redirect()->route('dashboard')->with('success', 'Berita berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);

        if (file_exists(public_path($berita->gambar))) {
            unlink(public_path($berita->gambar));
        }
        $berita->delete();


        return redirect()->route('dashboard')->with('success', 'Berita berhasil dihapus.');
    }
}
