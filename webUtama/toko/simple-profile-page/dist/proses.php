<?php
// Establish connection to database
$servername = "localhost";
$username = "root";  // use your database username
$password = "";      // use your database password
$dbname = "projectpenjualan";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// If the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    if (isset($_SESSION["pelanggan_id"]) && isset($_POST["alamatPelanggan"])) {
        $pelanggan_id = $_SESSION["pelanggan_id"];
        $alamatPelanggan = mysqli_real_escape_string($conn, $_POST["alamatPelanggan"]);

        // Update pelanggan data
        $sql = "UPDATE pelanggan SET alamatPelanggan='$alamatPelanggan' WHERE id='$pelanggan_id'";

        if ($conn->query($sql) === TRUE) {
            // Memanggil fungsi JavaScript untuk menampilkan pemberitahuan
    echo "<script>alert('Record updated successfully');</script>";
    // Mengarahkan ke halaman index.php setelah pemberitahuan ditampilkan
    echo "<script>window.location.href = 'index.php';</script>";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        echo "Pelanggan ID or Alamat Pelanggan is not set.";
    }
}

$conn->close();
?>
