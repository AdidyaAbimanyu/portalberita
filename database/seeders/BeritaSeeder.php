<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BeritaSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Bisnis',
            'Pasar',
            'Teknologi',
            'Gaya Hidup',
            'Politik',
            'Olahraga',
            'Pendidikan',
            'Budaya',
        ];

        $gambarPath = 'berita/dummy.png'; // gambar sama untuk semua berita

        foreach ($categories as $kategori) {
            for ($i = 1; $i <= 10; $i++) {
                DB::table('berita')->insert([
                    'judul' => "$kategori Berita ke-$i",
                    'sub_judul' => "Subjudul dari $kategori Berita ke-$i",
                    'isi' => Str::random(200),
                    'gambar' => $gambarPath,
                    'kategori' => $kategori,
                    'id_pengguna' => 2, // sesuaikan dengan user yang ada
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
