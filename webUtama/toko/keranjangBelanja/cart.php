<?php
include 'config.php';

$sql = "SELECT * FROM pesananuser";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-6">
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold mb-4">Keranjang Belanja</h1>
        <div class="bg-white shadow-md rounded-lg p-6">
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2">Nama Produk</th>
                        <th class="py-2">Harga</th>
                        <th class="py-2">Jumlah</th>
                        <th class="py-2">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td class='py-2 border-b'>" . $row['nama_produk'] . "</td>";
                            echo "<td class='py-2 border-b'>" . number_format($row['harga'], 0, ',', '.') . "</td>";
                            echo "<td class='py-2 border-b'>" . $row['jumlah'] . "</td>";
                            echo "<td class='py-2 border-b'>" . number_format($row['harga'] * $row['jumlah'], 0, ',', '.') . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4' class='py-2 text-center'>Keranjang belanja kosong</td></tr>";
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
