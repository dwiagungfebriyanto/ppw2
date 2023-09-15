@extends('master')

@section('judul', 'About')

@section('konten')
    <h1>Halaman About</h1>
    <h6>{{ $name; }}</h6>
    <h6>{{ $email; }}</h6>
@endsection

@section('js')
    <script src="js/script.js"></script>
@endsection