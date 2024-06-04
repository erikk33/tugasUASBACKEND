<?php
// Database connection
$host = 'localhost';
$dbname = 'projectpenjualan';
$username = 'root';
$password = '';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to execute a query and return the result
function query($query) {
    global $conn;
    $result = $conn->query($query);
    $rows = [];
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    return $rows;
}

// Function to search in the pengiriman table
function cariPengiriman($keyword) {
    $query = "SELECT * FROM pengiriman
              WHERE 
              metodePengiriman LIKE '%$keyword%' OR
              statusPengiriman LIKE '%$keyword%' OR
              tanggalKirim LIKE '%$keyword%' OR
              pesanan_id LIKE '%$keyword%'";
    return query($query);
}

// Function to delete a pengiriman record
function hapusPengiriman($id) {
    global $conn;
    $query = "DELETE FROM pengiriman WHERE id = $id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
?>
