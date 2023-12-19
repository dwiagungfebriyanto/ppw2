@extends('layouts.layout')

@section('content')
    <div class="py-5 text-center">
        <h2><b>BUKU POPULER</b></h2>
    </div>

    <div class="table-responsive">
        <table class="table table-borderless table-hover">
            <thead class="text-start">
                <tr>
                    <th>Gambar Sampul</th>
                    <th>Judul Buku</th>
                    <th>Penulis</th>
                    <th>Harga</th>
                    <th>Tanggal Terbit</th>
                    <th>Rating</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bukuPopuler as $buku)
                    <tr>
                        <td>
                            @if($buku->filepath)
                                <div class="relative h-10 w-10">
                                    <img class="h-full w-full object-cover object-center rounded-2" src="{{ asset($buku->filepath) }}" alt=""/>
                                </div>
                            @endif
                        </td>
                        <td>{{ $buku->judul }}</td>
                        <td>{{ $buku->penulis }}</td>
                        <td>{{ "Rp. " .number_format($buku->harga, 2, ',', '.') }}</td>
                        <td>{{ \Carbon\Carbon::parse($buku->tgl_terbit)->format('d-m-Y') }}</td>
                        <td>{{ $buku->averageRating() }}</td>
                        <td>
                            <a class="btn btn-outline-primary btn-sm" href="{{ route('galeri.buku', $buku->judul) }}" 
                                style="width: 70px;">
                                    Galeri
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection