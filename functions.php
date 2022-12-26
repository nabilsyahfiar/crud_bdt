<?php 
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "inventaris");


function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}


function tambah($data) {
	global $conn;

	$id = htmlspecialchars($data["id"]);
	$nama = htmlspecialchars($data["nama"]);
	$stok = htmlspecialchars($data["stok"]);

	$query = "INSERT INTO barang
				VALUES
			  ('$id', '$nama', '$stok')
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function hapus($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM barang WHERE id = $id");
	return mysqli_affected_rows($conn);
}


function ubah($data) {
	global $conn;

	$id = $data["id"];
	$nama = htmlspecialchars($data["nama"]);
	$stok = htmlspecialchars($data["stok"]);

	$query = "UPDATE barang SET
				nama = '$nama',
				stok = '$stok'
			  WHERE id = $id
			";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);	
}


function cari($keyword) {
	$query = "SELECT * FROM barang
				WHERE
			  nama LIKE '%$keyword%' OR
			  stok LIKE '%$keyword%'
			";
	return query($query);
}
?>