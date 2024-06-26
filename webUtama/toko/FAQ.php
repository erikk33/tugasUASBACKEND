<?php 
session_start();
// Jika tidak ada sesi login, arahkan ke halaman login
// if (!isset($_SESSION["login"])){
//   header("Location: ./halamanLogin/registrasiLogin.php");
//   exit;

  
// }

// Check if the user is logged in and has a role
if (isset($_SESSION['login']) && isset($_SESSION['role'])) {
    // If the role is 'user', redirect to admin.php
    if ($_SESSION['role'] === 'admin') {
        header("Location: admin.php");
        exit;
    }
} else {
    // If the user is not logged in, redirect to the login page
    header("Location: ./halamanLogin/registrasiLogin.php");
    exit;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
  <style>
    @keyframes shootEffect {
  0% {
    transform: translateX(0);
    opacity: 1;
  }
  50% {
    transform: translateX(50px);
    opacity: 0.8;
  }
  100% {
    transform: translateX(100px);
    opacity: 0;
  }
}

.back-button.shooting {
  animation: shootEffect 3s ease-in-out;
  transform: translateX(100px);
  opacity: 0;
}

  body {
      font-family: Arial, sans-serif;
      background-color: #f7f7f7;
      margin: 0;
      padding: 20px;
    }

    h1 {
      text-align: center;
      margin-bottom: 20px;
      color: #333;
    }

    .faq {
      margin-bottom: 20px;
      background-color: #fff;
      border-radius: 5px;
      padding: 15px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .question {
      font-weight: bold;
      cursor: pointer;
      color: #333;
      margin-bottom: 10px;
      transition: color 0.3s;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .question:hover {
      color: #e74c3c;
    }

    .question .icon {
      transition: transform 0.3s;
    }

    .question.active .icon {
      transform: rotate(180deg);
    }

    .answer {
      max-height: 0;
      overflow: hidden;
      transition: max-height 0.3s ease-out;
      color: #555;
    }

    .question.active + .answer {
      max-height: 500px;
      transition: max-height 0.3s ease-in;
    }

    .chat-bubble-container {
      position: fixed;
      bottom: 20px;
      right: 20px;
      z-index: 9999;
      animation: floatBubble 2s infinite ease-in-out;
    }

    .chat-bubble {
      display: flex;
      justify-content: center;
      align-items: center;
      width: 60px;
      height: 60px;
      background-color: #007bff;
      color: #ffffff;
      font-size: 24px;
      border-radius: 50%;
      cursor: pointer;
      box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
      animation: floatBubble 2s infinite ease-in-out;
    }

    @keyframes floatBubble {
      0% {
        transform: translateY(0);
      }
      50% {
        transform: translateY(-5px);
      }
      100% {
        transform: translateY(0);
      }
    }

    .chat-box {
      position: fixed;
      bottom: 20px;
      right: 20px;
      width: 300px;
      background-color: #ffffff;
      border-radius: 5px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
      overflow: hidden;
      display: none;
      z-index: 9999;
    }

    .chat-box-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 10px;
      background-color: #007bff;
      color: #ffffff;
      font-weight: bold;
      cursor: pointer;
    }

    .chat-box-body {
      padding: 10px;
      height: 200px;
      overflow-y: scroll;
    }

    .chat-box-footer {
      display: flex;
      align-items: center;
      padding: 10px;
    }

    .chat-input {
      flex: 1;
      border: none;
      border-radius: 3px;
      padding: 5px;
      margin-right: 10px;
    }

    .chat-send {
      border: none;
      background-color: #007bff;
      color: #ffffff;
      padding: 5px 10px;
      border-radius: 3px;
      cursor: pointer;
    }

    .chat-message {
      margin-bottom: 10px;
    }

    .sender {
      font-weight: bold;
    }

    .message {
      margin-top: 5px;
    }

    .hide {
      display: none;
    }
    .back-button {
  position: fixed;
  bottom: 20px;
  left: 20px; /* Mengubah right menjadi left */
  display: flex;
  align-items: center;
  background-color: #007bff;
  color: #ffffff;
  padding: 10px 15px;
  border-radius: 5px;
  cursor: pointer;
  box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
}


    .back-button .icon {
      margin-right: 10px;
      font-size: 20px;
    }
  </style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" crossorigin="anonymous">
  <script>
 window.onload = function () {
      const questions = document.getElementsByClassName("question");

      for (let i = 0; i < questions.length; i++) {
        questions[i].addEventListener("click", function () {
          this.classList.toggle("active");
          const answer = this.nextElementSibling;
          if (answer.style.maxHeight) {
            answer.style.maxHeight = null;
          } else {
            answer.style.maxHeight = answer.scrollHeight + "px";
          }
        });
      }

      const chatBubble = document.querySelector(".chat-bubble");
      const chatBox = document.querySelector(".chat-box");
      const chatInput = document.querySelector(".chat-input");
      const chatSend = document.querySelector(".chat-send");
      const chatBoxBody = document.querySelector(".chat-box-body");
      const chatBoxHeader = document.querySelector(".chat-box-header");

      chatBubble.addEventListener("click", function () {
        chatBox.style.display = "block";
        chatBubble.classList.add("hide");
      });

      chatBoxHeader.addEventListener("click", function () {
        chatBox.style.display = "none";
        chatBubble.classList.remove("hide");
      });

      chatSend.addEventListener("click", function () {
        const message = chatInput.value.trim();
        if (message !== "") {
          addChatMessage("User", message);
          chatInput.value = "";
        }
      });

      function addChatMessage(sender, message) {
        const chatMessage = document.createElement("div");
        chatMessage.classList.add("chat-message");

        const senderElement = document.createElement("div");
        senderElement.classList.add("sender");
        senderElement.textContent = sender + ":";

        const messageElement = document.createElement("div");
        messageElement.classList.add("message");
        messageElement.textContent = message;

        chatMessage.appendChild(senderElement);
        chatMessage.appendChild(messageElement);

        chatBoxBody.appendChild(chatMessage);

        // Scroll to the bottom of the chat box
        chatBoxBody.scrollTop = chatBoxBody.scrollHeight;
      }
    };
  </script>
  <style>
    body{
      margin: 20px;
      padding: 20px;
      background-color: #fcfcfc;
      color: #333333;
      transition: .5s;


    }
    input[type = "checkbox"]{
      position: relative;
      width: 40px;
      height: 20px;
      appearance: none;
      background-color:#434343;
      outline: none;
      border-radius: 10px;
      transition: .5s ease;
      cursor: pointer;



    }
    input[type = "checkbox"]{
      position: relative;
      width: 40px;
      height: 20px;
      appearance: none;
      background-color:#434343;
      outline: none;
      border-radius: 10px;
      transition: .5s ease;
      cursor: pointer;



    }
    input[type = "checkbox"]:checked{
     background-color: #3664ff;
    }

    input[type = "checkbox"]::before{
      content: '';
      position: absolute;
      width: 16px;
      height: 16px;
      background-color: #fcfcfc;
      border-radius: 50%;
      top: 2px;
      left: 2px;
      transition: .5s ease;

    }
    input[type="checkbox"]:checked::before{
      transform: translate(20px);
    }
    .dark {
      background-color: #333333;
      color: #fcfcfc;
      
    }
    h1 {
  color: white; /* Warna putih */
  text-shadow: 0 0 5px rgba(0, 0, 0, 0.5); /* Efek glowing berwarna hitam */
}

/*dark mode versi baru*/
#dark-mode-toggle {
  cursor: pointer;
}

#icon-img {
  width: 40px; /* Sesuaikan dengan ukuran ikon Anda */
  height: 40px; /* Sesuaikan dengan ukuran ikon Anda */
}

