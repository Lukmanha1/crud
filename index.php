<?php

	session_start();

	if (!isset($_SESSION["login"])) {
		header("location: login.php");
		exit;
	}

	include "functions.php";

	// Pafination
	// Konfigurasi
	// $jumlahDataPerHalaman = 3;
	// $jumlahData = count(query("SELECT * FROM data1"));
	// $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
	// $halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"]: 1;
	// $awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

	// $data1 = query("SELECT * FROM data1 LIMIT $awalData, $jumlahDataPerHalaman");
	$data1 = query("SELECT * FROM data1");

	// Tombol cari di tekan
	if (isset($_POST["search"])) {
		$data1 = search($_POST["keyword"]);
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Halaman Admin</title>
	<style>
		.loader {
			width: 65px;
			position: absolute;
			top: 128px;
			left: 310px;
			z-index: -1;
			display: none;
		}
	</style>

	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/script.js"></script>
</head>
<body>

	<a href="logout.php">Logout</a>
	
	<h1>Daftar Siswa</h1>

	<a href="add.php">Tambah Data Siswa</a><br><br>

	<form action="" method="post">
		
		<input type="text" name="keyword" size="40" autofocus placeholder="Masukkan keyword pencarian..." autocomplete="off" id="keyword">
		<button type="submit" name="search" id="tombol-cari">Search</button>

		<img src="img/loader.gif" class="loader">

	</form><br>

	<!-- Navigasi -->
<!-- 	<?php if($halamanAktif > 1) : ?>
		<a href="?halaman=<?php echo $halamanAktif - 1; ?>">&laquo;</a>
	<?php endif; ?>

	<?php for ($i=1; $i <= $jumlahHalaman; $i++) : ?>
		<?php if ($i == $halamanAktif) : ?>
			<a href="?halaman=<?php echo $i; ?>" style="color:red;"><?php echo $i; ?></a>
		<?php else : ?>
			<a href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
		<?php endif; ?>
	<?php endfor ?>

	<?php if($halamanAktif < $jumlahHalaman) : ?>
		<a href="?halaman=<?php echo $halamanAktif + 1; ?>">&raquo;</a>
	<?php endif; ?> -->

	<div id="container">

		<table border="1" cellpadding="0" cellspacing="0">
			
			<tr>
				<th>No.</th>
				<th>Nama</th>
				<th>NISN</th>
				<th>Email</th>
				<th>Jurusan</th>
				<th>Gambar</th>
				<th>Aksi</th>
			</tr>

			<?php $i = 1; ?>
			<?php foreach ($data1 as $row) : ?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $row["nama"]; ?></td>
				<td><?php echo $row["nisn"]; ?></td>
				<td><?php echo $row["email"]; ?></td>
				<td><?php echo $row["jurusan"]; ?></td>
				<td><img src="img/<?php echo $row["gambar"]; ?>" alt="" width="50px"></td>
				<td>
					<a href="edit.php?id=<?php echo $row["id"]; ?>">Ubah</a>|
					<a href="delete.php?id=<?php echo $row["id"]; ?>" onclick="confirm('Yakin ingin menghapus data ?');">Hapus</a>
				</td>
			</tr>
			<?php $i++; ?>
			<?php endforeach ; ?>

		</table>

	</div>

</body>
</html>