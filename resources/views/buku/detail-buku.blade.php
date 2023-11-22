@extends('layouts.layout')

@section('content')
    <section class="w-100 d-flex justify-content-center py-4">
        <div style="width: 45rem;">
            <div class="container-fluid my-5 px-0">
                <div class="row">
                    <div class="col-auto">
                        @if($buku->filepath)
                            <div class="relative h-10 w-10">
                                <img class="h-full w-full object-cover object-start rounded-2" src="{{ asset($buku->filepath) }}" alt=""/>
                            </div>
                        @endif
                    </div>
                    <div class="col ps-4 align-items-center">
                        <h1 class="mb-3"><b>{{ $buku->judul }}</b></h1>
                        <table class="table table-hover">
                            <tr>
                                <td>Penulis</td>
                                <td>{{ $buku->penulis }}</td>
                            </tr>
                            <tr>
                                <td>Harga</td>
                                <td>{{ "Rp. " .number_format($buku->harga, 2, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td>Tanggal terbit</td>
                                <td>{{ $buku->tgl_terbit }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <h5 class="text-center mb-3"><b>G A L E R I</b></h5>
            <hr>
            <div class="row align-items-start gap-3">
                @foreach ($galeri as $data)
                    <div class="col-auto">
                        <a href="{{ asset($data->path) }}" data-lightbox="image-1" data-title="{{ $data->keterangan }}">
                            <img src="{{ asset($data->path) }}" class="rounded-2" style="width: 213px; height= 150px;">
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="float-end mt-3">{{ $galeri->links() }}</div>
        </div>
    </section>
@endsection