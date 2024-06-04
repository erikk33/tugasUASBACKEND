<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Simple Profile Page</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <style>
    .skeleton {
      background: linear-gradient(90deg, rgba(165, 165, 165, 0.1) 25%, rgba(165, 165, 165, 0.3) 37%, rgba(165, 165, 165, 0.1) 63%);
      background-size: 400% 100%;
      animation: shimmer 1.4s ease infinite;
    }

    @keyframes shimmer {
      0% {
        background-position: 200% 0;
      }
      100% {
        background-position: -200% 0;
      }
    }
  </style>
</head>
<body class="bg-gray-100">

<div class="navbar-top bg-white shadow p-4 flex justify-between items-center">
    <h1 class="text-2xl font-semibold">Profile</h1>
    <ul class="flex space-x-4">
        <li><a href="#message" class="relative"><span class="icon-count absolute top-0 right-0 bg-red-500 text-white rounded-full text-xs w-6 h-6 flex items-center justify-center">29</span><i class="fa fa-envelope fa-2x text-gray-600"></i></a></li>
        <li><a href="#notification" class="relative"><span class="icon-count absolute top-0 right-0 bg-red-500 text-white rounded-full text-xs w-6 h-6 flex items-center justify-center">59</span><i class="fa fa-bell fa-2x text-gray-600"></i></a></li>
        <li><a href="/projectUASpenjualan/webUtama/toko/index.php"><i class="fa fa-sign-out-alt fa-2x text-gray-600"></i></a></li>
    </ul>
</div>

<div class="flex">
    <!-- Sidenav -->
    <div class="sidenav bg-white shadow p-4 w-64">
        <div class="profile text-center">
            <img src="https://imdezcode.files.wordpress.com/2020/02/imdezcode-logo.png" alt="" class="w-24 h-24 mx-auto rounded-full">
            <div class="name mt-4 text-xl font-semibold">ImDezCode</div>
            <div class="job text-gray-500">Web Developer</div>
        </div>

        <div class="sidenav-url mt-8">
            <div class="url">
                <a href="#profile" class="block py-2 text-lg text-blue-500">Profile</a>
                <hr class="border-gray-200">
            </div>
            <div class="url">
                <a href="#settings" class="block py-2 text-lg text-gray-700">Settings</a>
                <hr class="border-gray-200">
            </div>
        </div>
    </div>
    <!-- End Sidenav -->

    <!-- Main -->
    <div class="main flex-1 p-8">
        <h2 class="text-2xl font-semibold mb-4">IDENTITY</h2>
        <div class="card bg-white p-6 rounded shadow">
            <div class="card-body">
                <form action="proses.php" method="post">
                    <table class="w-full">
                        <tbody>
                            <tr>
                                <td class="py-2 px-4">Pelanggan ID</td>
                                <td class="py-2 px-4">:</td>
                                <td class="py-2 px-4 skeleton">
                                    <span id="pelanggan_id">
                                        <?php
                                        session_start();
                                        echo isset($_SESSION["pelanggan_id"]) ? $_SESSION["pelanggan_id"] : "[Autogenerated]";
                                        ?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2 px-4">Alamat</td>
                                <td class="py-2 px-4">:</td>
                                <td class="py-2 px-4"><input type="text" name="alamatPelanggan" id="alamat_pelanggan" class="border rounded w-full p-2" value="isi data alamat ini !!!"></td>
                            </tr>
                        </tbody>
                    </table>
                    <input type="submit" value="Submit" class="mt-4 bg-blue-500 text-white py-2 px-4 rounded cursor-pointer hover:bg-blue-600">
                </form>
            </div>
        </div>
    </div>
    <!-- End Main -->
</div>

<!-- FontAwesome 5 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script>

</body>
</html>
