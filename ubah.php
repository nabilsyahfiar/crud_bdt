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

  <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <h1>Ubah data barang</h1>

  <form action="" method="post">
    <table class="content-table">
      <input type="hidden" name="id" value="<?= $brg["id"]; ?>">
      <tr>
        <td><label for="id">ID</label></td>
        <td><input type="text" name="id" id="id" class="add-input" required value="<?= $brg["id"]; ?>" disabled></td>
      </tr>
      <tr>
        <td><label for="nama">Nama</label></td>
        <td><input type="text" name="nama" id="nama" class="add-input" value="<?= $brg["nama"]; ?>"></td>
      </tr>
      <tr>
        <td><label for="stok">Stok</label></td>
        <td><input type="text" name="stok" id="stok" class="add-input" value="<?= $brg["stok"]; ?>"></td>
      </tr>
      <tr style="text-align: right;">
        <td></td>
        <td><button type="submit" name="submit" class="search-button">Ubah Data!</button></td>
      </tr>
    </table>
  </form>
</body>

</html>