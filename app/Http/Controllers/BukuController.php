<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Buku;

class BukuController extends Controller
{
    // fungsi index
    public function index() {
        $data_buku = Buku::all()->sortByDesc('id');
        $no = 0;
        $jumlah_data = Buku::count('id');
        $total_harga = Buku::sum('harga');
        return view('buku.index', compact('data_buku', 'no', 'jumlah_data', 'total_harga'));
    }
}
