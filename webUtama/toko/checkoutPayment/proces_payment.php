<?php
session_start();
include 'dbPembayaran.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mendapatkan data dari formulir pembayaran
    if (isset($_SESSION["pelanggan_id"]) && isset($_POST["alamat"])) {
        $pelanggan_id = $_SESSION["pelanggan_id"];
        $alamat = mysqli_real_escape_string($conn, $_POST["alamat"]);
        $metodePembayaran = $_POST['metodePembayaran'];
        $metodePengiriman = $_POST['metodePengiriman'];
        $totalHarga = isset($_POST['totalHarga']) ? $_POST['totalHarga'] : 0;

        // Insert into pesanan table
        $sql = "INSERT INTO pesanan (pelanggan_id) VALUES ($pelanggan_id)";
        if (!$conn->query($sql)) {
            die("Error inserting into pesanan: " . $conn->error);
        }
        // Dapatkan ID pesanan terakhir yang dimasukkan
        $pesanan_id = $conn->insert_id;
        echo "Pesanan ID: $pesanan_id"; // Output untuk memeriksa nilai $pesanan_id

        // Insert into pesananuser table for each item
        foreach ($_POST['jumlahBarang'] as $namaBarang => $jumlah) {
            $sql = "INSERT INTO pesananuser (alamatUser, namaBarang, jumlahBarang, pesanan_id) VALUES ('$alamat', '$namaBarang', '$jumlah', $pesanan_id)";
            if (!$conn->query($sql)) {
                die("Error inserting into pesananuser: " . $conn->error);
            }
        }

        // Insert into pembayaran table
        $sql = "INSERT INTO pembayaran (metodePembayaran, jumlahPembayaran, pesanan_id) VALUES ('$metodePembayaran', $totalHarga, $pesanan_id)";
        if (!$conn->query($sql)) {
            die("Error inserting into pembayaran: " . $conn->error);
        }

        // Insert into pengiriman table
        $statusPengiriman = 'Pending'; // Example status
        $tanggalKirim = date('Y-m-d'); // Today's date as the shipping date
        $sql = "INSERT INTO pengiriman (metodePengiriman, statusPengiriman, tanggalKirim, pesanan_id) VALUES ('$metodePengiriman', '$statusPengiriman', '$tanggalKirim', $pesanan_id)";
        if (!$conn->query($sql)) {
            die("Error inserting into pengiriman: " . $conn->error);
        }

        // Redirect to a success page
        header("Location: succes.php");
        exit();
    } else {
        die("Invalid session or missing data.");
    }
}
?>
