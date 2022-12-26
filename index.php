<?php
require 'functions.php';
$barang = query("SELECT * FROM barang");

// tombol cari ditekan
if (isset($_POST["cari"])) {
  $barang = cari($_POST["keyword"]);
}

?>
<!DOCTYPE html>
<html>

<head>
  <title>Halaman Admin</title>

  <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="css/style.css">
</head>

<body>

  <h1>Daftar barang</h1>

  <a href="tambah.php" class="edit">Tambah data barang</a>
  <br><br>

  <form action="" method="post">

    <input type="text" name="keyword" class="search-input" size="40" autofocus placeholder="masukkan keyword pencarian.." autocomplete="off">
    <button type="submit" name="cari" class="search-button">Cari!</button>

  </form>

  <br>
  <table class="content-table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Stok</th>
        <th>Aksi</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($barang as $row) : ?>
      <tr>
        <td><?= $row["id"]; ?></td>
        <td><?= $row["nama"]; ?></td>
        <td><?= $row["stok"]; ?></td>
        <td>
          <a href="ubah.php?id=<?= $row["id"]; ?>" class="edit">ubah</a>
          <a href="hapus.php?id=<?= $row["id"]; ?>" class="delete" onclick="return confirm('yakin?');">hapus</a>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

</body>

</html>