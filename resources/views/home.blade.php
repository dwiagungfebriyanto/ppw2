<!-- Menghubungkan dengan view template master -->
@extends('master')
 
<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('judul_halaman', 'Halaman Home')
 
 
<!-- isi bagian konten -->
<!-- cara penulisan isi section yang panjang -->
@section('konten')
	<p>Ini Adalah Halaman Home</p>
	<p>Selamat datang!</p>
    <p>
		Lorem ipsum dolor sit amet consectetur adipisicing elit. 
		Illo, repellendus. Dolor odio labore voluptatum repellendus 
		quas eius ipsam, aspernatur corporis deserunt nobis accusamus 
		earum? Voluptate porro ducimus perspiciatis suscipit eaque.
	</p>
@endsection