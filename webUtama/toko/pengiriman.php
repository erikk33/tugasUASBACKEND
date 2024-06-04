<?php 
session_start();

// Check if the user is logged in and has a role
if (isset($_SESSION['login']) && isset($_SESSION['role'])) {
    // If the role is 'user', redirect to index.php
    if ($_SESSION['role'] === 'user') {
        header("Location: index.php");
        exit;
    }
} else {
    // If the user is not logged in, redirect to the login page
    header("Location: ./halamanLogin/registrasiLogin.php");
    exit;
}

require 'functionPengiriman.php';

// Fetch data from the pengiriman table
$pengiriman = query("SELECT * FROM pengiriman");

// If the search button is pressed
if (isset($_POST["cari"])) {
    $pengiriman = cariPengiriman($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Pengiriman</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7H/PI1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <br><br>
    <h1>DAFTAR PENGIRIMAN</h1>
    <a href="halamanLogout/logout.php" class="logout">
        <button class="glitch-tombolkeluar">Logout</button>
    </a>

    <br><br>
    <form action="" method="post" class="pencarian-form">
        <div class="pencarian-input-wrapper">
            <input type="text" name="keyword" class="pencarian-input" size="40" autofocus placeholder="Masukkan keyword pencarian" autocomplete="off">
            <button type="submit" name="cari" class="pencarian-button">Cari !</button>
        </div>
    </form>

    <br>
    <table class="table table-striped table-dark">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Metode Pengiriman</th>
                <th scope="col">Status Pengiriman</th>
                <th scope="col">Tanggal Kirim</th>
                <th scope="col">Pesanan ID</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach($pengiriman as $row) : ?>
            <tr>
                <th scope="row"><?= $i ?></th>
                <td><?= $row["metodePengiriman"]; ?></td>
                <td><?= $row["statusPengiriman"]; ?></td>
                <td><?= $row["tanggalKirim"]; ?></td>
                <td><?= $row["pesanan_id"]; ?></td>
                <td>
                    <a href="ubahPengiriman.php?id=<?= $row["id"] ?>" class="edit-link">
                        <button class="edit-btn">Edit 
                            <svg class="edit-svg" viewBox="0 0 512 512">
                                <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"></path>
                            </svg>
                        </button>
                    </a>

                    <button class="custom-bin-button" onclick="return confirmDelete(<?= $row['id']; ?>)">
                        <svg
                            class="custom-bin-top"
                            viewBox="0 0 39 7"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <line y1="5" x2="39" y2="5" stroke="white" stroke-width="4"></line>
                            <line
                                x1="12"
                                y1="1.5"
                                x2="26.0357"
                                y2="1.5"
                                stroke="white"
                                stroke-width="3"
                            ></line>
                        </svg>
                        <svg
                            class="custom-bin-bottom"
                            viewBox="0 0 33 39"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <mask id="path-1-inside-1_8_19" fill="white">
                                <path
                                    d="M0 0H33V35C33 37.2091 31.2091 39 29 39H4C1.79086 39 0 37.2091 0 35V0Z"
                                ></path>
                            </mask>
                            <path
                                d="M0 0H33H0ZM37 35C37 39.4183 33.4183 43 29 43H4C-0.418278 43 -4 39.4183 -4 35H4H29H37ZM4 43C-0.418278 43 -4 39.4183 -4 35V0H4V35V43ZM37 0V35C37 39.4183 33.4183 43 29 43V35V0H37Z"
                                fill="white"
                                mask="url(#path-1-inside-1_8_19)"
                            ></path>
                            <path d="M12 6L12 29" stroke="white" stroke-width="4"></path>
                            <path d="M21 6V29" stroke="white" stroke-width="4"></path>
                        </svg>
                    </button>

                    <script>
                        function confirmDelete(id) {
                            if (confirm('Yakin menghapus data ini?')) {
                                window.location.href = 'hapusPengiriman.php?id=' + id;
                                return true;
                            }
                            return false;
                        }
                    </script>
                </td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
