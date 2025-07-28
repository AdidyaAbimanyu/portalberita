<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class KomentarSeeder extends Seeder
{
    public function run(): void
    {
        for ($idBerita = 1; $idBerita <= 80; $idBerita++) {
            for ($i = 1; $i <= 5; $i++) {
                DB::table('komentar')->insert([
                    'isi' => "Ini adalah komentar ke-$i untuk berita $idBerita. " . Str::random(50),
                    'id_berita' => $idBerita,
                    'id_pengguna' => 2,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