.dark-mode #icon-img {
  content: url('assets/logo/nighTmode.png'); /* Mengganti dengan URL gambar ikon dark mode */
}

/*dark mode versi baru endof style*/

  </style>
</head>
<body>
  <h1><span style="font-size: 2em;">Mode Dark/Light</span></h1>

  <p>Klik tombol dibawah ini untuk merubah tampilan gelap atau terang</p>
  <div class="popup-container">
    <div class="popup">
    <div id="dark-mode-toggle" onclick="toggleDarkMode()">
    <img src="assets/logo/lightMode.png" id="icon-img" alt="Light Mode Icon">
  </div>
      <p>Ini adalah konten popup.</p>
    </div>
  </div>
  
  
  
  
  <h1>FAQ - EXPRESS_STORE</h1>

  <div class="faq">
    <div class="question">Bagaimana cara melakukan pembelian? <i class="icon fas fa-chevron-down"></i></div>
    <div class="answer">
      Anda dapat melakukan pembelian dengan mengikuti langkah-langkah berikut:
      <ol>
        <li>Pilih produk yang ingin Anda beli dan tambahkan ke keranjang.</li>
        <li>Periksa kembali item yang ada di keranjang Anda dan klik tombol Checkout atau Lanjut ke Pembayaran.</li>
        <li>Isi informasi pengiriman yang diperlukan, seperti alamat pengiriman dan nomor telepon.</li>
        <li>Pilih metode pembayaran yang diinginkan, seperti transfer bank atau pembayaran melalui layanan pembayaran
          online.</li>
        <li>Konfirmasikan pesanan Anda dan lakukan pembayaran jika diperlukan.</li>
      </ol>
    </div>
  </div>

  <div class="faq">
    <div class="question">Apa keuntungan berbelanja di e-commerce?<i class="icon fas fa-chevron-down"></i></div>
    <div class="answer">Berbelanja di e-commerce memiliki beberapa keuntungan, antara lain:
      <ul>
        <li>Kemudahan akses: Anda dapat mengakses berbagai produk dan toko dari mana saja dan kapan saja.</li>
        <li>Pilihan yang lebih banyak: Anda dapat menemukan berbagai produk dengan beragam pilihan brand, ukuran, warna,
          dan sebagainya.</li>
        <li>Harga yang kompetitif: E-commerce sering kali menawarkan harga yang lebih kompetitif dibandingkan toko
          fisik.</li>
        <li>Beberapa metode pembayaran: Anda dapat memilih metode pembayaran yang nyaman bagi Anda, seperti transfer
          bank, kartu kredit, atau e-wallet.</li>
        <li>Pengiriman yang cepat: Banyak e-commerce yang menawarkan pengiriman cepat, bahkan dalam waktu 1-2 hari.</li>
      </ul>
    </div>
  </div>

  <div class="faq">
    <div class="question">Bagaimana cara mengembalikan atau menukar produk yang dibeli?<i class="icon fas fa-chevron-down"></i></div>
    <div class="answer">Setiap e-commerce memiliki kebijakan pengembalian atau penukaran yang berbeda-beda, tetapi
      umumnya langkah-langkahnya adalah sebagai berikut:
      <ol>
        <li>Hubungi layanan pelanggan e-commerce untuk meminta prosedur pengembalian atau penukaran.</li>
        <li>Pastikan Anda memiliki bukti pembelian dan informasi yang diperlukan, seperti nomor pesanan atau detail
          produk.</li>
        <li>Ikuti instruksi yang diberikan oleh e-commerce untuk mengirimkan produk yang ingin dikembalikan atau ditukar.
        </li>
        <li>Tunggu konfirmasi dan proses pengembalian atau penukaran dari e-commerce.</li>
      </ol>
      Pastikan untuk membaca kebijakan pengembalian atau penukaran dari e-commerce yang Anda beli agar memahami persyaratan
      dan batas waktu yang berlaku.
    </div>
  </div>

  <div class="faq">
    <div class="question">Apakah aman untuk berbelanja di e-commerce?<i class="icon fas fa-chevron-down"></i></div>
    <div class="answer">Berbelanja di e-commerce dapat aman jika Anda mengambil langkah-langkah pencegahan yang tepat,
      seperti:
      <ul>
        <li>Membeli dari toko online yang terpercaya dan terkenal.</li>
        <li>Memeriksa kebijakan keamanan dan privasi dari e-commerce tersebut.</li>
        <li>Menggunakan metode pembayaran yang aman dan terpercaya.</li>
        <li>Memeriksa apakah alamat website menggunakan protokol HTTPS.</li>
        <li>Menjaga keamanan akun dengan menggunakan password yang kuat dan tidak membagikan informasi pribadi dengan
          orang lain.</li>
      </ul>
      Selalu berhati-hati saat berbelanja online dan pastikan untuk mengikuti tautan yang aman serta menghindari penawaran
      yang terlalu bagus untuk menjadi kenyataan.
    </div>
  </div>

  <div class="back-button" onclick="goToTop()">
    <i class="icon fas fa-arrow-up"></i>
    <span>Back to Top</span>
  </div>
  

  <div class="chat-bubble-container">
    <div class="chat-bubble">
      <img src="images/pngwing.com.png"  style="width: 24px; height: 24px;" alt="Chat Logo">
      <i class="fas fa-comment"></i>
    </div>
  </div>

  <div class="chat-box">
    <div class="chat-box-header">
      <span>Chat with us</span>
      <i class="fas fa-times"></i>
    </div>
    <div class="chat-box-body">
      <div class="chat-message">
        <div class="sender">Assistant:</div>
        <div class="message">Hi! How can I assist you today?</div>
      </div>
    </div>
    <div class="chat-box-footer">
      <input type="text" class="chat-input" placeholder="Type your message...">
      <button class="chat-send">Send</button>
    </div>
  </div>

 

  <script>
    //night mode
    function toggleDarkMode() {
  document.body.classList.toggle('dark');
  const iconImg = document.getElementById('icon-img');
  if (document.body.classList.contains('dark')) {
    iconImg.src = 'assets/logo/nighTmode.png';
  } else {
    iconImg.src = 'assets/logo/lightMode.png';
  }
}

    //end of code night mode
    function goToTop() {
  window.scrollTo({ top: 0, behavior: 'smooth' });
  document.body.style.overflow = "hidden";
  setTimeout(function () {
    document.body.style.overflow = "auto";
  }, 3500);

  // Redirect to index.html
  setTimeout(function () {
    window.location.href = "index.php"; // Ganti dengan URL yang sesuai
  }, 500);

   // Add 'shooting' class to the back button
   document.querySelector(".back-button").classList.add("shooting");

// Remove 'shooting' class after the animation duration (3 seconds)
setTimeout(function () {
  document.querySelector(".back-button").classList.remove("shooting");
}, 3000);
}

    // ... (Existing Script) ...
    const backButtons = document.querySelectorAll(".back-button");

    backButtons.forEach(function (button) {
      button.addEventListener("click", function () {
        window.scrollTo({ top: 0, behavior: 'smooth' });
        document.body.style.overflow = "hidden";
        setTimeout(function () {
          document.body.style.overflow = "auto";
        }, 3500);
      });
    });
  </script>
</body>
</html>
