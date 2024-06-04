<?php 
// Config pendaftaran account
require 'function.php';

session_start();

if (isset($_POST["register"])) {
    if (registrasi($_POST) > 0) {
        echo "<script>
        alert('User baru berhasil ditambahkan !'); 
        </script>";
    } else {
        echo mysqli_error($conn);
    }
}

// Jika session login sudah diset, redirect langsung ke halaman index.php
if (isset($_SESSION["login"]) && $_SESSION["login"] === true) {
    header("Location: ../index.php");
    exit;
}

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $role = $_POST["role"];

    // Query untuk memeriksa apakah username dan role cocok
    $query = "SELECT * FROM pengguna WHERE namaPengguna = '$username' AND role = '$role'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["kataSandi"])) {
            $_SESSION["login"] = true;
            $_SESSION["role"] = $row["role"];
            $_SESSION["pelanggan_id"] = $row["pelanggan_id"];

            // Cek remember me
            if (isset($_POST['remember'])) {
                // Buat cookie
                setcookie('login', 'true', time() + 120);
            }

            // Redirect based on role
            if ($row["role"] === "admin") {
                header("Location: ../admin.php");
            } else {
                header("Location: ../index.php");
            }
            exit;
        }
    }

    $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

    <meta charset="UTF-8" />
    <meta name="description" content=" Today in this blog you will learn how to create a responsive Login & Registration Form in HTML CSS & JavaScript. The blog will cover everything from the basics of creating a Login & Registration in HTML, to styling it with CSS and adding with JavaScript." />
    <meta name="keywords" content="Animated Login & Registration Form,Form Design,HTML and CSS,HTML CSS JavaScript,login & registration form,login & signup form,Login Form Design,registration form,Signup Form,HTML,CSS,JavaScript," />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login & Signup Form HTML CSS | CodingNepal</title>
    <link rel="stylesheet" href="style.css" />
    <script src="../custom-scripts.js" defer></script>
</head>

<body>
    <section class="wrapper">
        <div class="form signup">
            <form class="container-fluid justify-content-start"></form>
            <header>Signup</header>
            <form action="" method="post">
                <input type="text" name="username" placeholder="Username" required />
                <input type="password" name="password" placeholder="Password" required />
                <input type="password" name="password2" placeholder="Konfirmasi Password" required />
                <input type="text" name="namaPelanggan" placeholder="Nama Pelanggan" required />
                <input type="text" name="alamatPelanggan" placeholder="Alamat Pelanggan" required />
                <div class="dropdown">
                    <select name="role" id="roleSelect" required>
                        <option value="">Select Role</option>
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                <input type="submit" value="Signup" name="register" />
                <button class="btn btn-light" onclick="window.location.href='../index.php'" type="button">Home</button>
            </form>
        </div>

        <?php if (isset($error)) : ?>
            <p style="color: red; font-style: italic;">Username atau password salah</p>
        <?php endif;?>

        <div class="form login">
            <header>Login</header>
            <form action="" method="post">
                <input type="text" name="username" placeholder="username" required />
                <input type="password" name="password" placeholder="Password" required />
                <div class="dropdown">
                    <select name="role" id="roleSelect" required>
                        <option value="">Select Role</option>
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                <div class="checkbox">
                    <input type="checkbox" name="remember" id="remember" />
                    <label for="remember" style="color: black;">remember me</label>
                </div>
                <input type="submit" name="login" value="Login" />
                <button class="btn btn-light" onclick="window.location.href='../index.php'" type="button">Home</button>
            </form>
        </div>

        <script>
            const wrapper = document.querySelector(".wrapper"),
                signupHeader = document.querySelector(".signup header"),
                loginHeader = document.querySelector(".login header");

            loginHeader.addEventListener("click", () => {
                wrapper.classList.add("active");
            });
            signupHeader.addEventListener("click", () => {
                wrapper.classList.remove("active");
            });
        </script>
    </section>
</body>
</html>
