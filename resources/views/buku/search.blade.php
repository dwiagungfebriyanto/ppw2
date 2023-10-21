@extends('master')

@section('judul', 'Koleksi Buku')

@section('konten')
    @if(count($data_buku))
        <div class="alert alert-success">Ditemukan <strong>{{ count($data_buku) }}</strong> data dengan kata: <strong>{{ $cari }}</strong></div>
    @else 
        <div class="alert alert-warning"><h4>Data {{ $cari }} tidak ditemukan</h4>
        <a href="/buku" class="btn btn-warning">Kembali</a></div>
    @endif
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
        <p class="lead">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Expedita, reprehenderit pariatur, rerum odit doloribus corrupti modi fugit facere sunt corporis fugiat quod nostrum sed assumenda dicta, quos voluptatibus culpa veniam. Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
    </div>
    <table width=100%>
        <tr>
            <td><a class="btn btn-primary btn-sm" href={{ route('buku.create') }}><b>TAMBAH BUKU</b></a></td>
            <td>
                <form action="{{ route('buku.search') }}" method="get">
                    @csrf
                    <input type="text" name="kata" class="form-control" placeholder="Cari ..." style="width: 50%; display: inline; float: right;">
                </form>
            </td>
        </tr>
    </table>
    <br>
    <table class="table table-striped table-bordered">
        <thead class="text-center">
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
                    <td class="text-center">{{ ++$no }}</td>
                    <td>{{ $buku->judul }}</td>
                    <td>{{ $buku->penulis }}</td>
                    <td>{{ "Rp. " .number_format($buku->harga, 2, ',', '.') }}</td>
                    <td>{{ \Carbon\Carbon::parse($buku->tgl_terbit)->format('d-m-Y') }}</td>
                    <td>
                        <table>
                            <tr>
                                <td>
                                    <form action="{{ route('buku.destroy', $buku->id) }}" method="post">@csrf 
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau dihapus?')">Hapus</button>
                                    </form>
                                </td>
                                <td>&nbsp;<a class="btn btn-primary btn-sm" href="{{ route('buku.edit', $buku->id) }}">Edit</a></td>
                            </tr>
                        </table>                        
                    </td>
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