<?php
session_start();
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'projectpenjualan';
$table = 'contactus';

$conn = mysqli_connect($server, $username, $password, $database);

if (mysqli_connect_error()) {
    echo 'Database gagal terhubung: ' . mysqli_connect_error();
}

$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$pesan = $_REQUEST['pesan'];
$phone = $_REQUEST['phone'];

// Mengambil pelanggan ID dari sesi
if (isset($_SESSION['pelanggan_id'])) {
    $pelanggan_id = $_SESSION['pelanggan_id'];

    // Mencari pesanan ID berdasarkan pelanggan ID
    $sql = "SELECT id FROM pesanan WHERE pelanggan_id = $pelanggan_id";
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $pesanan_id = $row['id'];

        // Mencari pesanan user ID berdasarkan pesanan ID
        $sql = "SELECT id FROM pesananuser WHERE pesanan_id = $pesanan_id";
        $result = mysqli_query($conn, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $pesananUserID = $row['id'];

            // Penyisipan data ke dalam tabel contactus
            $insertData = "INSERT INTO $table (nama, email, phone, pesan, pesananUserID) VALUES ('$name', '$email', '$phone', '$pesan', $pesananUserID)";

            if (mysqli_query($conn, $insertData)) {
                // Data berhasil terinput, redirect ke halaman form.php setelah 3 detik
                echo '<script>
                        setTimeout(function(){
                            window.location.href = "form.php";
                        }, 3000);
                        alert("Data berhasil terinput");
                      </script>';
            } else {
                echo 'Data gagal terkirim: ' . mysqli_error($conn);
            }
        } else {
            echo 'Pesanan user tidak ditemukan';
        }
    } else {
        echo 'Pesanan tidak ditemukan';
    }
} else {
    echo 'Sesi pelanggan ID tidak ditemukan';
}

mysqli_close($conn);
?>
