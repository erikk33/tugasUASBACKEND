<?php
//koneksi ke dbms 
require 'function.php';
$conn = mysqli_connect("localhost","root","","projectpenjualan");
//cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {

    // var_dump($_POST); 
    // var_dump($_FILES);
    // die;
    //check apakah data berhasil di tambahakan atau tidak 
   if (tambah($_POST) > 0) {
    echo "
    <script>
    alert ('data berhasil ditambahkan !');
    document.location.href = 'admin.php';
    </script>
    ";
    
   } 
   else {
    echo "    <script>
    alert ('data gagal ditambahkan !');
    document.location.href = 'admin.php';
    </script>";
   }
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styletambahbarang.css">
    <link rel="stylesheet" href="buttonTambah.css">
    
</head>
<body>
    <h1 style="text-align: center;">Tambah data Stock Barang</h1>
    <br>
    <br>
    <form action="" method="post" enctype="multipart/form-data">
    <ul>
        <li>
            <label for="namaBarang">Nama Barang</label>
            <input type="text" name="namaBarang" id="namaBarang" required>
        </li>
        <li>
            <label for="gambar">gambar</label>
            <input type="file" name="gambar" id="gambar" required>
        </li>
        <li>
        <label for="jenisBarang">Jenis Barang</label>
            <input type="text" name="jenisBarang" id="jenisBarang">
        </li>

        <li>
        <label for="jumlahBarang">Jumlah Barang</label>
            <input type="text" name="jumlahBarang" id="jumlahBarang">
        </li>

        <li>
        <label for="harga">harga</label>
            <input type="text" name="harga" id="harga">
        </li>
        <li>
           <button class="btn-17" type="submit" name="submit">
  <span class="text-container">
    <span class="text">Tambah Data !</span>
  </span>
</button>

        </li>
    </ul>
    </form>
</body>
</html>