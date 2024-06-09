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
        // Periksa apakah sesi login dan rolenya sudah ditentukan 
        return isset($_SESSION['login']) && isset($_SESSION['role']);
    }

    public function redirectBasedOnRole() {
        // Jika pengguna telah login, periksa perannya
        if ($this->checkLogin()) {
            if ($_SESSION['role'] === 'admin') {
                header("Location: admin.php");
                exit;
            }
           
        } else {
            // nah yang terkahir Jika tidak ada sesi login, arahkan ke halaman login
            header("Location: ./halamanLogin/registrasiLogin.php");
            exit;
        }
    }
}

// Buat instance lagi dari AppSessionHandler
$sessionHandler = new AppSessionHandler();

// Periksa login dan lakukan redirect berdasarkan role
$sessionHandler->redirectBasedOnRole();


?>
<?php

include 'db_pembayaran.php'; // Include your database connection file

class Pengiriman {
    private $conn;
    private $pelanggan_id;

    public function __construct($db) {
        $this->conn = $db->conn;
        if (!isset($_SESSION['pelanggan_id'])) {
            die("Pelanggan tidak ditemukan.");
        }
        $this->pelanggan_id = $_SESSION['pelanggan_id'];
    }

    public function getPengirimanData() {
        // Fetch pesanan IDs for the pelanggan_id
        $sql = "SELECT id FROM pesanan WHERE pelanggan_id = $this->pelanggan_id";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $pesanan_ids = [];
            while ($row = $result->fetch_assoc()) {
                $pesanan_ids[] = $row['id'];
            }

            // Convert array to a comma-separated string for the SQL query
            $pesanan_ids_str = implode(",", $pesanan_ids);

            // Fetch pengiriman data for the pesanan IDs
            $sql = "SELECT metodePengiriman, statusPengiriman, tanggalKirim FROM pengiriman WHERE pesanan_id IN ($pesanan_ids_str)";
            return $this->conn->query($sql);
        } else {
            return false;
        }
    }
}

$database = new Database();
$pengiriman = new Pengiriman($database);
$pengiriman_result = $pengiriman->getPengirimanData();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Pengiriman</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-8">
        <h2 class="text-2xl font-bold text-red-600 mb-4">Status Pengiriman</h2>

        <div class="overflow-x-auto bg-white shadow-md rounded-lg mb-4">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-200 text-gray-600">
                    <tr>
                        <th class="w-1/3 py-3 px-4 text-left">Metode Pengiriman</th>
                        <th class="w-1/3 py-3 px-4 text-left">Status Pengiriman</th>
                        <th class="w-1/3 py-3 px-4 text-left">Tanggal Kirim</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    <?php if ($pengiriman_result && $pengiriman_result->num_rows > 0) { ?>
                        <?php while ($row = $pengiriman_result->fetch_assoc()) { ?>
                            <tr class="border-b">
                                <td class="py-3 px-4"><?php echo htmlspecialchars($row['metodePengiriman']); ?></td>
                                <td class="py-3 px-4"><?php echo htmlspecialchars($row['statusPengiriman']); ?></td>
                                <td class="py-3 px-4"><?php echo htmlspecialchars($row['tanggalKirim']); ?></td>
                            </tr>
                        <?php } ?>
                    <?php } else { ?>
                        <tr>
                            <td colspan="3" class="py-3 px-4 text-center">Tidak ada data pengiriman yang ditemukan.</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
