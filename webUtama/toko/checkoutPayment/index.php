<?php
session_start();



include 'dbPembayaran.php';

class User {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getUserName($pelanggan_id) {
        $sql = "SELECT namaPelanggan FROM pelanggan WHERE id = $pelanggan_id";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['namaPelanggan'];
        } else {
            die("Pelanggan tidak ditemukan.");
        }
    }
}

class Cart {
    public function getCartItems() {
        return isset($_SESSION['keranjang']) ? $_SESSION['keranjang'] : [];
    }

    public function getTotalPrice($keranjang) {
        return array_reduce($keranjang, function ($sum, $item) {
            return $sum + ($item['harga'] * $item['jumlah']);
        }, 0);
    }

    public function getTotalItems($keranjang) {
        return array_reduce($keranjang, function ($sum, $item) {
            return $sum + $item['jumlah'];
        }, 0);
    }
}

$db = new Database();
$user = new User($db->conn);
$cart = new Cart();

$keranjang = $cart->getCartItems();
$totalHarga = $cart->getTotalPrice($keranjang);
$jumlahBarang = $cart->getTotalItems($keranjang);

if (!isset($_SESSION['pelanggan_id'])) {
    die("Pelanggan tidak ditemukan.");
}

$pelanggan_id = $_SESSION['pelanggan_id'];
$namaPelanggan = $user->getUserName($pelanggan_id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-8">
        <h2 class="text-2xl font-bold text-red-600 mb-4">Pembayaran</h2>

        <div class="overflow-x-auto bg-white shadow-md rounded-lg mb-4">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-200 text-gray-600">
                    <tr>
                        <th class="w-1/3 py-3 px-4 text-left">Nama Barang</th>
                        <th class="w-1/6 py-3 px-4 text-left">Harga</th>
                        <th class="w-1/6 py-3 px-4 text-left">Jumlah</th>
                        <th class="w-1/6 py-3 px-4 text-left">Subtotal</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    <?php foreach ($keranjang as $item) { ?>
                        <tr class="border-b">
                            <td class="py-3 px-4"><?php echo htmlspecialchars($item['namaBarang']); ?></td>
                            <td class="py-3 px-4">Rp <?php echo number_format($item['harga'], 0, ',', '.'); ?>,-</td>
                            <td class="py-3 px-4"><?php echo htmlspecialchars($item['jumlah']); ?></td>
                            <td class="py-3 px-4">Rp <?php echo number_format($item['harga'] * $item['jumlah'], 0, ',', '.'); ?>,-</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <div class="mt-4 text-right">
            <p class="text-xl font-semibold">Total Harga: Rp <?php echo number_format($totalHarga, 0, ',', '.'); ?>,-</p>
        </div>

        <div class="mt-8">
            <h2 class="text-xl font-bold mb-4">Informasi Pembayaran</h2>
            <div class="bg-white p-4 shadow-md rounded-lg">
                <form action="proces_payment.php" method="post">
                    <?php foreach ($keranjang as $item): ?>
                        <input type="hidden" name="jumlahBarang[<?php echo $item['namaBarang']; ?>]" value="<?php echo $item['jumlah']; ?>">
                    <?php endforeach; ?>
                    <div class="mb-4">
                        <label class="block text-gray-700">Nama</label>
                        <input type="text" name="nama" value="<?php echo htmlspecialchars($namaPelanggan); ?>" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600" readonly>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Alamat</label>
                        <input type="text" name="alamat" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600" placeholder="Alamat Pengiriman" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Metode Pembayaran</label>
                        <select name="metodePembayaran" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600" required>
                            <option value="gopay">GoPay</option>
                            <option value="mandiri">Mandiri</option>
                            <option value="shopeepay">ShopeePay</option>
                            <option value="dana">DANA</option>
                            <option value="ovo">OVO</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Metode Pengiriman</label>
                        <select name="metodePengiriman" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600" required>
                            <optgroup label="Pengiriman Reguler">
                                <option value="j&t express">J&T Express</option>
                                <option value="spx express">SPX Express</option>
                                <option value="jnt express">JNT Express</option>
                            </optgroup>
                            <optgroup label="Pengiriman Instan">
                                <option value="grab express">Grab Express</option>
                                <option value="gojek instant courier">Gojek Instant Courier</option>
                            </optgroup>
                        </select>
                    </div>
                    <input type="hidden" name="totalHarga" value="<?php echo $totalHarga; ?>"> <!-- Input hidden untuk total harga -->
                    <div class="mt-6 text-right">
                        <button type="submit" class="px-4 py-2 bg-purple-500 text-white rounded hover:bg-purple-600">Pay Rp <?php echo number_format($totalHarga, 0, ',', '.'); ?>,-</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
