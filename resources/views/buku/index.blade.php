@extends('master')

@section('judul', 'Koleksi Buku')

@section('konten')
    <table class="table table-stripped">
        <thead>
            <tr>
                <th>id</th>
                <th>Judul Buku</th>
                <th>Penulis</th>
                <th>Harga</th>
                <th>Tgl. Terbit</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data_buku as $buku)
                <tr>
                    <td>{{ ++$no }}</td>
                    <td>{{ $buku->judul }}</td>
                    <td>{{ $buku->penulis }}</td>
                    <td>{{ "Rp " .number_format($buku->harga, 2, ',', '.') }}</td>
                    <td>{{ \Carbon\Carbon::parse($buku->tgl_terbit)->format('Y-m-d') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <h3>{{  "Jumlah data yang dimiliki : " .$jumlah_data  }}</h3>
    <h3>{{  "Total harga : Rp " .number_format($total_harga, 2, ',', '.')  }}</h3>
@endsection