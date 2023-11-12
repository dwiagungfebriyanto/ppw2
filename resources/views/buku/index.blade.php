<x-app-layout>
    @extends('layouts.layout')

    @section('title', 'Koleksi Buku')

    @section('content')
        @if(Session::has('pesan'))
            <div class="alert alert-success">{{Session::get('pesan')}}</div>
        @endif
        @if(Session::has('pesanUpdate'))
            <div class="alert alert-success">{{Session::get('pesanUpdate')}}</div>
        @endif
        @if(Session::has('pesanDelete'))
            <div class="alert alert-success">{{Session::get('pesanDelete')}}</div>
        @endif
        <div class="py-5 text-center">
            <h2>Data Buku</h2>
            <p class="lead">
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Expedita, reprehenderit pariatur, 
                rerum odit doloribus corrupti modi fugit facere sunt corporis fugiat quod nostrum sed 
                assumenda dicta, quos voluptatibus culpa veniam. Lorem ipsum dolor sit amet consectetur 
                adipisicing elit.
            </p>
        </div>
        <table width=100%>
            <tr>
                <td>
                    @if (Auth::check() && Auth::user()->role == 'admin')
                        <a class="btn btn-primary" href={{ route('buku.create') }}><b>TAMBAH BUKU</b></a>
                    @endif
                </td>
                <td>
                    <form action="{{ route('buku.search') }}" method="get">
                        @csrf
                        <input type="text" name="kata" class="form-control" placeholder="Cari ..." 
                        style="width: 50%; display: inline; float: right;">
                    </form>
                </td>
            </tr>
        </table>
        <br>
        <table class="table table-striped table-bordered">
            <thead class="text-center">
                <tr>
                    <th>id</th>
                    <th>Gambar Sampul</th>
                    <th>Judul Buku</th>
                    <th>Penulis</th>
                    <th>Harga</th>
                    <th>Tgl. Terbit</th>
                    @if (Auth::check() && Auth::user()->role == 'admin')
                        <th class="col-1">Aksi</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($data_buku as $buku)
                    <tr>
                        <td class="text-center">{{ ++$no }}</td>
                        <td>
                            @if($buku->filepath)
                                <div class="relative h-10 w-10">
                                    <img class="h-full w-full object-cover object-center" src="{{ asset($buku->filepath) }}" alt=""/>
                                </div>
                            @endif
                        </td>
                        <td>{{ $buku->judul }}</td>
                        <td>{{ $buku->penulis }}</td>
                        <td>{{ "Rp. " .number_format($buku->harga, 2, ',', '.') }}</td>
                        <td>{{ \Carbon\Carbon::parse($buku->tgl_terbit)->format('d-m-Y') }}</td>
                        @if (Auth::check() && Auth::user()->role == 'admin')
                            <td>
                                <div class="container-fluid align-items-start text-center">
                                    <div class="col-auto">
                                        <form action="{{ route('buku.destroy', $buku->id) }}" method="post">@csrf 
                                            <button class="btn btn-danger btn-sm mb-1" onclick="return confirm('Yakin mau dihapus?')" 
                                            style="width: 70px;">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                    <div class="col-auto">
                                        <a class="btn btn-outline-primary btn-sm" href="{{ route('buku.edit', $buku->id) }}" 
                                        style="width: 70px;">
                                            Edit
                                        </a>
                                    </div>
                                </div>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="float-end">{{ $data_buku->links() }}</div>
        <br>
        <br>
        <table>
            <tr>
                <td><b>Jumlah buku</b></td>
                <td>&nbsp;:&nbsp;</td>
                <td>{{ $jumlah_data }}</td>
            </tr>
            <tr>
                <td><b>Total harga</b></td>
                <td>&nbsp;:&nbsp;</td>
                <td>{{ "Rp " .number_format($total_harga, 2, ',', '.') }}</td>
            </tr>
        </table>
    @endsection
</x-app-layout>