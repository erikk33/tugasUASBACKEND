<?php
session_start();

// Check if the user is logged in and has a role
if (isset($_SESSION['login']) && isset($_SESSION['role'])) {
    // If the role is 'user', redirect to index.php
    if ($_SESSION['role'] === 'user') {
        header("Location: index.php");
        exit;
    }
} else {
    // If the user is not logged in, redirect to the login page
    header("Location: ./halamanLogin/registrasiLogin.php");
    exit;
}

require 'functionPengiriman.php';

$id = $_GET['id'];

if (hapusPengiriman($id) > 0) {
    echo "
    <script>
    alert('Data berhasil dihapus!');
    document.location.href = 'pengiriman.php';
    </script>
    ";
} else {
    echo "
    <script>
    alert('Data gagal dihapus!');
    document.location.href = 'pengiriman.php';
    </script>
    ";
}
?>
