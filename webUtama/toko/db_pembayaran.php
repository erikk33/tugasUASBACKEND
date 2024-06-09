<?php
class Database {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "projectpenjualan";
    public $conn;

    public function __construct() {
        // Membuat koneksi ke database
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        // Memeriksa koneksi
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }

        // Mengatur charset ke utf8
        if (!$this->conn->set_charset("utf8mb4")) {
            printf("Error loading character set utf8mb4: %s\n", $this->conn->error);
            exit();
        }
    }
}
?>
