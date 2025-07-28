<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pengguna;
use App\Models\Berita;
use App\Models\Komentar;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class PenggunaController extends Controller
{
    public function index()
    {
        $beritaUtama = Berita::orderByDesc('dilihat')->first(); // Berita paling banyak dilihat

        $beritaTerbaru = Berita::orderByDesc('created_at')
            ->where('id_berita', '!=', $beritaUtama->id_berita)
            ->take(9)
            ->get();

        $kategoriList = ['Bisnis', 'Pasar', 'Teknologi', 'Gaya Hidup', 'Politik', 'Olahraga', 'Pendidikan', 'Budaya'];
        $beritaKategori = [];

        foreach ($kategoriList as $kategori) {
            $beritaKategori[$kategori] = Berita::where('kategori', $kategori)
                ->orderByDesc('created_at')
                ->take(5)
                ->get();
        }

        return view('home', compact('beritaUtama', 'beritaTerbaru', 'beritaKategori'));
    }

    public function ShowLoginForm()
    {
        return view('auth.masuk');
    }

    public function login(Request $request)
    {

        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/');
        }

        return redirect()->back()->withErrors(['email' => 'Login gagal']);
    }

    public function ShowRegisForm()
    {
        return view('auth.daftar');
    }

    public function register(Request $request)
    {
        // Cek apakah username sudah digunakan
        if (Pengguna::where('email', $request->email)->exists()) {
            session()->flash('error', 'Email sudah digunakan, silakan pilih email lain.');
            return back()->withInput();
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'password' => 'required|confirmed',
            'role' => 'required|in:admin,pembaca',
        ]);

        if ($validator->fails()) {
            session()->flash('error', 'Registrasi gagal! Periksa kembali data Anda.');
            return back()->withErrors($validator)->withInput();
        }

        Pengguna::create([
            'nama' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        session()->flash('success', 'Registrasi berhasil! Silakan login.');
        return redirect()->route('ShowLogin');
    }

    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        session()->flash('success', 'Logout berhasil!');
        return redirect('/');
    }

    public function cari(Request $request)
    {
        $query = $request->input('query');

        if ($query) {
            $beritas = Berita::where('judul', 'like', '%' . $query . '%')
                ->orWhere('isi', 'like', '%' . $query . '%')
                ->orWhere('sub_judul', 'like', '%' . $query . '%')
                ->take(10)
                ->orderByDesc('created_at')
                ->get();
        } else {
            // Jika tidak ada query, tampilkan berita terbaru
            $beritas = Berita::orderByDesc('created_at')->take(10)->get();
        }

        return view('cari', compact('beritas'));
    }

    public function showBerita($id)
    {
        $berita = Berita::with([
            'pengguna',
            'komentar' => function ($query) {
                $query->orderByDesc('created_at'); // komentar terbaru
            },
        ])->findOrFail($id);
        $berita->increment('dilihat'); // Increment the view count
        return view('berita', compact('berita'));
    }

    public function addKomentar(Request $request, $id)
    {
        $request->validate([
            'isi' => 'required|string|max:1000',
        ]);

        $berita = Berita::findOrFail($id);

        Komentar::create([
            'isi' => $request->isi,
            'id_berita' => $berita->id_berita,
            'id_pengguna' => auth()->id(),
        ]);

        return redirect()->back()->with('success', 'Komentar berhasil dikirim!');
    }

    public function deleteKomentar($id)
    {
        $komentar = Komentar::findOrFail($id);

        // Cek apakah pengguna yang login adalah pemilik komentar
        if ($komentar->id_pengguna !== auth()->id()) {
            abort(403, 'Anda tidak diizinkan menghapus komentar ini.');
        }

        $komentar->delete();

        return redirect()->back()->with('success', 'Komentar berhasil dihapus!');
    }
}
