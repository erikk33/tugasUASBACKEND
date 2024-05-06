<?php 
$server = "localhost";
$username = "root";
$password = "";
$database = "justinzthrift";

$conn = mysqli_connect($server,$username,$password,$database);
if (mysqli_connect_error()) {
    echo "db gagal terkoneksi ";
}
// else {
//     echo "db berhasil konek";
// }

function registrasi($data){
    global $conn;
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn,$data["password"]);
    $password2 = mysqli_real_escape_string($conn,$data["password2"]);
    
    //check username sudah ada atau belum duplikat
    $result = mysqli_query($conn,"SELECT username FROM user 
    WHERE username = '$username'");
    if(mysqli_fetch_assoc($result)){
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
    $password = password_hash($password,PASSWORD_DEFAULT);
  

    //tambahkan user baru ke db 
    mysqli_query($conn, "INSERT INTO user VALUES('','$username','$password')");
    
    return mysqli_affected_rows($conn);
}
?>