<?php 
session_start();

// Cek apakah pengguna sudah login dan memiliki peran
if (isset($_SESSION['login']) && isset($_SESSION['role'])) {
    // Jika peran adalah 'admin', arahkan ke admin.php
    if ($_SESSION['role'] === 'admin') {
        header("Location: admin.php");
        exit;
    }
} else {
    // Jika pengguna belum login, arahkan ke halaman login
    header("Location: ./halamanLogin/registrasiLogin.php");
    exit;
}

include 'db_connectlistproduk.php'; // Menghubungkan ke database

$sql = "SELECT namaBarang, gambar, harga FROM stockbarang"; // Perbarui kolom harga
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Commerce</title>
    <link rel="stylesheet" href="listProduk.css"> <!-- Pastikan link ke file CSS Anda -->
</head>
<body>
    <div class="badan">
        <h2>Produk Baru</h2>

        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<div class="list-produk">';
                echo '<img src="assets/images/' . $row["gambar"] . '" alt="' . $row["namaBarang"] . '">';
                echo '<h4>' . $row["namaBarang"] . '</h4>';
                echo '<h5>Rp ' . number_format($row["harga"], 0, ',', '.') . ',-</h5>'; // Perbarui nama kolom harga
                echo '<a class="tombol tombol-detail" href="#">Detail</a>';
                echo '<a class="tombol tombol-beli" href="#">Beli</a>';
                echo '</div>';
            }
        } else {
            echo "Tidak ada produk tersedia.";
        }
        $conn->close(); // Menutup koneksi
        ?>
    </div>
</body>
</html>
