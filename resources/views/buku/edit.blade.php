<x-app-layout>
    @extends('layouts.layout')

    @section('content')
        <h4 class="py-4">Edit Data Buku</h4>
        @if (count($errors) > 0)
            <ul class="alert alert-danger px-4">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <form action="{{route('buku.update',$buku->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <table class="table-borderless table-sm">
                <tr>
                    <td>Judul</td>
                    <td><input type="text" class="form-control" name="judul" id="judul" value="{{$buku->judul}}"></td>
                </tr>
                <tr>
                    <td>Penulis</td>
                    <td><input type="text" class="form-control" name="penulis" id="penulis" value="{{$buku->penulis}}"></td>
                </tr>
                <tr>
                    <td>Harga</td>
                    <td><input type="text" class="form-control" name="harga" id="harga" value="{{$buku->harga}}"></td>
                </tr>
                <tr>
                    <td>Tanggal Terbit&nbsp;&nbsp;</td>
                    <td><input type="date" class="form-control" name="tgl_terbit" id="tgl_terbit" value="{{$buku->tgl_terbit}}"></td>
                </tr>
                <tr>
                    <td>Thumbnail</td>
                    <td>
                        <div class="input-group">
                            <input type="file" class="form-control" name="thumbnail" id="thumbnail">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Gallery</td>
                    <td>
                        <div id="fileinput_wrapper"></div>
                        <div class="d-grid">
                            <a class="btn btn-outline-secondary my-2" href="javascript:void(0);" id="tambah" onclick="addFileInput()"><i class="bi bi-plus-circle-fill"></i> Tambah</a>
                        </div>
                        <script type="text/javascript">
                            function addFileInput () {
                                var div = document.getElementById('fileinput_wrapper');
                                div.innerHTML += '<div class="input-group my-1"><input type="file" class="form-control" name="gallery[]" id="gallery"></div>';
                            };
                        </script>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <div class="container-fluid">
                            <div class="row align-items-start gap-3">
                                @foreach($buku->galleries()->get() as $gallery)
                                    <div class="col px-0 position-relative">
                                        <img src="{{ asset($gallery->path) }}" alt="" width="400"/>
                                        <a href="{{ route('buku.deleteGallery', $gallery->id) }}" class="btn btn-dark btn-sm shadow rounded-circle" style="position: absolute; top: 10px; right: 10px;"><i class="bi bi-x-lg"></i></a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end my-3">
                            <button class="btn btn-primary me-md-2" type="submit" style="width: 100px;">SIMPAN</button>
                            <a class="btn btn-danger" href="/dashboard" style="width: 100px;">BATAL</a>
                        </div>
                    </td>
                </tr>
            </table>
        </form>
    @endsection
</x-app-layout>