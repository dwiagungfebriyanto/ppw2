@extends('layouts.layout')

@section('content')
    <h4 class="py-4 text-center"><b>Buku Berdasarkan Kategori: {{ $kategori->nama }}</b></h4>

    <div class="container">
        <div class="row">
            @forelse ($bukuByKategori as $buku)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset($buku->thumbnail) }}" class="card-img-top" alt="{{ $buku->judul }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $buku->judul }}</h5>
                            <p class="card-text">{{ $buku->penulis }}</p>
                            {{-- <a href="{{ route('buku.detail', $buku->id) }}" class="btn btn-primary">Detail</a> --}}
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-12 text-center">
                    <p>Tidak ada buku dalam kategori ini.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection
