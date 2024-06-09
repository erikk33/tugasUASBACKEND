<?php
session_start();


// kelas AppSessionHandler di dalam file ini
class AppSessionHandler {
    public function __construct() {
        // sesi telah dimulai
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function checkLogin() {
        // Periksa apakah sesi login dan role telah di-set
        return isset($_SESSION['login']) && isset($_SESSION['role']);
    }

    public function redirectBasedOnRole() {
        // Jika pengguna telah login, periksa perannya
        if ($this->checkLogin()) {
            if ($_SESSION['role'] === 'admin') {
                header("Location: admin.php");
                exit;
            }
            // Tambahkan logika tambahan untuk peran lain jika diperlukan
        } else {
            // Jika tidak ada sesi login, arahkan ke halaman login
            header("Location: ./halamanLogin/registrasiLogin.php");
            exit;
        }
    }
}

// Buat instance dari AppSessionHandler
$sessionHandler = new AppSessionHandler();

// Periksa login dan lakukan redirect berdasarkan role
$sessionHandler->redirectBasedOnRole();



// Fungsi untuk menghapus barang dari keranjang
function hapusBarang($id) {
    if (isset($_SESSION['keranjang'][$id])) {
        unset($_SESSION['keranjang'][$id]);
    }
}

// Proses penghapusan barang dari keranjang jika tombol hapus diklik
if (isset($_POST['hapus']) && isset($_POST['id'])) {
    hapusBarang($_POST['id']);
    // Redirect agar halaman dimuat ulang setelah penghapusan barang
    header("Location: keranjang.php");
    exit;
}

$keranjang = isset($_SESSION['keranjang']) ? $_SESSION['keranjang'] : [];
$totalHarga = array_reduce($keranjang, function ($sum, $item) {
    return $sum + ($item['harga'] * $item['jumlah']);
}, 0);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Keranjang Belanja</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-8">
        <h2 class="text-2xl font-bold text-red-600 mb-4">Keranjang Belanja</h2>

        <?php if (count($keranjang) > 0): ?>
            <div class="bg-white p-4 rounded shadow">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="py-2">Nama Barang</th>
                            <th class="py-2">Gambar</th>
                            <th class="py-2">Harga</th>
                            <th class="py-2">Jumlah</th>
                            <th class="py-2">Subtotal</th>
                            <th class="py-2">Aksi</th> <!-- Kolom baru untuk tombol hapus -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($keranjang as $id => $item): ?>
                            <tr>
                                <td class="py-2"><?php echo htmlspecialchars($item['namaBarang']); ?></td>
                                <td class="py-2"><img src="assets/images/<?php echo htmlspecialchars($item['gambar']); ?>" alt="<?php echo htmlspecialchars($item['namaBarang']); ?>" class="w-16 h-16 object-cover"></td>
                                <td class="py-2">Rp <?php echo number_format($item['harga'], 0, ',', '.'); ?>,-</td>
                                <td class="py-2"><?php echo htmlspecialchars($item['jumlah']); ?></td>
                                <td class="py-2">Rp <?php echo number_format($item['harga'] * $item['jumlah'], 0, ',', '.'); ?>,-</td>
                                <td class="py-2">
                                    <!-- Tombol untuk menghapus barang -->
                                    <form action="" method="post">
                                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                                        <button type="submit" name="hapus" class="text-red-500">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="flex justify-end mt-4">
                    <h4 class="text-xl font-bold">Total Harga: Rp <?php echo number_format($totalHarga, 0, ',', '.'); ?>,-</h4>
                </div>
                <div class="flex justify-end mt-4">
                    <a href="checkoutPayment/index.php" class="bg-red-500 text-white px-4 py-2 rounded">Checkout</a>
                </div>
            </div>
        <?php else: ?>
            <p>Keranjang belanja Anda kosong.</p>
        <?php endif; ?>

        <div class="flex justify-end mt-4">
            <a href="listProduk.php" class="bg-green-500 text-white px-4 py-2 rounded">Lanjut Belanja</a>
        </div>
    </div>
</body>
</html>
