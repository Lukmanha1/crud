<?php

	include "../functions.php";

	$keyword = $_GET["keyword"];
	
	$query = "SELECT * FROM data1 WHERE nama LIKE '%$keyword%' OR nisn LIKE '%$keyword%' OR email LIKE '%$keyword%' OR jurusan LIKE '%$keyword%'";
	$data1 = query($query);

?>

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
