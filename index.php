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
</head>

<body>

  <h1>Daftar barang</h1>

  <a href="tambah.php">Tambah data barang</a>
  <br><br>

  <form action="" method="post">

    <input type="text" name="keyword" size="40" autofocus placeholder="masukkan keyword pencarian.." autocomplete="off">
    <button type="submit" name="cari">Cari!</button>

  </form>

  <br>
  <table border="1" cellpadding="10" cellspacing="0">

    <tr>
      <th>ID</th>
      <th>Aksi</th>
      <th>Nama</th>
      <th>Stok</th>
    </tr>

    <?php foreach ($barang as $row) : ?>
      <tr>
        <td><?= $row["id"]; ?></td>
        <td>
          <a href="ubah.php?id=<?= $row["id"]; ?>">ubah</a> |
          <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin?');">hapus</a>
        </td>
        <td><?= $row["nama"]; ?></td>
        <td><?= $row["stok"]; ?></td>
      </tr>
    <?php endforeach; ?>

  </table>

</body>

</html>