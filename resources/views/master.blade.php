<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Sistem Template Blade Laravel</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<header>
		<h2>Praktikum Pemrograman Web 2</h2>
		<a href="/home">Home</a> |
		<a href="/tentang">Tentang</a>
	</header>
	<hr>
	<br>
	<br>
 
	<!-- bagian judul halaman blog -->
	<h3> @yield('judul_halaman') </h3>
 
	<!-- bagian konten blog -->
	@yield('konten')
 
	<br>
	<br>
	<hr>
	<footer>
        <h1>Ini footer</h1>
		<p>&copy; <a href="https://ugm.ac.id">SV UGM</a>. 2023</p>
	</footer>
</body>
</html>