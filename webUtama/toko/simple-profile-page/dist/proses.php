<?php
class Database {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "projectpenjualan";
    public $conn;

    public function __construct() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function updateAddress($pelanggan_id, $alamatPelanggan) {
        $alamatPelanggan = $this->conn->real_escape_string($alamatPelanggan);
        $sql = "UPDATE pelanggan SET alamatPelanggan='$alamatPelanggan' WHERE id='$pelanggan_id'";

        if ($this->conn->query($sql) === TRUE) {
            echo "<script>alert('Record updated successfully');</script>";
            echo "<script>window.location.href = 'index.php';</script>";
        } else {
            echo "Error updating record: " . $this->conn->error;
        }
    }

    public function __destruct() {
        $this->conn->close();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    if (isset($_SESSION["pelanggan_id"]) && isset($_POST["alamatPelanggan"])) {
        $pelanggan_id = $_SESSION["pelanggan_id"];
        $alamatPelanggan = $_POST["alamatPelanggan"];

        $database = new Database();
        $database->updateAddress($pelanggan_id, $alamatPelanggan);
    } else {
        echo "Pelanggan ID or Alamat Pelanggan is not set.";
    }
}
?>
