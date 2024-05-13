<?php 
session_start();
// Jika tidak ada sesi login, arahkan ke halaman login
if (!isset($_SESSION["login"])){
  header("Location: ./halamanLogin/registrasiLogin.php");
  exit;
}


?>
<!doctype html>
<html class="no-js" lang="en">

    <head>
        <!-- meta data -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <!--font-family-->
		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&amp;subset=devanagari,latin-ext" rel="stylesheet">
        
        <!-- title of site -->
        <title>express_store</title>

        <!-- For favicon png -->
		<link rel="shortcut icon" type="image/icon" href="assets/logo/favicon.png"/>
       
        <!--font-awesome.min.css-->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">

		<!--flat icon css-->
		<link rel="stylesheet" href="assets/css/flaticon.css">

		<!--animate.css-->
        <link rel="stylesheet" href="assets/css/animate.css">

        <!--owl.carousel.css-->
        <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
		<link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
		
        <!--bootstrap.min.css-->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- bootsnav -->
		<link rel="stylesheet" href="assets/css/bootsnav.css" >	
        
        <!--style.css-->
        <link rel="stylesheet" href="assets/css/style.css">
        
        <!--responsive.css-->
        <link rel="stylesheet" href="assets/css/responsive.css">
        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		
        <!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]--> 
		<style>
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
    </head>
	
	<body >
		<h1>Mode Dark</h1>
		<p>Klik tombol dibawah ini untuk merubah tampilan gelap atau terang</p>
		<div class="popup-container">
		  <div class="popup">
		  <div id="dark-mode-toggle" onclick="toggleDarkMode()">
		  <img src="assets/logo/lightMode.png" id="icon-img" alt="Light Mode Icon">
		</div>
			<!-- <p>Ini adalah konten popup.</p> -->
		  </div>
		</div>
		
		<!-- top-area Start -->
		<header class="top-area">
			<div class="header-area">
				<!-- Start Navigation -->
			    <nav class="navbar navbar-default bootsnav navbar-fixed dark no-background">

			        <div class="container">

			            <!-- Start Header Navigation -->
			            <div class="navbar-header">
			                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
			                    <i class="fa fa-bars"></i>
			                </button>
			                <a class="navbar-brand" href="index.php">express_store</a>
			            </div><!--/.navbar-header-->
			            <!-- End Header Navigation -->

			            <!-- Collect the nav links, forms, and other content for toggling -->
			            <div class="collapse navbar-collapse menu-ui-design" id="navbar-menu">
			                <ul class="nav navbar-nav navbar-right" >
			                <li class=" smooth-menu active"></li>
							<li><a class="navbar-brand" href="index.php">Home</a></li>
			                <li><a class="navbar-brand" href="FAQ.html">Faq</a></li>
							<li><a class="navbar-brand" href="form.php">Contact Us</a></li>
							<li><a class="navbar-brand" href="index.php">Help</a></li>
						    <li><a class="navbar-brand" href="halamanLogin/index.php">Login/Register</a></li>
							<li><a class="navbar-brand" href="halamanLogout/logout.php">Logout</a></li>
			                    <!-- <li class="smooth-menu"><a href="">profile</a></li> -->
			                    <!-- <li class="smooth-menu"><a href="#portfolio">portfolio</a></li>
			                    <li class="smooth-menu"><a href="#clients">clients</a></li>
			                    <li class="smooth-menu"><a href="#contact">contact</a></li> -->
			                </ul><!--/.nav -->
			            </div><!-- /.navbar-collapse -->
			        </div><!--/.container-->
			    </nav><!--/nav-->
			    <!-- End Navigation -->
			</div><!--/.header-area-->

		    <div class="clearfix"></div>

		</header><!-- /.top-area-->
		<!-- top-area End -->
	
		<!--welcome-hero start -->
		<section id="welcome-hero" class="welcome-hero">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<div class="header-text">
							<h2>hi <span>,</span> Welcome To <br>express_store<br><span></span>   </h2>
							<p>Always Cheap price & Good Quality</p>
							<!-- <a href="assets/download/browney.txt" download>download resume</a> -->
						</div><!--/.header-text-->
					</div><!--/.col-->
				</div><!-- /.row-->
			</div><!-- /.container-->

		</section><!--/.welcome-hero-->
		<!--welcome-hero end -->

		<!--about start -->
		<section id="about" class="about">
			<div class="section-heading text-center">
				<h2>about store</h2>
			</div>
			<div class="container">
				<div class="about-content">
					<div class="row">
						<div class="col-sm-6">
							<div class="single-about-txt">
								<h3>
								kami menjual berbagai barang dengan harga yang murah dan terjangkau
								</h3>
								<p>
									"Selamat datang di toko kami! Kami menawarkan berbagai macam barang dengan harga yang terjangkau dan ramah di kantong Anda. Kami memahami bahwa kualitas dan harga yang bersahabat adalah hal yang penting bagi pelanggan kami.

