<?php
session_start();
require 'function.php';

// Check if user is logged in
if (!isset($_SESSION["login"]) || $_SESSION["login"] !== true) {
    echo "Unauthorized access!";
    exit;
}

// Fetch the user ID from session
$pelanggan_id = $_SESSION["pelanggan_id"];

// Fetch shipment status from the database
$query = "SELECT * FROM pengiriman WHERE pesanan_id IN (SELECT id FROM pesanan WHERE pelanggan_id = $pelanggan_id)";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    echo '<table class="table">';
    echo '<thead><tr><th>Metode Pengiriman</th><th>Status Pengiriman</th><th>Tanggal Kirim</th></tr></thead>';
    echo '<tbody>';
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($row["metodePengiriman"]) . '</td>';
        echo '<td>' . htmlspecialchars($row["statusPengiriman"]) . '</td>';
        echo '<td>' . htmlspecialchars($row["tanggalKirim"]) . '</td>';
        echo '</tr>';
    }
    echo '</tbody></table>';
} else {
    echo 'No shipment status available.';
}
?>
