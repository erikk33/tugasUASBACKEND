<?php
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

$insertData = "INSERT INTO $table (nama, email, phone, pesan) VALUES ('$name', '$email','$phone','$pesan')";

if (mysqli_query($conn, $insertData)) {
    // Data berhasil terinput, redirect ke halaman form.php setelah 3 detik
    echo '<script>
            setTimeout(function(){
                window.location.href = "form.php";
            });
            alert("Data berhasil terinput");
          </script>';
} else {
    echo 'Data gagal terkirim: ' . mysqli_error($conn);
}

mysqli_close($conn);
?>
