<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';
    protected $fillable = ['id', 'nama'];

    public function buku()
    {
        return $this->belongsToMany(Buku::class, 'buku_kategori');
    }
}