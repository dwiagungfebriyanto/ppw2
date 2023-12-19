<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukuKategori extends Model
{
    protected $table = 'buku_kategori';
    protected $fillable = ['id', 'buku_id', 'kategori_id'];
}
