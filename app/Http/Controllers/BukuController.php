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

    public function create() {
        return view('buku.create');
    }

    public function store(Request $request) {
        Buku::create([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'harga' => $request->harga,
            'tgl_terbit' => $request->tgl_terbit
        ]);
        return redirect('/buku');
    }

    public function destroy($id) {
        $buku = Buku::find($id);
        $buku->delete();
        return redirect('/buku');
    }

    public function edit($id) {
        $buku = Buku::find($id);
        return view('buku.edit', compact('buku'));
    }

    public function update(Request $request, $id) {
        $buku = Buku::find($id);
        $buku->update([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'harga' => $request->harga,
            'tgl_terbit' => $request->tgl_terbit
        ]);
        return redirect('/buku');
    }
}
