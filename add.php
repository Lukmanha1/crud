<?php

	session_start();

	if (!isset($_SESSION["login"])) {
		header("location: login.php");
		exit;
	}
	
	include "functions.php";

	// Cek apakah tombol submit sudah ditekan atau belum
	if (isset($_POST["submit"])) {
		// Cek apakah data berhasil di tambahkan Atau tidak
		if (add($_POST) > 0 ) {
			echo "
				<script>
					alert('Data berhasil ditambahkan');
					document.location.href='index.php';
				</script>
			";
		} else {
			echo "
				<script>
					alert('Data gagal ditambahkan');
					document.location.href='index.php';
				</script>
			";		
		}
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tambah Data Siswa</title>
</head>
<body>
	
	<h1>Tambah Data Siswa</h1>

	<form action="" method="post" enctype="multipart/form-data">
		
		<ul>
			<li>
				<label for="nama">Nama</label>
				<input type="text" name="nama" id="nama" required>
			</li>
			<li>
				<label for="nisn">NISN</label>
				<input type="number" name="nisn" id="nisn" required>
			</li>
			<li>
				<label for="email">Email</label>
				<input type="text" name="email" id="email" required>
			</li>
			<li>
				<label for="jurusan">Jurusan</label>
				<input type="text" name="jurusan" id="jurusan" required>
			</li>
			<li>
				<label for="gambar">Gambar</label>
				<input type="file" name="gambar" id="gambar" required>
			</li>
			<li>
				<button type="submit" name="submit">Tambah Data</button>
			</li>
		</ul>

	</form>

</body>
</html>