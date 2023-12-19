<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['buku_id', 'user_id', 'isi', 'is_approved'];
    
    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }
}
