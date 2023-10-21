@extends('master')

@section('konten')
<div class="container">
    <br>
    <h4>Edit Data Buku</h4>
    <br>
    <form action="{{route('buku.update',$buku->id)}}" method="POST">
        @csrf
        <table>
            <tr>
                <td><b>Judul</b></td>
                <td><input type="text" class="form-control" name="judul" id="judul" value="{{$buku->judul}}"></td>
            </tr>
            <tr>
                <td><b>Penulis</b></td>
                <td><input type="text" class="form-control" name="penulis" id="penulis" value="{{$buku->penulis}}"></td>
            </tr>
            <tr>
                <td><b>Harga</b></td>
                <td><input type="text" class="form-control" name="harga" id="harga" value="{{$buku->harga}}"></td>
            </tr>
            <tr>
                <td><b>Tanggal Terbit&nbsp;&nbsp;&nbsp;&nbsp;</b></td>
                <td><input type="date" class="form-control" name="tgl_terbit" id="tgl_terbit" value="{{$buku->tgl_terbit}}"></td>
            </tr>
        </table>
        <br>
            {{-- <div>Judul <input type="text" name="judul" id="judul"></div>
            <div>Penulis <input type="text" name="penulis" id="penulis"></div>
            <div>Harga <input type="text" name="harga" id="harga"></div>
            <div>Tgl. Terbit <input type="date" name="tgl_terbit" id="tgl_terbit"></div> --}}
        <table>
            <tr>
                <td><div><button class="btn btn-primary btn-sm" type="submit"><b>SIMPAN</b></button></div></td>
                <td>&nbsp;<a class="btn btn-danger btn-sm" href="/buku"><B>BATAL</B></a></td>
            </tr>
        </table>
    </form>
</div>
@endsection