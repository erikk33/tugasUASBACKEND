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
     $harga = htmlspecialchars($data["harga"]);
     // Uploud gambar
     $gambar = upload();
     if (!$gambar) {
        return false;
     }
 
     $query = "INSERT INTO stockbarang (namaBarang, jenisBarang, jumlahBarang, harga, gambar) VALUES ('$namabarang', '$jenisBarang', '$jumlahBarang', '$harga','$gambar')";

     mysqli_query($conn,$query);

     return mysqli_affected_rows($conn);
}

function upload() {
   $namaFile = $_FILES['gambar']['name'];
   $ukuranFile = $_FILES['gambar']['size'];
   $error = $_FILES['gambar']['error'];
   $tmpName = $_FILES['gambar']['tmp_name'];

   if ($error === 4) {
    echo "<script>
    alert('Pilih gambar terlebih dahulu !');
    </script>";
    return false;
   }

   //cek apakah yang diupload adalah gambar
   $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
   $ekstensiGambar = explode('.',$namaFile);
   $ekstensiGambar = strtolower(end($ekstensiGambar));
   if(!in_array($ekstensiGambar,$ekstensiGambarValid)) {
    echo "<script>
    alert('Yang anda uploud bukan gambar !');
    </script>";
    return false;
   }

   //cek jika ukurannya terlalu besar 
   if ($ukuranFile > 1000000) {
    echo "<script>
    alert('Ukuran gambar terlalu besar !');
    </script>";
    return false;
   }

   //lolos pengecekan, gambar siap diupload
   //generate nama gambar baru 
   $namaFileBaru = uniqid();
   $namaFileBaru .= '.';
   $namaFileBaru .= $ekstensiGambar;
   move_uploaded_file($tmpName,'assets/images/' . $namaFileBaru);
   return $namaFileBaru;


}
function hapus ($id) {
    global $conn;
    mysqli_query($conn,"DELETE FROM stockbarang WHERE id=$id");

    return mysqli_affected_rows($conn);
}


function ubah ($data) {
    global $conn;
    $id = $data["id"];
    $namabarang = htmlspecialchars($data["namaBarang"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);
    $jenisBarang = htmlspecialchars($data["jenisBarang"]);
    $jumlahBarang = htmlspecialchars($data["jumlahBarang"]);
    $harga = htmlspecialchars($data["harga"]);

    //cek apakah user pilih gambar baru atau tidak
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    }
    else {
        $gambar = upload();
    }
    // $gambar = htmlspecialchars($data["gambar"]);
    $query = "UPDATE stockbarang SET 
    namaBarang = '$namabarang',
    gambar = '$gambar',
    jenisBarang =   '$jenisBarang',
    jumlahBarang = '$jumlahBarang',
    harga = '$harga'
    WHERE id = $id;
    ";

    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}

function cari($keyword) {
    $query = "SELECT * FROM stockbarang
    WHERE 
    namaBarang LIKE '%$keyword%' OR
    jenisBarang LIKE '%$keyword%' OR
    jumlahBarang LIKE '%$keyword%'
    ";

    return query($query);
}
?>