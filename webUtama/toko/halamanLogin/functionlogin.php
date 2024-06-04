<?php 
$server = "localhost";
$username = "root";
$password = "";
$database = "projectpenjualan";

$conn = mysqli_connect($server, $username, $password, $database);
if (mysqli_connect_error()) {
    echo "db gagal terkoneksi ";
}

function registrasi($data) {
    global $conn;
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);
    $role = $data["role"];
    $namaPelanggan = mysqli_real_escape_string($conn, $data["namaPelanggan"]);
    $alamatPelanggan = mysqli_real_escape_string($conn, $data["alamatPelanggan"]);

    //check username sudah ada atau belum duplikat
    $result = mysqli_query($conn, "SELECT namaPengguna FROM pengguna WHERE namaPengguna = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
        alert('username sudah terdaftar!')
        </script> ";
        return false;
    }

    //konfirmasi password
    if ($password !== $password2) {
        echo "<script>
        alert('konfirmasi password tidak sesuai')
        </script>";
        return false;
    }

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Generate a random pelanggan_id
    $pelanggan_id = rand(1000, 9999);

    // Insert into pelanggan table
    mysqli_query($conn, "INSERT INTO pelanggan (id, namaPelanggan, alamatPelanggan) VALUES ('$pelanggan_id', '$namaPelanggan', '$alamatPelanggan')");

    //tambahkan user baru ke db 
    mysqli_query($conn, "INSERT INTO pengguna (namaPengguna, kataSandi, role, pelanggan_id) VALUES ('$username', '$password', '$role', '$pelanggan_id')");

    return mysqli_affected_rows($conn);
}
?>
