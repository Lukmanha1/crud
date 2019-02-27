<?php

	session_start();

	if (!isset($_SESSION["login"])) {
		header("location: login.php");
		exit;
	}
	
	include "functions.php";

	// Mengambil data di URL
	$id = $_GET["id"];

	// Query data siswa berdasarkan id
	$dt1 = query("SELECT * FROM data1 WHERE id=$id")[0];

	// Cek apakah tombol submit sudah ditekan atau belum
	if (isset($_POST["submit"])) {
		// Cek apakah data berhasil di ubah Atau tidak
		if (edit($_POST) > 0 ) {
			echo "
				<script>
					alert('Data berhasil diubah');
					document.location.href='index.php';
				</script>
			";
		} else {
			echo "
				<script>
					alert('Data gagal diubah');
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
	<title>Ubah Data Siswa</title>
</head>
<body>
	
	<h1>Ubah Data Siswa</h1>

	<form action="" method="post" enctype="multipart/form-data">
		
		<input type="hidden" name="id" value="<?php echo $dt1["id"]; ?>">		
		<input type="hidden" name="gambarLama" value="<?php echo $dt1["gambar"]; ?>">
		<ul>
			<li>
				<label for="nama">Nama</label>
				<input type="text" name="nama" id="nama" required value="<?php echo $dt1["nama"]; ?>">
			</li>
			<li>
				<label for="nisn">NISN</label>
				<input type="number" name="nisn" id="nisn" required value="<?php echo $dt1["nisn"]; ?>">
			</li>
			<li>
				<label for="email">Email</label>
				<input type="text" name="email" id="email" required value="<?php echo $dt1["email"]; ?>">
			</li>
			<li>
				<label for="jurusan">Jurusan</label>
				<input type="text" name="jurusan" id="jurusan" required value="<?php echo $dt1["jurusan"]; ?>">
			</li>
			<li>
				<label for="gambar">Gambar</label><br>
				<img src="img/<?php echo $dt1["gambar"]; ?>" alt="" width="40"><br>
				<input type="file" name="gambar" id="gambar" required">
			</li>
			<li>
				<button type="submit" name="submit">Update Data</button>
			</li>
		</ul>

	</form>

</body>
</html>