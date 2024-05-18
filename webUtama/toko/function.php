<?php
//koneksi ke database
$conn = mysqli_connect("localhost", "root","","projectpenjualan");
function query($query) {
    global $conn;
    $result = mysqli_query($conn,$query);
    $row = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}




function tambah($data) {
    global $conn;
     $namabarang = htmlspecialchars($data["namaBarang"]);
     $jenisBarang = htmlspecialchars ($data["jenisBarang"]);
     $jumlahBarang = htmlspecialchars($data["jumlahBarang"]);
 
     $query = "INSERT INTO stockbarang(namaBarang, jenisBarang, jumlahBarang) VALUES ('$namabarang', '$jenisBarang', '$jumlahBarang')";

     mysqli_query($conn,$query);

     return mysqli_affected_rows($conn);
}

function hapus ($id) {
    global $conn;
    mysqli_query($conn,"DELETE FROM stockbarang WHERE id=$id");

    return mysqli_affected_rows($conn);
}
?>