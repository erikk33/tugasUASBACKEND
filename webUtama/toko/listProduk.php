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
    if ($_SESSION['role'] === 'admin') {
        header("Location: admin.php");
        exit;
    }
} else {
    // If the user is not logged in, redirect to the login page
    header("Location: ./halamanLogin/registrasiLogin.php");
    exit;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Commerce</title>
    <link rel="stylesheet" href="listProduk.css">
</head>
<body>
     
    <div class="badan">
        <h2>Produk Baru</h2>
 
        <div class="list-produk">
            <img src="assets/images/BuahBuahan.jpg" alt="Buah Buahan">
 
            <h4>Buah Buahan</h4>
            <h5>Rp 50.000,-</h5>
 
            <a class="tombol tombol-detail" href="#">Detail</a> 
            <a class="tombol tombol-beli" href="#">Beli</a>
        </div>
 
        <div class="list-produk">
            <img src="assets/images/beras.jpg" alt="Beras">
 
            <h4>Beras</h4>
            <h5>Rp 230.000,-</h5>
 
            <a class="tombol tombol-detail" href="#">Detail</a> 
            <a class="tombol tombol-beli" href="#">Beli</a>
        </div>
 
        <div class="list-produk">
            <img src="assets/images/Chimory.jpg" alt="Yoghurt Chimory">
 
            <h4>Yoghurt Chimory</h4>
            <h5>Rp 150.000,-</h5>
 
            <a class="tombol tombol-detail" href="#">Detail</a> 
            <a class="tombol tombol-beli" href="#">Beli</a>
        </div>
 
        <div class="list-produk">
            <img src="assets/images/Daging beku.jpg" alt="Daging Beku">
 
            <h4>Daging Beku</h4>
            <h5>Rp 170.000,-</h5>
 
            <a class="tombol tombol-detail" href="#">Detail</a> 
            <a class="tombol tombol-beli" href="#">Beli</a>
        </div>
    </div>
 
</body>
</html>
