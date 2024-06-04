<?php 
$server = "localhost";
$username = "root";
$password = "";
$database = "projectpenjualan";

$conn = mysqli_connect($server, $username, $password, $database);
if (mysqli_connect_error()) {
    echo "DB gagal terkoneksi";
}

function registrasi($data){
    global $conn;
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);
    $role = $data["role"];
    $namaPelanggan = mysqli_real_escape_string($conn, $data["namaPelanggan"]);
    $alamatPelanggan = mysqli_real_escape_string($conn, $data["alamatPelanggan"]);

    // Check username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT namaPengguna FROM pengguna WHERE namaPengguna = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
        alert('username sudah terdaftar!')
        </script>";
        return false;
    }

    // Konfirmasi password
    if ($password !== $password2) {
        echo "<script>
        alert('konfirmasi password tidak sesuai')
        </script>";
        return false;
    }

    // Enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Tambahkan data pelanggan ke db
    mysqli_query($conn, "INSERT INTO pelanggan (namaPelanggan, alamatPelanggan) VALUES ('$namaPelanggan', '$alamatPelanggan')");
    $pelanggan_id = mysqli_insert_id($conn);

    // Tambahkan user baru ke db
    mysqli_query($conn, "INSERT INTO pengguna (namaPengguna, kataSandi, role, pelanggan_id) VALUES ('$username', '$password', '$role', '$pelanggan_id')");
    
    return mysqli_affected_rows($conn);
}
?>
