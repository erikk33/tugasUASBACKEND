<?php
//koneksi ke dbms 
require 'function.php';

//ambil data di URL

$id = $_GET["id"];

// query data mahasiswa berdasarkan id

$brng = query("SELECT * FROM stockbarang WHERE id = $id")[0];

$conn = mysqli_connect("localhost","root","","projectpenjualan");
//cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
    //check apakah data berhasil di ubah atau tidak 
   if (ubah($_POST) > 0) {
    echo "
    <script>
    alert ('data berhasil diubah !');
    document.location.href = 'admin.php';
    </script>
    ";
    
   } 
   else {
    echo "    <script>
    alert ('data gagal diubah !');
    document.location.href = 'admin.php';
    </script>";
   }
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah</title>
    <link rel="stylesheet" href="styletambahbarang.css">
</head>
<body>
    <h1 style="text-align: center;">Ubah data Stock Barang</h1>
    <br>
    <br>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $brng["id"]?>">
        <input type="hidden" name="gambarLama" value="<?= $brng["gambar"]?>">
    <ul>
        <li>
            <label for="namaBarang">Nama Barang</label>
            <input type="text" name="namaBarang" id="namaBarang" required 
            value="<?= $brng["namaBarang"];?>">
        </li>
        <li>
            <label for="gambar">gambar</label> <br>
           <img src="assets/images/<?=$brng['gambar'];?>" width="500"><br>
            <input type="file" name="gambar" id="gambar" 
           
            >
        </li>
        <li>
        <label for="jenisBarang">Jenis Barang</label>
            <input type="text" name="jenisBarang" id="jenisBarang"
            value="<?= $brng["jenisBarang"];?>">
        </li>

        <li>
        <label for="jumlahBarang">Jumlah Barang</label>
            <input type="text" name="jumlahBarang" id="jumlahBarang"
              value="<?= $brng["jumlahBarang"];?>">
        </li>
        <li>
        <label for="harga">harga Barang</label>
            <input type="text" name="harga" id="harga"
              value="<?= $brng["harga"];?>">
        </li>
        <li>
            <button type="submit" name="submit">Ubah Data !</button>
        </li>
    </ul>
    </form>
</body>
</html>