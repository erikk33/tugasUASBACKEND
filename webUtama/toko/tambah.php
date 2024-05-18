<?php
//koneksi ke dbms 
require 'function.php';
$conn = mysqli_connect("localhost","root","","projectpenjualan");
//cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
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
</head>
<body>
    <h1>Tambah data mahasiswa</h1>
    <form action="" method="post">
    <ul>
        <li>
            <label for="namaBarang">Nama Barang</label>
            <input type="text" name="namaBarang" id="namaBarang" required>
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
            <button type="submit" name="submit">Tambah Data !</button>
        </li>
    </ul>
    </form>
</body>
</html>