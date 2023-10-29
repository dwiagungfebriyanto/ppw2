<x-app-layout>
    @extends('layouts.layout')

    @section('content')
        <h4 class="py-4">Tambah Buku</h4>
        @if (count($errors) > 0)
            <ul class="alert alert-danger px-4">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <form method="post" action="{{ route('buku.store') }}">
            @csrf
            <table class="table-borderless table-sm">
                <tr>
                    <td class="col-2">Judul</td>
                    <td><input type="text" class="form-control" name="judul" id="judul"></td>
                </tr>
                <tr>
                    <td>Penulis</td>
                    <td><input type="text" class="form-control" name="penulis" id="penulis"></td>
                </tr>
                <tr>
                    <td>Harga</td>
                    <td><input type="text" class="form-control" name="harga" id="harga"></td>
                </tr>
                <tr>
                    <td>Tanggal Terbit&nbsp;</td>
                    <td><input type="date" class="form-control" name="tgl_terbit" id="tgl_terbit"></td>
                </tr>
            </table>
            <br>
            <table>
                <tr>
                    <td><div><button class="btn btn-primary btn-sm" type="submit" style="width: 70px;"><b>SIMPAN</b></button></div></td>
                    <td>&nbsp;<a class="btn btn-danger btn-sm" href="/dashboard" style="width: 70px;"><B>BATAL</B></a></td>
                </tr>
            </table>
        </form>
    @endsection
</x-app-layout>