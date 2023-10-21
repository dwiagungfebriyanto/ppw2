<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Buku;

class BukuController extends Controller
{
    public function index() {
        $batas = 5;
        $data_buku = Buku::orderBy('id', 'desc')->paginate($batas);
        $no = $batas * ($data_buku->currentPage() - 1);
        $jumlah_data = Buku::count('id');
        $total_harga = Buku::sum('harga');
        return view('buku.index', compact('data_buku', 'no', 'jumlah_data', 'total_harga'));
    }

    public function create() {
        return view('buku.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'judul'         => 'required|string',
            'penulis'       => 'required|string|max:30',
            'harga'         => 'required|numeric',
            'tgl_terbit'    => 'required|date'
        ]);
        Buku::create([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'harga' => $request->harga,
            'tgl_terbit' => $request->tgl_terbit
        ]);
        return redirect('/buku')->with('pesan', 'Data Buku Berhasil Disimpan');
    }

    public function destroy($id) {
        $buku = Buku::find($id);
        $buku->delete();
        return redirect('/buku')->with('pesanDelete', 'Buku Berhasil Dihapus');
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
        return redirect('/buku')->with('pesanUpdate', 'Data Buku Berhasil Diubah');
    }

    public function search(Request $request) {
        $batas = 5;
        $cari = $request->kata;
        $data_buku = Buku::where('judul', 'like', "%".$cari."%")->orwhere('penulis', 'like', "%".$cari."%")->paginate($batas);
        $jumlah_data = $data_buku->count();
        $no = $batas * ($data_buku->currentPage() - 1);
        $total_harga = $data_buku->sum('harga');
        return view('buku.search', compact('data_buku', 'total_harga', 'no', 'jumlah_data', 'cari'));
    }
}