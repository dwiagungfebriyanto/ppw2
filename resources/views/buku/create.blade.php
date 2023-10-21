@extends('master')

@section('konten')
    <div class="container">
        <br>
        <h4>Tambah Buku</h4>
        <br>
        @if (count($errors) > 0)
            <ul class="alert alert-danger px-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <form method="post" action="{{ route('buku.store') }}">
            @csrf
            <table>
                <tr>
                    <td><b>Judul</b></td>
                    <td><input type="text" class="form-control" name="judul" id="judul"></td>
                </tr>
                <tr>
                    <td><b>Penulis</b></td>
                    <td><input type="text" class="form-control" name="penulis" id="penulis"></td>
                </tr>
                <tr>
                    <td><b>Harga</b></td>
                    <td><input type="text" class="form-control" name="harga" id="harga"></td>
                </tr>
                <tr>
                    <td><b>Tanggal Terbit&nbsp;&nbsp;&nbsp;&nbsp;</b></td>
                    <td><input type="date" class="form-control" name="tgl_terbit" id="tgl_terbit"></td>
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