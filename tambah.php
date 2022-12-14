<?php
require 'functions.php';

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {

  // cek apakah data berhasil di tambahkan atau tidak
  if (tambah($_POST) > 0) {
    echo "
			<script>
				alert('data berhasil ditambahkan!');
				document.location.href = 'index.php';
			</script>
		";
  } else {
    echo "
			<script>
				alert('data gagal ditambahkan!');
				document.location.href = 'index.php';
			</script>
		";
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Tambah data barang</title>
</head>

<body>
  <h1>Tambah data barang</h1>

  <form action="" method="post">
    <ul>
      <li>
        <label for="id">ID : </label>
        <input type="text" name="id" id="id" required>
      </li>
      <li>
        <label for="nama">Nama : </label>
        <input type="text" name="nama" id="nama">
      </li>
      <li>
        <label for="stok">Stok :</label>
        <input type="text" name="stok" id="stok">
      </li>
      <li>
        <button type="submit" name="submit">Tambah Data!</button>
      </li>
    </ul>

  </form>
</body>

</html>