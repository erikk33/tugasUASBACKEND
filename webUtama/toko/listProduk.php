<?php 
session_start();

// Definisikan kelas AppSessionHandler di dalam file ini
class AppSessionHandler {
    public function __construct() {
        // Pastikan sesi telah dimulai
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



include 'db_connectlistproduk.php'; // Menghubungkan ke database

// Fungsi untuk menambahkan ke keranjang
if (isset($_GET['action']) && $_GET['action'] == 'add' && isset($_GET['namaBarang'])) {
    $namaBarang = $_GET['namaBarang'];
    $harga = $_GET['harga'];
    $gambar = $_GET['gambar'];

    if (!isset($_SESSION['keranjang'])) {
        $_SESSION['keranjang'] = [];
    }
    
    $itemFound = false;
    foreach ($_SESSION['keranjang'] as &$item) {
        if ($item['namaBarang'] === $namaBarang) {
            $item['jumlah'] += 1;
            $itemFound = true;
            break;
        }
    }
    
    if (!$itemFound) {
        $_SESSION['keranjang'][] = [
            'namaBarang' => $namaBarang,
            'harga' => $harga,
            'gambar' => $gambar,
            'jumlah' => 1
        ];
    }
    
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

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
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-yellow-100">
    <div class="max-w-7xl mx-auto p-4">
        <h2 class="text-2xl font-bold text-red-600 mb-4">Produk Baru</h2>
        <div class="flex justify-end mb-4">
            <a href="index.php" class="bg-green-500 text-white px-4 py-2 rounded flex items-center">
                Home
            </a>
        </div>
        
        <div class="flex justify-end mb-4">
            <a href="keranjang.php" class="bg-red-500 text-white px-4 py-2 rounded flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart mr-2" viewBox="0 0 16 16">
                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                </svg>
                Keranjang Belanja
            </a>
        </div>
        
        <div id="produk-container" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            <div class="bg-gray-200 p-4 rounded animate-pulse">
                <div class="bg-gray-300 h-48 mb-4 rounded"></div>
                <div class="bg-gray-300 h-6 mb-2 rounded"></div>
                <div class="bg-gray-300 h-6 w-1/2 rounded"></div>
            </div>
            <!-- Ulangi div skeleton untuk efek loading -->
        </div>

        <?php
        $produkHtml = '';
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $namaBarang = htmlspecialchars($row["namaBarang"]);
                $gambar = htmlspecialchars($row["gambar"]);
                $harga = number_format($row["harga"], 0, ',', '.');
                
                $produkHtml .= <<<EOD
                <div class="bg-white p-4 rounded shadow">
                    <img src="assets/images/$gambar" alt="$namaBarang" class="w-full h-48 object-cover mb-4 rounded">
                    <h4 class="text-lg font-semibold text-red-600 mb-2">$namaBarang</h4>
                    <h5 class="text-md text-red-400 mb-4">Rp $harga,-</h5>
                    <div class="flex justify-center gap-2">
                        <a class="bg-green-500 text-white px-3 py-1 rounded text-sm" href="#">Detail</a>
                        <a class="bg-red-500 text-white px-3 py-1 rounded text-sm" href="?action=add&namaBarang=$namaBarang&harga={$row['harga']}&gambar=$gambar">Tambah ke Keranjang</a>
                    </div>
                </div>
                EOD;
            }
        } else {
            $produkHtml = "<p class='text-center'>Tidak ada produk tersedia.</p>";
        }
        $conn->close(); // Menutup koneksi
        ?>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const produkContainer = document.getElementById("produk-container");
            setTimeout(() => {
                produkContainer.innerHTML = ''; // Menghapus skeleton loading
                produkContainer.innerHTML += `<?php echo $produkHtml; ?>`;
            }, 2000); // Simulasi waktu loading 2 detik
        });
    </script>
</body>
</html>
