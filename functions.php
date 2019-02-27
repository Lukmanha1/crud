<?php

	// Koneksi ke Database
	$conn = mysqli_connect("localhost", "root", "", "wpu");	


	// FUNCTIONS

	function query($query) {

		global $conn;
		$result = mysqli_query($conn, $query);
		$rows = [];

		while ( $row = mysqli_fetch_assoc($result) ) {
			$rows[] = $row;
		}

		return $rows;
	}

	function add($data) {
		global $conn;

		// Mengambil data dari tiap elemen dalam form
		$nama = htmlspecialchars($data["nama"]);
		$nisn = htmlspecialchars($data["nisn"]);
		$email = htmlspecialchars($data["email"]);
		$jurusan = htmlspecialchars($data["jurusan"]);

		// Upload gambar
		$gambar = upload();
		if (!$gambar) {
				return false;
		}

		// Query insert data
		$query = "INSERT INTO data1 VALUES ('', '$nama', '$nisn', '$email', '$jurusan', '$gambar')";
		mysqli_query($conn, $query);

		return mysqli_affected_rows($conn);

	}

	function upload() {
		$fileName = $_FILES["gambar"]["name"];
		$fileSize = $_FILES["gambar"]["size"];
		$error = $_FILES["gambar"]["error"];
		$tmpName = $_FILES["gambar"]["tmp_name"];

		// Cek apakah tidak ada gambar yang diupload
		if ($error === 4) {
			echo "
				<script>
					alert('Pilih gambar terlebih dahulu');
				</script>
			";
			return false;
		}

		// Cek apakah yang diupload adalah gambar
		$ekstensiGambarValid = ["jpg", "jpeg", "png"];
		$ekstensiGambar = explode('.', $fileName);
		$ekstensiGambar = strtolower(end($ekstensiGambar));
		if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
			echo "
				<script>
					alert('Harap upload berupa gambar');
				</script>
			";
			return false;
		}

		// Cek apakah ukuran gambar terlalu besar
		// 1000000 = 1MB
		if ($fileSize > 1000000) {
			echo "
				<script>
					alert('Ukuran gambar terlalu besar');
				</script>
			";
			return false;
		}

		// Lolos pengecekan, gambar siap di upload
		// Generate nama gambar baru
		$newFileName = uniqid();
		$newFileName .= '.';
		$newFileName .= $ekstensiGambar;

		move_uploaded_file($tmpName, 'img/' .$newFileName);

		return $newFileName;


	}

	function delete($id) {
		global $conn;
		mysqli_query($conn, "DELETE FROM data1 WHERE id=$id");

		return mysqli_affected_rows($conn);
	}

	function edit($data) {
		global $conn;

		// Mengambil data dari tiap elemen dalam form
		$id = $data["id"];
		$nama = htmlspecialchars($data["nama"]);
		$nisn = htmlspecialchars($data["nisn"]);
		$email = htmlspecialchars($data["email"]);
		$jurusan = htmlspecialchars($data["jurusan"]);
		$gambarLama = htmlspecialchars($data["gambarLama"]);

		// Cek apakah user pilih gambar baru atau tidak
		if ($_FILES['gambar']['error'] === 4 ) {
			$gambar = $gambarLama;
		} else {
			$gambar = upload();
		}

		// Query update data
		$query = "UPDATE data1 SET nama='$nama', nisn='$nisn', email='$email', jurusan='$jurusan', gambar='$gambar' WHERE id=$id";
		mysqli_query($conn, $query);

		return mysqli_affected_rows($conn);

	}

	function search($keyword) {
		$query = "SELECT * FROM data1 WHERE nama LIKE '%$keyword%' OR nisn LIKE '%$keyword%' OR email LIKE '%$keyword%' OR jurusan LIKE '%$keyword%'";

		return query($query);
	}

	function registrasi($data) {
		global $conn;

		$username = strtolower(stripslashes($data["username"]));
		$password = mysqli_real_escape_string($conn, $data["password"]);
		$password2 = mysqli_real_escape_string($conn, $data["password2"]);

		// Cek username sudah  ada atau belum
		$result = mysqli_query($conn, "SELECT username FROM users1 WHERE username='$username'");
		if (mysqli_fetch_assoc($result)) {
			echo "
				<script>
					alert('Username sudah terdaftar');
				</script>
			";

			return false;
		}

		// Cek konfirmasi password
		if ($password !== $password2) {
			echo "
				<script>
					alert('Konfirmasi password tidak sesuai');
				</script>
			";

			return false;
		}

		// Enkripsi password
		$password = password_hash($password, PASSWORD_DEFAULT);

		// Tambahkan user baru ke database
		mysqli_query($conn, "INSERT INTO users1 VALUES('', '$username', '$password')");

		return mysqli_affected_rows($conn);
	}

?>