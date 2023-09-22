@extends('master')

@section('konten')
    <div class="container">
        <h4>Tambah Buku</h4>
        <form method="post" action="{{ route('buku.store') }}">
            @csrf
                <div>Judul <input type="text" name="judul" id="judul"></div>
                <div>Penulis <input type="text" name="penulis" id="penulis"></div>
                <div>Harga <input type="text" name="harga" id="harga"></div>
                <div>Tgl. Terbit <input type="date" name="tgl_terbit" id="tgl_terbit"></div>
                <div><button class="btn-primary" type="submit">Simpan</button></div>
                <a href="/buku">Batal</a>
        </form>
    </div>
@endsection