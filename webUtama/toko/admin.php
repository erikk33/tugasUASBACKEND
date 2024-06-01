<?php 
session_start();
// Jika tidak ada sesi login, arahkan ke halaman login
// if (!isset($_SESSION["login"])){
//   header("Location: ./halamanLogin/registrasiLogin.php");
//   exit;

  
// }

// Check if the user is logged in and has a role
if (isset($_SESSION['login']) && isset($_SESSION['role'])) {
    // If the role is 'user', redirect to admin.php
  
    if ($_SESSION['role'] === 'user') {
      header("Location: index.php");
      exit;
  }
  
} else {
    // If the user is not logged in, redirect to the login page
    header("Location: ./halamanLogin/registrasiLogin.php");
    exit;
}


?>
<?php
require 'function.php';


$stockbarang = query("SELECT * FROM stockbarang");
// tombol cari ditekan
if (isset($_POST["cari"])) {
  $stockbarang = cari($_POST["keyword"]);
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="admin.css">
</head>
<body>
    <br>
    <br>
    <h1>DAFTAR STOCK BARANG</h1>
    <a href="tambah.php">Tambah Data Barang</a>
    
    <a href="halamanLogout/logout.php" class="logout">Logout</a>
    <br><br>
    <form action="" method="post">
      <input type="text" name="keyword" size="40" autofocus placeholder="
      Masukan keyword pencarian" autocomplete="off">
      <button type="submit" name="cari">Cari !</button>
    </form>

    <br>
<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Barang</th>
      <th scope="col">Gambar </th>
      <th scope="col">Jenis Barang</th>
      <th scope="col">Jumlah Barang</th>
      <th scope="col">Harga Barang per PCS</th>
      <!-- <th scope="col">Kategori Id</th> -->
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 1;?>
    <?php foreach($stockbarang as $row) : ?>
    <tr>
      <th scope="row"><?= $i ?></th>
      <td><?= $row["namaBarang"]; ?></td>
      <td><img src="assets/images/<?php echo $row["gambar"]; ?>" alt="" 
      width="50">
    </td>
      <td><?= $row["jenisBarang"]; ?></td>
      <td><?= $row["jumlahBarang"]; ?></td>
      <td>Rp <?= number_format($row["harga"], 0, ',', '.'); ?></td>

      <td>
    <a href="ubah.php?id=<?=$row["id"]?>">ubah</a>
    <a href="hapus.php?id=<?= $row["id"];?>" onclick="
    return confirm('Yakin menghapus data ini ? ')">Hapus</a>
    </td>
    </tr>
    
  </tbody>
  <?php $i++;?>
  <?php endforeach; ?>
</table>
</body>
</html>