<?php 
session_start();
// Jika tidak ada sesi login, arahkan ke halaman login
// if (!isset($_SESSION["login"])){
//   header("Location: ./halamanLogin/registrasiLogin.php");
//   exit;

  
// }

// Check if the user is logged in and has a role
if (isset($_SESSION['login']) && isset($_SESSION['role'])) {
    // If the role is 'user', redirect to admin.php
  
    if ($_SESSION['role'] === 'user') {
      header("Location: index.php");
      exit;
  }
  
} else {
    // If the user is not logged in, redirect to the login page
    header("Location: ./halamanLogin/registrasiLogin.php");
    exit;
}


?>
<?php
require 'functionPengiriman.php';

// Get the ID from the URL
$id = $_GET["id"];

// Fetch the data for the specific shipment based on ID
$pengiriman = query("SELECT * FROM pengiriman WHERE id = $id")[0];

// Check if the submit button has been pressed
if (isset($_POST["submit"])) {
    // Check if the data was successfully updated
    if (ubahPengiriman($_POST) > 0) {
        echo "
        <script>
        alert('Data berhasil diubah!');
        document.location.href = 'pengiriman.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Data gagal diubah!');
        document.location.href = 'pengiriman.php';
        </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Pengiriman</title>
    <link rel="stylesheet" href="stylePengiriman.css">
</head>
<body>
    <h1 style="text-align: center;">Ubah Data Pengiriman</h1>
    <br>
    <br>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $pengiriman["id"] ?>">
        <ul>
            <li>
                <label for="metodePengiriman">Metode Pengiriman</label>
                <input type="text" name="metodePengiriman" id="metodePengiriman" required value="<?= $pengiriman["metodePengiriman"]; ?>">
            </li>
            <li>
                <label for="statusPengiriman">Status Pengiriman</label>
                <input type="text" name="statusPengiriman" id="statusPengiriman" required value="<?= $pengiriman["statusPengiriman"]; ?>">
            </li>
            <li>
                <label for="tanggalKirim">Tanggal Kirim</label>
                <input type="date" name="tanggalKirim" id="tanggalKirim" required value="<?= $pengiriman["tanggalKirim"]; ?>">
            </li>
            <li>
                <label for="pesanan_id">Pesanan ID</label>
                <input disabled type="text" id="pesanan_id" value="<?= $pengiriman["pesanan_id"]; ?>">
            </li>
            <li>
                <button type="submit" name="submit">Ubah Data!</button>
            </li>
        </ul>
    </form>
</body>
</html>

<?php
// Update function
function ubahPengiriman($data) {
    global $conn;

    $id = htmlspecialchars($data["id"]);
    $metodePengiriman = htmlspecialchars($data["metodePengiriman"]);
    $statusPengiriman = htmlspecialchars($data["statusPengiriman"]);
    $tanggalKirim = htmlspecialchars($data["tanggalKirim"]);

    $query = "UPDATE pengiriman SET
                metodePengiriman = '$metodePengiriman',
                statusPengiriman = '$statusPengiriman',
                tanggalKirim = '$tanggalKirim'
              WHERE id = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
?>