Dalam koleksi kami, Anda akan menemukan beragam barang berkualitas tinggi yang memenuhi kebutuhan sehari-hari Anda, mulai dari pakaian, perlengkapan elektronik, peralatan rumah tangga, hingga aksesori fashion. Kami berkomitmen untuk menyediakan produk-produk berkualitas tanpa harus menguras dompet Anda.

Setiap pembelian di toko kami adalah jaminan kepuasan, karena kami selalu berusaha memberikan layanan terbaik kepada pelanggan kami. Jadi, jangan ragu lagi untuk berbelanja di toko kami dan temukan berbagai penawaran menarik yang bisa Anda dapatkan.

Terima kasih atas kunjungan Anda dan selamat berbelanja!"
								</p>
								<div class="row">
									<div class="col-sm-4">
										<div class="single-about-add-info">
											<h3>phone</h3>
											<p>987-123-6547</p>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="single-about-add-info">
											<h3>email</h3>
											<p>express@.com</p>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="single-about-add-info">
											<h3>website</h3>
											<p>express.com</p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-offset-1 col-sm-5">
							<div class="single-about-img">
								<img src="assets/gambarToko.jpg" alt="profile_image">
								<div class="about-list-icon">
									<ul>
										<li>
											<a href="#">
												<i  class="fa fa-facebook" aria-hidden="true"></i>
											</a>
										</li><!-- / li -->
										<li>
											<a href="#">
												<i  class="fa fa-dribbble" aria-hidden="true"></i>
											</a>
											
										</li><!-- / li -->
										<li>
											<a href="#">
												<i  class="fa fa-twitter" aria-hidden="true"></i>
											</a>
											
										</li><!-- / li -->
										<li>
											<a href="#">
												<i  class="fa fa-linkedin" aria-hidden="true"></i>
											</a>
										</li><!-- / li -->
										<li>
											<a href="#">
												<i  class="fa fa-instagram" aria-hidden="true"></i>
											</a>
										</li><!-- / li -->
										
										
									</ul><!-- / ul -->
								</div><!-- /.about-list-icon -->

							</div>

						</div>
					</div>
				</div>
			</div>
		</section><!--/.about-->
		<!--about end -->
		<section class="shop_section layout_padding">
			<div class="container">
			  <div class="heading_container heading_center">
				<h2>
				Produk Terbaru
				</h2>
			  </div>
			  <div class="row">
				<div class="col-sm-6 col-md-4 col-lg-3">
				  <div class="box">
					<a href="">
					  <div class="img-box">
						<img src="assets/images/beras2Putri.png" alt="">
					  </div>
					  <div class="detail-box">
						<h6>
						Beras 2 Putri 25KG
						</h6>
						<h6>
						   Harga
						  <span>
							190 K
						  </span>
						</h6>
					  </div>
					  <div class="new">
						<span>
						  New
						</span>
					  </div>
					</a>
				  </div>
				</div>
				<div class="col-sm-6 col-md-4 col-lg-3">
				  <div class="box">
					<a href="">
					  <div class="img-box">
						<img src="assets/images/gulaRosebrandgulatebu-removebg-preview.png" alt="">
					  </div>
					  <div class="detail-box">
						<h6>
						  Gula tebu
						</h6>
						<h6>
						  Harga
						  <span>
							20K
						  </span>
						</h6>
					  </div>
					  <div class="new">
						<span>
						  New
						</span>
					  </div>
					</a>
				  </div>
				</div>
				<div class="col-sm-6 col-md-4 col-lg-3">
				  <div class="box">
					<a href="">
					  <div class="img-box">
						<img src="assets/images/gulaku-premium-1-kg-14000-removebg-preview.png" alt="">
					  </div>
					  <div class="detail-box">
						<h6>
						  Gulaku
						</h6>
						<h6>
						  Harga
						  <span>
							30 K
						  </span>
						</h6>
					  </div>
					  <div class="new">
						<span>
						  New
						</span>
					  </div>
					</a>
				  </div>
				</div>
				<div class="col-sm-6 col-md-4 col-lg-3">
				  <div class="box">
					<a href="">
					  <div class="img-box">
						<img src="assets/images/coklatSilverqueen-removebg-preview.png" alt="">
					  </div>
					  <div class="detail-box">
						<h6>
						  Coklat Silverqueen
						</h6>
						<h6>
						  Harga
						   <span>
						   50 K
						  </span>
						  <span>
						  
						  </span>
						
						</h6>
					  </div>
					  <div class="new">
						<span>
						  New
						</span>
					  </div>
					</a>
				  </div>
				</div>
				<div class="col-sm-6 col-md-4 col-lg-3">
				  <div class="box">
					<a href="">
					  <div class="img-box">
						<img src="assets/images/indomie.jpg" alt="">
					  </div>
					  <div class="detail-box">
						<h6>
						  indomie
						</h6>
						<h6>
						  Harga
						  <span>
							5K
						  </span>
						</h6>
					  </div>
					  <div class="new">
						<span>
						  New
						</span>
					  </div>
					</a>
				  </div>
				</div>
				<div class="col-sm-6 col-md-4 col-lg-3">
				  <div class="box">
					<a href="">
					  <div class="img-box">
						<img src="assets/images/frestea-removebg-preview.png" alt="">
					  </div>
					  <div class="detail-box">
						<h6>
						  Frestea
						</h6>
						<h6>
						  Harga
						  <span>
							5K 
						  </span>
						</h6>
					  </div>
					  <div class="new">
						<span>
						  New
						</span>
					  </div>
					</a>
				  </div>
				</div>
				<div class="col-sm-6 col-md-4 col-lg-3">
				  <div class="box">
					<a href="">
					  <div class="img-box">
						<img src="assets/images/tehbotol350ml-removebg-preview.png" alt="">
					  </div>
					  <div class="detail-box">
						<h6>
						  Teh Botol
						</h6>
						<h6>
						  Harga
						  <span>
							5 K
						  </span>
						</h6>
					  </div>
					  <div class="new">
						<span>
						  New
						</span>
					  </div>
					</a>
				  </div>
				</div>
				<div class="col-sm-6 col-md-4 col-lg-3">
				  <div class="box">
					<a href="">
					  <div class="img-box">
						<img src="assets/images/tepungteriguSegitigabiru-removebg-preview (1).png" alt="">
					  </div>
					  <div class="detail-box">
						<h6>
						  Tepung Terigu
						</h6>
						<h6>
						  Harga
						  <span>
							50K
						  </span>
						</h6>
					  </div>
					  <div class="new">
						<span>
						  New
						</span>
					  </div>
					</a>
				  </div>
				</div>
			  </div>
			  <div class="btn-box">
				<a href="./shop/index.php">
				  View All Products
				</a>
			  </div>
			</div>
		  </section>
		<!--education start -->
		<section id="education" class="education">
			<div class="section-heading text-center">
				<h2>customer satisfaction</h2>
			</div>
			<div class="container">
				<div class="education-horizontal-timeline">
					<div class="row">
						<div class="col-sm-4">
							<div class="single-horizontal-timeline">
								<div class="experience-time">
									<h2>Jiraya</h2>
									<h3>master <span>of </span> computer science</h3>
								</div><!--/.experience-time-->
								<div class="timeline-horizontal-border">
									<i class="fa fa-circle" aria-hidden="true"></i>
									<span class="single-timeline-horizontal"></span>
								</div>
								<div class="timeline">
									<div class="timeline-content">
										<h4 class="title">
											university of north carolina
										</h4>
										<h5>north carolina, USA</h5>
										<p class="description">
											
									</div><!--/.timeline-content-->
								</div><!--/.timeline-->
							</div>
						</div>
						<div class="col-sm-4">
							<div class="single-horizontal-timeline">
								<div class="experience-time">
									<h2>Jiraya</h2>
									<h3>bachelor <span>of </span> computer science</h3>
								</div><!--/.experience-time-->
								<div class="timeline-horizontal-border">
									<i class="fa fa-circle" aria-hidden="true"></i>
									<span class="single-timeline-horizontal"></span>
								</div>
								<div class="timeline">
									<div class="timeline-content">
										<h4 class="title">
											university of north carolina
										</h4>
										<h5>north carolina, USA</h5>
										<p class="description">
											Jangan ragu untuk berbelanja di toko ini karena kualitas barang sangat baik.
										</p>
									</div><!--/.timeline-content-->
								</div><!--/.timeline-->
							</div>
						</div>
						<div class="col-sm-4">
							<div class="single-horizontal-timeline">
								<div class="experience-time">
									<h2>Jiraya</h2>
									<h3>bachelor <span>of </span> creative design</h3>
								</div><!--/.experience-time-->
								<div class="timeline-horizontal-border">
									<i class="fa fa-circle" aria-hidden="true"></i>
									<span class="single-timeline-horizontal spacial-horizontal-line
									"></span>
								</div>
								<div class="timeline">
									<div class="timeline-content">
										<h4 class="title">
											university of bolton
										</h4>
										<h5>bolton, united kingdome</h5>
										<p class="description">
											Kualitas barangnya sampai saat ini tetap konsisten dengan mempertahankan kualitasnya
										</p>
									</div><!--/.timeline-content-->
								</div><!--/.timeline-->
							</div>
						</div>
					</div>
				</div>
			</div>

		</section><!--/.education-->
		<!--education end -->

		<!--skills start -->
		<section id="skills" class="skills">
				<div class="skill-content">
					<div class="section-heading text-center">
						<h2>Barang terlaris</h2>
					</div>
					<div class="container">
						<div class="row">
							<div class="col-md-6">
								<div class="single-skill-content">
									<div class="barWrapper">
										<span class="progressText">Daging Sapi</span>
										<div class="single-progress-txt">
											<div class="progress ">
												<div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="10" aria-valuemax="100" style="">
													  
												</div>
											</div>
											<h3>90%</h3>	
										</div>
									</div><!-- /.barWrapper -->
									<div class="barWrapper">
										<span class="progressText">Beras</span>
										<div class="single-progress-txt">
											<div class="progress ">
											   <div class="progress-bar" role="progressbar" aria-valuenow="85" aria-valuemin="10" aria-valuemax="100" style="">
												    
											   </div>
											</div>
											<h3>85%</h3>	
										</div>
									</div><!-- /.barWrapper -->
									<div class="barWrapper">
										<span class="progressText">Koko Krunch</span>
										<div class="single-progress-txt">
											<div class="progress ">
											   <div class="progress-bar" role="progressbar" aria-valuenow="97" aria-valuemin="10" aria-valuemax="100" style="">
												   
											   </div>
											</div>
											<h3>97%</h3>	
										</div>
									</div><!-- /.barWrapper -->
									<div class="barWrapper">
										<span class="progressText">Frozen Food</span>
										<div class="single-progress-txt">
											<div class="progress ">
											   <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="10" aria-valuemax="100" style="">
												    
											   </div>
											</div>
											<h3>90%</h3>	
										</div>
									</div><!-- /.barWrapper -->
								</div>
							</div>
							<div class="col-md-6">
								<div class="single-skill-content">
									<div class="barWrapper">
										<span class="progressText">Tepung segitiga Biru</span>
										<div class="single-progress-txt">
											<div class="progress ">
												<div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="10" aria-valuemax="100" style="">
													
												</div>
											</div>
											<h3>90%</h3>	
										</div>
									</div><!-- /.barWrapper -->
									<div class="barWrapper">
										<span class="progressText">Indomie</span>
										<div class="single-progress-txt">
											<div class="progress ">
											   <div class="progress-bar" role="progressbar" aria-valuenow="85" aria-valuemin="10" aria-valuemax="100" style="">
												    
											   </div>
											</div>
											<h3>85%</h3>	
										</div>
									</div><!-- /.barWrapper -->
									<div class="barWrapper">
										<span class="progressText">Tepung Terigu</span>
										<div class="single-progress-txt">
											<div class="progress ">
											   <div class="progress-bar" role="progressbar" aria-valuenow="97" aria-valuemin="10" aria-valuemax="100" style="">
												   
											   </div>
											</div>
											<h3>97%</h3>	
										</div>
									</div><!-- /.barWrapper -->
									<div class="barWrapper">
										<span class="progressText">Tepung Tapioka</span>
										<div class="single-progress-txt">
											<div class="progress ">
											   <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="10" aria-valuemax="100" style="">
												    
											   </div>
											</div>
											<h3>90%</h3>	
										</div>
									</div><!-- /.barWrapper -->
								</div>
							</div>
						</div><!-- /.row -->
					</div>	<!-- /.container -->		
				</div><!-- /.skill-content-->

		</section><!--/.skills-->
		<!--skills end -->

		<!--experience start -->
		<section id="experience" class="experience">
			<div class="section-heading text-center">
				<h2>experience</h2>
			</div>
			<div class="container">
				<div class="experience-content">
						<div class="main-timeline">
							<ul>
								<li>
									<div class="single-timeline-box fix">
										<div class="row">
											<div class="col-md-5">
												<div class="experience-time text-right">
													<h2>2018 - Present</h2>
													<h3>creative director</h3>
												</div><!--/.experience-time-->
											</div><!--/.col-->
											<div class="col-md-offset-1 col-md-5">
												<div class="timeline">
													<div class="timeline-content">
														<h4 class="title">
															<span><i class="fa fa-circle" aria-hidden="true"></i></span>
															hoplony tech limited
														</h4>
														<h5>newyork, USA</h5>
														<p class="description">
															Duis aute irure dolor in reprehenderit in vol patate velit esse cillum dolore eu fugiat nulla pari. Excepteur sint occana inna tecat cupidatat non proident. 
														</p>
													</div><!--/.timeline-content-->
												</div><!--/.timeline-->
											</div><!--/.col-->
										</div>
									</div><!--/.single-timeline-box-->
								</li>

								<li>
									<div class="single-timeline-box fix">
										<div class="row">
											<div class="col-md-offset-1 col-md-5 experience-time-responsive">
												<div class="experience-time">
													<h2>
														<span><i class="fa fa-circle" aria-hidden="true"></i></span>
														2016 - 2018
													</h2>
													<h3>associate design director</h3>
												</div><!--/.experience-time-->
											</div><!--/.col-->
											<div class="col-md-5">
												<div class="timeline">
													<div class="timeline-content text-right">
														<h4 class="title">
															hoplony tech limited
														</h4>
														<h5>newyork, USA</h5>
														<p class="description">
															Duis aute irure dolor in reprehenderit in vol patate velit esse cillum dolore eu fugiat nulla pari. Excepteur sint occana inna tecat cupidatat non proident. 
														</p>
													</div><!--/.timeline-content-->
												</div><!--/.timeline-->
											</div><!--/.col-->
											<div class="col-md-offset-1 col-md-5 experience-time-main">
												<div class="experience-time">
													<h2>
														<span><i class="fa fa-circle" aria-hidden="true"></i></span>
														2016 - 2018
													</h2>
													<h3>associate design director</h3>
												</div><!--/.experience-time-->
											</div><!--/.col-->
										</div>
									</div><!--/.single-timeline-box-->
								</li>

								<li>
									<div class="single-timeline-box fix">
										<div class="row">
											<div class="col-md-5">
												<div class="experience-time text-right">
													<h2>2013 - 2016</h2>
													<h3>senior UI/UX designer</h3>
												</div><!--/.experience-time-->
											</div><!--/.col-->
											<div class="col-md-offset-1 col-md-5">
												<div class="timeline">
													<div class="timeline-content">
														<h4 class="title">
															<span><i class="fa fa-circle" aria-hidden="true"></i></span>
															hoplony tech limited
														</h4>
														<h5>newyork, USA</h5>
														<p class="description">
															Duis aute irure dolor in reprehenderit in vol patate velit esse cillum dolore eu fugiat nulla pari. Excepteur sint occana inna tecat cupidatat non proident. 
														</p>
													</div><!--/.timeline-content-->
												</div><!--/.timeline-->
											</div><!--/.col-->
										</div>
									</div><!--/.single-timeline-box-->
								</li>

								<li>
									<div class="single-timeline-box fix">
										<div class="row">
											<div class="col-md-offset-1 col-md-5 experience-time-responsive">
												<div class="experience-time">
													<h2>
														<span><i class="fa fa-circle" aria-hidden="true"></i></span>
														2012 - 2013
													</h2>
													<h3>UI/UX designer</h3>
												</div><!--/.experience-time-->
											</div><!--/.col-->
											<div class="col-md-5">
												<div class="timeline">
													<div class="timeline-content text-right">
														<h4 class="title">
															hoplony tech limited
														</h4>
														<h5>newyork, USA</h5>
														<p class="description">
															Duis aute irure dolor in reprehenderit in vol patate velit esse cillum dolore eu fugiat nulla pari. Excepteur sint occana inna tecat cupidatat non proident. 
														</p>
													</div><!--/.timeline-content-->
												</div><!--/.timeline-->
											</div><!--/.col-->
											<div class="col-md-offset-1 col-md-5 experience-time-main">
												<div class="experience-time">
													<h2>
														<span><i class="fa fa-circle" aria-hidden="true"></i></span>
														2012 - 2013
													</h2>
													<h3>UI/UX designer</h3>
												</div><!--/.experience-time-->
											</div><!--/.col-->
										</div>
									</div><!--/.single-timeline-box-->
								</li>

								<li>
									<div class="single-timeline-box fix">
										<div class="row">
											<div class="col-md-5">
												<div class="experience-time text-right">
													<h2>2010 - 2012</h2>
													<h3>frontend developer</h3>
												</div><!--/.experience-time-->
											</div><!--/.col-->
											<div class="col-md-offset-1 col-md-5">
												<div class="timeline">
													<div class="timeline-content">
														<h4 class="title">
															<span><i class="fa fa-circle" aria-hidden="true"></i></span>
															hoplony tech limited
														</h4>
														<h5>newyork, USA</h5>
														<p class="description">
															Duis aute irure dolor in reprehenderit in vol patate velit esse cillum dolore eu fugiat nulla pari. Excepteur sint occana inna tecat cupidatat non proident. 
														</p>
													</div><!--/.timeline-content-->
												</div><!--/.timeline-->
											</div><!--/.col-->
										</div>
									</div><!--/.single-timeline-box-->
								</li>

							</ul>
						</div><!--.main-timeline-->
					</div><!--.experience-content-->
			</div>

		</section><!--/.experience-->
		<!--experience end -->

		<!--profiles start -->
		<section id="profiles" class="profiles">
			<div class="profiles-details">
				<div class="section-heading text-center">
					<h2>profiles</h2>
				</div>
				<div class="container">
					<div class="profiles-content">
						<div class="row">
							<div class="col-sm-3">
								<div class="single-profile">
									<div class="profile-txt">
										<a href=""><i class="flaticon-themeforest"></i></a>
										<div class="profile-icon-name">themeforest</div>
									</div>
									<div class="single-profile-overlay">
										<div class="profile-txt">
											<a href=""><i class="flaticon-themeforest"></i></a>
											<div class="profile-icon-name">themeforest</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="single-profile">
									<div class="profile-txt">
										<a href=""><i class="flaticon-dribbble"></i></a>
										<div class="profile-icon-name">dribbble</div>
									</div>
									<div class="single-profile-overlay">
										<div class="profile-txt">
											<a href=""><i class="flaticon-dribbble"></i></a>
											<div class="profile-icon-name">dribbble</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="single-profile">
									<div class="profile-txt">
										<a href=""><i class="flaticon-behance-logo"></i></a>
										<div class="profile-icon-name">behance</div>
									</div>
									<div class="single-profile-overlay">
										<div class="profile-txt">
											<a href=""><i class="flaticon-behance-logo"></i></a>
											<div class="profile-icon-name">behance</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="single-profile profile-no-border">
									<div class="profile-txt">
										<a href=""><i class="flaticon-github-logo"></i></a>
										<div class="profile-icon-name">github</div>
									</div>
									<div class="single-profile-overlay">
										<div class="profile-txt">
											<a href=""><i class="flaticon-github-logo"></i></a>
											<div class="profile-icon-name">github</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="profile-border"></div>
						<div class="row">
							<div class="col-sm-3">
								<div class="single-profile">
									<div class="profile-txt">
										<a href=""><i class="flaticon-flickr-website-logo-silhouette"></i></a>
										<div class="profile-icon-name">flickR</div>
									</div>
									<div class="single-profile-overlay">
										<div class="profile-txt">
											<a href=""><i class="flaticon-flickr-website-logo-silhouette"></i></a>
											<div class="profile-icon-name">flickR</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="single-profile">
									<div class="profile-txt">
										<a href=""><i class="flaticon-smug"></i></a>
										<div class="profile-icon-name">smungMung</div>
									</div>
									<div class="single-profile-overlay">
										<div class="profile-txt">
											<a href=""><i class="flaticon-smug"></i></a>
											<div class="profile-icon-name">smungMung</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="single-profile">
									<div class="profile-txt">
										<a href=""><i class="flaticon-squarespace-logo"></i></a>
										<div class="profile-icon-name">squareSpace</div>
									</div>
									<div class="single-profile-overlay">
										<div class="profile-txt">
											<a href=""><i class="flaticon-squarespace-logo"></i></a>
											<div class="profile-icon-name">squareSpace</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="single-profile profile-no-border">
									<div class="profile-txt">
										<a href=""><i class="flaticon-bitbucket-logotype-camera-lens-in-perspective"></i></a>
										<div class="profile-icon-name">bitBucket</div>
									</div>
									<div class="single-profile-overlay">
										<div class="profile-txt">
											<a href=""><i class="flaticon-bitbucket-logotype-camera-lens-in-perspective"></i></a>
											<div class="profile-icon-name">bitBucket</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</section><!--/.profiles-->
		<!--profiles end -->

		<!--portfolio start -->
		<section id="portfolio" class="portfolio">
			<div class="portfolio-details">
				<div class="section-heading text-center">
					<h2>Etalase Toko</h2>
				</div>
				<div class="container">
					<div class="portfolio-content">
						<div class="isotope">
							<div class="row">

								<div class="col-sm-4">
									<div class="item">
										<img src="assets/images/dagingBeku-removebg-preview.png" alt="portfolio image"/>
										<div class="isotope-overlay">
											<a href="#">
												Daging beku
											</a>
										</div><!-- /.isotope-overlay -->
									</div><!-- /.item -->
									<div class="item">
										<img src="assets/images/composition-with-frozen-fish-table.jpg" alt="portfolio image"/>
										<div class="isotope-overlay">
											<a href="#">
												Ikan
											</a>
										</div><!-- /.isotope-overlay -->
									</div><!-- /.item -->
								</div><!-- /.col -->

								<div class="col-sm-4">
									<div class="item">
										<img src="assets/images/gambarKokocrunch-removebg-preview.png" alt="portfolio image"/>
										<div class="isotope-overlay">
											<a href="#">
												Koko Crunch
											</a>
										</div><!-- /.isotope-overlay -->
									</div><!-- /.item -->
								</div><!-- /.col -->

								<div class="col-sm-4">
									<div class="item">
										<img src="assets/images/beras.jpg" alt="portfolio image"/>
										<div class="isotope-overlay">
											<a href="#">
												Beras
											</a>
										</div><!-- /.isotope-overlay -->
									</div><!-- /.item -->
									<div class="item">
										<img src="assets/images/gula.jpg" alt="portfolio image"/>
										<div class="isotope-overlay">
											<a href="#">
												Gula
											</a>
										</div><!-- /.isotope-overlay -->
									</div><!-- /.item -->
								</div><!-- /.col -->
							</div><!-- /.row -->
						</div><!--/.isotope-->
					</div><!--/.gallery-content-->
				</div><!--/.container-->
			</div><!--/.portfolio-details-->

		</section><!--/.portfolio-->
		<!--portfolio end -->

		<!--clients start -->
		<section id="clients" class="clients">
			<div class="section-heading text-center">
				<h2>clients</h2>
			</div>
			<div class="clients-area">
				<div class="container">
					<div class="owl-carousel owl-theme" id="client">
						<div class="item">
							<a href="#">
								<img src="assets/images/clients/c1.png" alt="brand-image" />
							</a>
						</div><!--/.item-->
						<div class="item">
							<a href="#">
								<img src="assets/images/clients/c2.png" alt="brand-image" />
							</a>
						</div><!--/.item-->
						<div class="item">
							<a href="#">
								<img src="assets/images/clients/c3.png" alt="brand-image" />
							</a>
						</div><!--/.item-->
						<div class="item">
							<a href="#">
								<img src="assets/images/clients/c4.png" alt="brand-image" />
							</a>
						</div><!--/.item-->
						<div class="item">
							<a href="#">
								<img src="assets/images/clients/c5.png" alt="brand-image" />
							</a>
						</div><!--/.item-->
						<div class="item">
							<a href="#">
								<img src="assets/images/clients/c6.png" alt="brand-image" />
							</a>
						</div><!--/.item-->
						<div class="item">
							<a href="#">
								<img src="assets/images/clients/c7.png" alt="brand-image" />
							</a>
						</div><!--/.item-->
					</div><!--/.owl-carousel-->
				</div><!--/.container-->
			</div><!--/.clients-area-->

		</section><!--/.clients-->

		</section><!--/.clients-->
		<!--clients end -->

		<!--contact start -->
		<section id="contact" class="contact">
			<div class="section-heading text-center">
				<h2>contact me</h2>
			</div>
			<div class="container">
				<div class="contact-content">
					<div class="row">
						<div class="col-md-offset-1 col-md-5 col-sm-6">
							<div class="single-contact-box">
								<div class="contact-form">
									<form>
										<div class="row">
											<div class="col-sm-6 col-xs-12">
												<div class="form-group">
												  <input type="text" class="form-control" id="name" placeholder="Name*" name="name">
												</div><!--/.form-group-->
											</div><!--/.col-->
											<div class="col-sm-6 col-xs-12">
												<div class="form-group">
													<input type="email" class="form-control" id="email" placeholder="Email*" name="email">
												</div><!--/.form-group-->
											</div><!--/.col-->
										</div><!--/.row-->
										<div class="row">
											<div class="col-sm-12">
												<div class="form-group">
													<input type="text" class="form-control" id="subject" placeholder="Subject" name="subject">
												</div><!--/.form-group-->
											</div><!--/.col-->
										</div><!--/.row-->
										<div class="row">
											<div class="col-sm-12">
												<div class="form-group">
													<textarea class="form-control" rows="8" id="comment" placeholder="Message" ></textarea>
												</div><!--/.form-group-->
											</div><!--/.col-->
										</div><!--/.row-->
										<div class="row">
											<div class="col-sm-12">
												<div class="single-contact-btn">
													<a class="contact-btn" href="#" role="button">submit</a>
												</div><!--/.single-single-contact-btn-->
											</div><!--/.col-->
										</div><!--/.row-->
									</form><!--/form-->
								</div><!--/.contact-form-->
							</div><!--/.single-contact-box-->
						</div><!--/.col-->
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
								</div><!--/.contact-adress-->
								<div class="hm-foot-icon">
									<ul>
										<li><a href="#"><i class="fa fa-facebook"></i></a></li><!--/li-->
										<li><a href="#"><i class="fa fa-dribbble"></i></a></li><!--/li-->
										<li><a href="#"><i class="fa fa-twitter"></i></a></li><!--/li-->
										<li><a href="#"><i class="fa fa-linkedin"></i></a></li><!--/li-->
										<li><a href="#"><i class="fa fa-instagram"></i></a></li><!--/li-->
									</ul><!--/ul-->
								</div><!--/.hm-foot-icon-->
							</div><!--/.single-contact-box-->
						</div><!--/.col-->
					</div><!--/.row-->
				</div><!--/.contact-content-->
			</div><!--/.container-->

		</section><!--/.contact-->
		<!--contact end -->

		<!--footer-copyright start-->
		<footer id="footer-copyright" class="footer-copyright">
			<div class="container">
				<div class="hm-footer-copyright text-center">
					<p>
						&copy; copyright yourname. design and developed by <a href="https://www.themesine.com/">themesine</a>
					</p><!--/p-->
				</div><!--/.text-center-->
			</div><!--/.container-->

			<div id="scroll-Top">
				<div class="return-to-top">
					<i class="fa fa-angle-up " id="scroll-top" ></i>
				</div>
				
			</div><!--/.scroll-Top-->
			
        </footer><!--/.footer-copyright-->
		<!--footer-copyright end-->
		
		<!-- Include all js compiled plugins (below), or include individual files as needed -->

		<script src="assets/js/jquery.js"></script>
        
        <!--modernizr.min.js-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
		
		<!--bootstrap.min.js-->
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- bootsnav js -->
		<script src="assets/js/bootsnav.js"></script>
		
		<!-- jquery.sticky.js -->
		<script src="assets/js/jquery.sticky.js"></script>
		
		<!-- for progress bar start-->

		<!-- progressbar js -->
		<script src="assets/js/progressbar.js"></script>

		<!-- appear js -->
		<script src="assets/js/jquery.appear.js"></script>

		<!-- for progress bar end -->

		<!--owl.carousel.js-->
        <script src="assets/js/owl.carousel.min.js"></script>


		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
		
        
        <!--Custom JS-->
        <script src="assets/js/custom.js"></script>
        
  <script>
    //night mode
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
    //end of code night mode
	</script>
    </body>
	
</html>