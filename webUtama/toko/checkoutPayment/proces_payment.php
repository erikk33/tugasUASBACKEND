<?php
session_start();
include 'dbPembayaran.php';

class PaymentProcessor {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function processPayment($pelanggan_id, $alamat, $metodePembayaran, $metodePengiriman, $totalHarga, $jumlahBarang) {
        $pesanan_id = $this->createOrder($pelanggan_id);
        $this->addOrderItems($pesanan_id, $jumlahBarang, $alamat);
        $this->createPayment($pesanan_id, $metodePembayaran, $totalHarga);
        $this->createShipment($pesanan_id, $metodePengiriman);

        return $pesanan_id;
    }

    private function createOrder($pelanggan_id) {
        $sql = "INSERT INTO pesanan (pelanggan_id) VALUES ($pelanggan_id)";
        if (!$this->conn->query($sql)) {
            die("Error inserting into pesanan: " . $this->conn->error);
        }
        return $this->conn->insert_id;
    }

    private function addOrderItems($pesanan_id, $items, $alamat) {
        foreach ($items as $namaBarang => $jumlah) {
            $sql = "INSERT INTO pesananuser (alamatUser, namaBarang, jumlahBarang, pesanan_id) VALUES ('$alamat', '$namaBarang', '$jumlah', $pesanan_id)";
            if (!$this->conn->query($sql)) {
                die("Error inserting into pesananuser: " . $this->conn->error);
            }
        }
    }

    private function createPayment($pesanan_id, $metodePembayaran, $totalHarga) {
        $sql = "INSERT INTO pembayaran (metodePembayaran, jumlahPembayaran, pesanan_id) VALUES ('$metodePembayaran', $totalHarga, $pesanan_id)";
        if (!$this->conn->query($sql)) {
            die("Error inserting into pembayaran: " . $this->conn->error);
        }
    }

    private function createShipment($pesanan_id, $metodePengiriman) {
        $statusPengiriman = 'Pending';
        $tanggalKirim = date('Y-m-d');
        $sql = "INSERT INTO pengiriman (metodePengiriman, statusPengiriman, tanggalKirim, pesanan_id) VALUES ('$metodePengiriman', '$statusPengiriman', '$tanggalKirim', $pesanan_id)";
        if (!$this->conn->query($sql)) {
            die("Error inserting into pengiriman: " . $this->conn->error);
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = new Database();
    $processor = new PaymentProcessor($db->conn);

    if (isset($_SESSION["pelanggan_id"]) && isset($_POST["alamat"])) {
        $pelanggan_id = $_SESSION["pelanggan_id"];
        $alamat = mysqli_real_escape_string($db->conn, $_POST["alamat"]);
        $metodePembayaran = $_POST['metodePembayaran'];
        $metodePengiriman = $_POST['metodePengiriman'];
        $totalHarga = isset($_POST['totalHarga']) ? $_POST['totalHarga'] : 0;
        $jumlahBarang = $_POST['jumlahBarang'];

        $pesanan_id = $processor->processPayment($pelanggan_id, $alamat, $metodePembayaran, $metodePengiriman, $totalHarga, $jumlahBarang);

        header("Location: succes.php");
        exit();
    } else {
        die("Invalid session or missing data.");
    }
}
?>
