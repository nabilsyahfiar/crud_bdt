<?php
require 'functions.php';

// ambil data di URL
$id = $_GET["id"];

// query data barang berdasarkan id
$brg = query("SELECT * FROM barang WHERE id = $id")[0];


// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {

  // cek apakah data berhasil diubah atau tidak
  if (ubah($_POST) > 0) {
    echo "
			<script>
				alert('data berhasil diubah!');
				document.location.href = 'index.php';
			</script>
		";
  } else {
    echo "
			<script>
				alert('data gagal diubah!');
				document.location.href = 'index.php';
			</script>
		";
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Ubah data barang</title>
</head>

<body>
  <h1>Ubah data barang</h1>

  <form action="" method="post">
    <input type="hidden" name="id" value="<?= $brg["id"]; ?>">
    <ul>
      <li>
        <label for="nrp">ID : </label>
        <input type="text" name="id" id="nrp" required value="<?= $brg["id"]; ?>" disabled>
      </li>
      <li>
        <label for="nama">Nama : </label>
        <input type="text" name="nama" id="nama" value="<?= $brg["nama"]; ?>">
      </li>
      <li>
        <label for="stok">Stok :</label>
        <input type="text" name="stok" id="stok" value="<?= $brg["stok"]; ?>">
      </li>
      <li>
        <button type="submit" name="submit">Ubah Data!</button>
      </li>
    </ul>

  </form>
</body>

</html>