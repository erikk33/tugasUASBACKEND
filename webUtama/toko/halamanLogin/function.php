<?php
class Database {
    private $server = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "projectpenjualan";
    public $conn;

    public function __construct() {
        $this->conn = new mysqli($this->server, $this->username, $this->password, $this->database);
        if ($this->conn->connect_error) {
            die("DB gagal terkoneksi: " . $this->conn->connect_error);
        }
    }
}

class User {
    private $conn;

    public function __construct($db) {
        $this->conn = $db->conn;
    }

    public function registrasi($data) {
        $username = strtolower(stripslashes($data["username"]));
        $password = $this->conn->real_escape_string($data["password"]);
        $password2 = $this->conn->real_escape_string($data["password2"]);
        $namaPelanggan = $this->conn->real_escape_string($data["namaPelanggan"]);
        $alamatPelanggan = $this->conn->real_escape_string($data["alamatPelanggan"]);

        // Check username already exists
        $result = $this->conn->query("SELECT namaPengguna FROM pengguna WHERE namaPengguna = '$username'");
        if ($result->fetch_assoc()) {
            echo "<script>alert('Username sudah terdaftar!');</script>";
            return false;
        }

        // Confirm password
        if ($password !== $password2) {
            echo "<script>alert('Konfirmasi password tidak sesuai');</script>";
            return false;
        }

        // Encrypt password
        $password = password_hash($password, PASSWORD_DEFAULT);

        // Add customer data to db
        $this->conn->query("INSERT INTO pelanggan (namaPelanggan, alamatPelanggan) VALUES ('$namaPelanggan', '$alamatPelanggan')");
        $pelanggan_id = $this->conn->insert_id;

        // Add new user to db with role 'user'
        $this->conn->query("INSERT INTO pengguna (namaPengguna, kataSandi, role, pelanggan_id) VALUES ('$username', '$password', 'user', '$pelanggan_id')");
        
        return $this->conn->affected_rows;
    }

    public function login($username, $password, $remember) {
        // Special case for sim2 admin login
        if ($username == 'sim2' && $password == 'sim2') {
            $_SESSION["login"] = true;
            $_SESSION["role"] = 'admin';
            $_SESSION["pelanggan_id"] = 0;

            if ($remember) {
                setcookie('login', 'true', time() + 120);
            }

            header("Location: ../admin.php");
            exit;
        }

        $query = "SELECT * FROM pengguna WHERE namaPengguna = '$username'";
        $result = $this->conn->query($query);
        
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row["kataSandi"])) {
                $_SESSION["login"] = true;
                $_SESSION["role"] = $row["role"];
                $_SESSION["pelanggan_id"] = $row["pelanggan_id"];

                if ($remember) {
                    setcookie('login', 'true', time() + 120);
                }

                if ($row["role"] === "admin") {
                    header("Location: ../admin.php");
                } else {
                    header("Location: ../index.php");
                }
                exit;
            }
        }

        return false;
    }
}

$database = new Database();
$user = new User($database);
?>
