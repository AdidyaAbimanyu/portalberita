<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pengguna;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'berita';

    protected $primaryKey = 'id_berita';

    protected $fillable = [
        'judul',
        'sub_judul',
        'isi',
        'gambar',
        'kategori',
        'dilihat',
        'id_pengguna',
    ];

    // Berita.php
    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'id_pengguna');
    }

    public function komentar()
    {
        return $this->hasMany(Komentar::class, 'id_berita', 'id_berita');
    }

}
