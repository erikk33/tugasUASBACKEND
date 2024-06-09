<?php
session_start();

// Definisikan kelas AppSessionHandler di dalam file ini
class AppSessionHandler {
    public function __construct() {
        // Pastikan sesi telah dimulai
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function checkLogin() {
        // Periksa apakah sesi login dan role telah di-set
        return isset($_SESSION['login']) && isset($_SESSION['role']);
    }

    public function redirectBasedOnRole() {
        // Jika pengguna telah login, periksa perannya
        if ($this->checkLogin()) {
            if ($_SESSION['role'] === 'admin') {
                header("Location: admin.php");
                exit;
            }
            // Tambahkan logika tambahan untuk peran lain jika diperlukan
        } else {
            // Jika tidak ada sesi login, arahkan ke halaman login
            header("Location: ./halamanLogin/registrasiLogin.php");
            exit;
        }
    }
}

// Buat instance dari AppSessionHandler
$sessionHandler = new AppSessionHandler();

// Periksa login dan lakukan redirect berdasarkan role
$sessionHandler->redirectBasedOnRole();



?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>express_store</title>

    <link rel="shortcut icon" type="image/icon" href="assets/logo/favicon.png" />

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&amp;subset=devanagari,latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/bootsnav.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">

    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
	<style>
		button {
  font-family: inherit;
  font-size: 20px;
  background: royalblue;
  color: white;
  padding: 0.7em 1em;
  padding-left: 0.9em;
  display: flex;
  align-items: center;
  border: none;
  border-radius: 16px;
  overflow: hidden;
  transition: all 0.2s;
  cursor: pointer;
}

button span {
  display: block;
  margin-left: 0.3em;
  transition: all 0.3s ease-in-out;
}

button svg {
  display: block;
  transform-origin: center center;
  transition: transform 0.3s ease-in-out;
}

button:hover .svg-wrapper {
  animation: fly-1 0.6s ease-in-out infinite alternate;
}

button:hover svg {
  transform: translateX(1.2em) rotate(45deg) scale(1.1);
}

button:hover span {
  transform: translateX(5em);
}

button:active {
  transform: scale(0.95);
}

@keyframes fly-1 {
  from {
    transform: translateY(0.1em);
  }

  to {
    transform: translateY(-0.1em);
  }
}

body{
				margin: 20px;
				padding: 20px;
				background-color: #fcfcfc;
				color: #333333;
				transition: .5s;

			}
			input[type="checkbox"]{
				position: relative;
				width: 40px;
				height: 20px;
				appearance: none;
				background-color: #434343;
				outline: none;
				border-radius: 10px;
				transition: .5s ease;
				cursor: pointer;
			}
			input[type="checkbox"]:checked{
				background-color: #3664ff;
			}
			input[type="checkbox"]::before{
				content: '';
				position: absolute;
				width: 16 px;
				height: 16 px;
				background-color: #fcfcfc;
				border-radius: 50%;
				top: 2px;
				left: 2px;
				transition: .5s ease;
			}
			input[type="checkbox"]:checked::before{
				transform: translate(20px);
			}
			.dark{
				background-color: #333333;
				color: #fcfcfc;
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
    <!--[if lte IE 9]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
    <![endif]-->

    <header class="top-area">
        <div class="header-area">
            <nav class="navbar navbar-default bootsnav navbar-fixed dark no-background">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                            <i class="fa fa-bars"></i>
                        </button>
                        <a class="navbar-brand" href="index.php">express_store</a>
                    </div>
                    <div class="collapse navbar-collapse menu-ui-design" id="navbar-menu">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a class="navbar-brand" href="index.php">Home</a></li>
                            <li><a class="navbar-brand" href="FAQ.php">Faq</a></li>
							<li><a class="navbar-brand" href="form.php">Contact Us</a></li>
                            <li><a class="navbar-brand" href="index.php">Help</a></li>
                            <li><a class="navbar-brand" href="halamanLogin/index.php">Login/Register</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="clearfix"></div>
    </header>

    <section id="contact" class="contact">
        <div class="section-heading text-center">
            <h2>contact me</h2>
        </div>
        <div class="container">
        <h1>Mode Dark</h1>
    <p>Klik tombol dibawah ini untuk merubah tampilan gelap atau terang</p>
  <div class="popup-container">
    <div class="popup">
    <div id="dark-mode-toggle" onclick="toggleDarkMode()">
    <img src="assets/logo/lightMode.png" id="icon-img" alt="Light Mode Icon">
  </div>
      <p>Ini adalah konten popup.</p>
    </div>
  </div>
            <div class="contact-content">
                <div class="row">
                    <div class="col-md-offset-1 col-md-5 col-sm-6">
                        <div class="single-contact-box">
                            <div class="contact-form">
                                <form action="conn.php" method="post" id="contact-form">
                                    <div class="row">
                                        <div class="col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="name" placeholder="name" name="name">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <input required type="email" class="form-control" id="email" placeholder="email" name="email" >
                                            </div>
                                        </div>
                                    </div>
                                  
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <input required type="text" class="form-control" id="phone" placeholder="phone" name="phone">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <textarea required class="form-control" rows="8" id="pesan" placeholder="pesan" name="pesan"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
									<button>
  <div class="svg-wrapper-1">
    <div class="svg-wrapper">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 24 24"
        width="24"
        height="24"
      >
        <path fill="none" d="M0 0h24v24H0z"></path>
        <path
          fill="currentColor"
          d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z"
        ></path>
      </svg>
    </div>
  </div>
  <span>Send</span>
</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-offset-1 col-md-5 col-sm-6">
                        <div class="single-contact-box">
                            <div class="contact-adress">
                                <div class="contact-add-head">
                                    <h3>express_store</h3>
                                    <p></p>
                                </div>
                                <div class="contact-add-info">
                                    <div class="single-contact-add-info">
                                        <h3>phone</h3>
                                        <p>987-123-6547</p>
                                    </div>
                                    <div class="single-contact-add-info">
                                        <h3>email</h3>
                                        <p>browny@info.com</p>
                                    </div>
                                    <div class="single-contact-add-info">
                                        <h3>website</h3>
                                        <p>www.brownsine.com</p>
                                    </div>
                                </div>
                            </div>
                            <div class="hm-foot-icon">
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer id="footer-copyright" class="footer-copyright">
        <div class="container">
            <div class="hm-footer-copyright text-center">
                <p>
                    &copy; copyright yourname. design and developed by <a href="https://www.themesine.com/">themesine</a>
                </p>
            </div>
        </div>
        <div id="scroll-Top">
            <div class="return-to-top">
                <i class="fa fa-angle-up " id="scroll-top"></i>
            </div>
        </div>
    </footer>

    <script src="assets/js/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="assets/js/custom.js"></script>


	
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
	</script>
</body>

</html>

