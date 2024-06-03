<?php
session_start();

// Cek apakah pengguna sudah login dan memiliki peran
if (!isset($_SESSION['login']) || !isset($_SESSION['role'])) {
    // Jika pengguna belum login, arahkan ke halaman login
    header("Location: ./halamanLogin/registrasiLogin.php");
    exit;
}

$keranjang = isset($_SESSION['keranjang']) ? $_SESSION['keranjang'] : [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Keranjang Belanja</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead th {
            background-color: #f2f2f2;
            padding: 10px;
        }

        tbody td {
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="badan">
        <h2>Keranjang Belanja</h2>

        <?php if (!empty($keranjang)) { ?>
            <table>
                <thead>
                    <tr>
                        <th>Gambar</th>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($keranjang as $item) { ?>
                        <tr>
                            <td><img src="assets/images/<?php echo htmlspecialchars($item['gambar']); ?>" alt="<?php echo htmlspecialchars($item['namaBarang']); ?>" style="width: 500px; height: 500px;"></td>
                            <td><?php echo htmlspecialchars($item['namaBarang']); ?></td>
                            <td>Rp <?php echo number_format($item['harga'], 0, ',', '.'); ?>,-</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } else { ?>
            <p>Keranjang belanja kosong.</p>
        <?php } ?>
    </div>
</body>
</html>
