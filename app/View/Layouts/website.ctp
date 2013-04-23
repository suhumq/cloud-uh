<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Amaya Residence</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="../css/websites/bootstrap.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="../css/websites/bootstrap-responsive.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="../css/websites/style.css" type="text/css" media="screen" />
	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.js"></script>
	<script src="../js/bootstrap-carousel.js"></script>
	<script src="../js/bootstrap-transition.js"></script>
	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if IE 7]>
		<script src="js/html5shiv.js"></script>
	<![endif]-->
	<!--[if IE 8]>
		<script src="js/html5shiv.js"></script>
	<![endif]-->
	<!--[if IE 9]>
		<script src="js/html5shiv.js"></script>
	<![endif]-->
	<script>
		$(document).ready(function() {
			$('#myCarousel').carousel()
			/*$('#myTab a').click(function (e) {
			  e.preventDefault();
			  $(this).tab('show');
			})*/
		});
		
	</script>
  </head>
  <body>	
	<header>
		<div class="row-fluid">
			<div class="container">
				<div class="span12">
					<div class="span6">
						<img src="img/img-websites/logo.png" alt="logo" class="logo"/>
						<!--div class="tabbable"-->
							<ul class="nav nav-pills">
							  <li>
								<a href="homepage.html">Home</a>
							  </li>
							  <li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#">Project Gallery</a>
								<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
									<li><a href="project-gallery.html">Amaya Residence</a></li>
									<li><a href="#">Residence 1</a></li>
									<li><a href="#">Residence 2</a></li>
									<li><a href="#">Residence 3</a></li>
								</ul>
							  </li>
							  <li><a href="#">About Us</a></li>
							  <li><a href="#">Contact Us</a></li>
							</ul>
							<!--div class="tab-content">
								<div class="tab-pane" id="tab1">
									
								</div>
								<div class="tab-pane" id="tab2">
								  <ul>
									<li><a href="project-gallery.html">Amaya Residence</a></li>
									<li><a href="#">Residence 1</a></li>
									<li><a href="#">Residence 2</a></li>
									<li><a href="#">Residence 3</a></li>
								</ul>
								</div>
							</div>
						</div-->
					</div>
					<div class="span6 rights">
						<!--ul class="box-login">
							<li>
								<label>User name </label>
								<input type="text" />
							</li>
							<li>
								<label>Password </label>
								<input type="password" />
							</li>
							<li>
								<button type="submit" class="btn right">Sign in</button>
							</li>
						</ul-->
						<span class="call-us">Hubungi: 022-426.4230 | e-mail: pemasaran@amaya.com</span>
						<a href="/users/login" class="btn login">Login</a>
					</div>
				</div>
			</div>
		</div>
	</header>
	<div id="myCarousel" class="carousel slide">
	  <!--ol class="carousel-indicators">
		<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		<li data-target="#myCarousel" data-slide-to="1"></li>
		<li data-target="#myCarousel" data-slide-to="2"></li>
	  </ol-->
	  <!-- Carousel items -->
	  <div class="carousel-inner">
		<div class="active item">
			<img src="img/img-websites/slideshow-1.png" />
		</div>
		<div class="item">
			<img src="img/img-websites/slideshow-2.png" />
		</div>
		<div class="item">
			<img src="img/img-websites/slideshow-1.png" />
		</div>
	  </div>
	  <!-- Carousel nav -->
	  <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
	  <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
	</div>	
	<section>
		<div class="row-fluid content">
			<div class="container">
				<div class="span12">
					<div class="span3">
						<h2>Temukan</h2>
						<ul class="list-find">
							<li><a href="#">Tipe 120</a></li>
							<li><a href="#">Tipe 48</a></li>
							<li><a href="#">Tipe 36</a></li>
						</ul>
					</div>
					<div class="span9">
						<h2>Project Terbaru</h2>
						<a href="#" class="project-home btn">Project sedang berjalan</a><div class="clear"></div>
						<ul class="img-collection">
							<li>
								<a href="#">
									<img src="img/img-websites/small-img.png" alt="Cluster Jasmine" />
									<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet </p>
								</a>
							</li>
							<li>
								<a href="#">
									<img src="img/img-websites/small-img-2.png" alt="Cluster Jasmine" />
									<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet </p>
								</a>
							</li>
							<li>
								<a href="#">
									<img src="img/img-websites/small-img-3.png" alt="Cluster Jasmine" />
									<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet </p>
								</a>
							</li>
						</ul><div class="clear"></div>
						<div class="span4 facility">
							<h3>Environment Concept</h3>
							<ul>
								<li><a href="#">Cluster System</a></li>
								<li><a href="#">One Gate</a></li>
								<li><a href="#">Landscape</a></li>
								<li><a href="#">Main Plaza & Mosque</a></li>
								<li><a href="#">BasketBall Court</a></li>
								<li><a href="#">Wi-Fi</a></li>
								<li><a href="#">CCTV</a></li>
							</ul>
						</div>
						<div class="span8 facility">
							<h3>Spesifikasi Teknik</h3>
							<ul class="left">
								<li><label>Pondasi </label>: Batu Kali</li>
								<li><label>Struktur </label>: Beton Betulang</li>
								<li><label>Dinding </label>: Bata Merah, Finishing diplester+cat</a></li>
								<li><label>Plafond </label>: Gypsum dicat</a></li>
								<li><label>Keramik </label>: Lantai Utama</a></li>
								<li><label>Pintu </label>: Panel & Double Triplek dicat</a></li>
								<li><label>Kusen </label>: Mahoni dicat</a></li>
							</ul>
							<ul class="right">
								<li><label>Kuda-kuda </label>: Baja Ringan</li>
								<li><label>Penutup Atap </label>: Genteng Flat Beton</li>
								<li><label>Air </label>: Pompa Listrik</li>
								<li><label>Listrik </label>: 1300 Watt</li>
								<li><label>Kloset </label>: Duduk</li>
							</ul>
							<div class="clear"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<div class="row-fluid news">
		<div class="container">
			<div class="span12">
				<div class="span3">
					Berita seputar Perkembangan Dunia Properti dan segala sesuatu yang berhubungan dengannya. Kami sajikan sebagai penambah pengetahuan anda tentang khasanah properti. Semoga berkenan.
				</div>
				<div class="span9 slogan">
					<img src="img/img-websites/footer-img.png" alt="footer-image" /> 
					<h2>Berita Terkini</h2>
					<p>Yunita Resmi Sari, Deputi Direktur Grup Stabilitas Sistem Keuangan Bank Indonesia (BI), mengatakan kecenderungan penurunan bunga KPR [kredit pemilikan rumah] dan kendaraan bermotor terlihat pada iklan sejumlah penawaran dari bank. </p>
				</div>
			</div>
		</div>
	</div>
	<footer>
		<div class="row-fluid">
			<div class="container">
				<div class="span12">
					<div class="span3">
						<h3>Project List</h3>
						<ul class="footer-content">
							<li><a href="#">Amaya Residence</a></li>
							<li><a href="#">Residence 2</a></li>
							<li><a href="#">Residence 3</a></li>
							<li><a href="#">Residence 4</a></li>
							<li><a href="#">Residence 5</a></li>
						</ul>
					</div>
					<div class="span9">
						<div class="list-kpr">
							<h3>Pilihan KPR Bank</h3>
							<ul class="bank">
								<li><a href="http://www.btn.co.id/"><img src="img/img-websites/btn.png" alt="btn"/></a></li>
								<li><a href="http://www.bri.co.id/"><img src="img/img-websites/bri.png" alt="bri"/></a></li>
								<li><a href="http://www.cimbniaga.com/"><img src="img/img-websites/niaga.png" alt="cimbniaga"/></a></li>
								<li><a href="http://www.bni.co.id/"><img src="img/img-websites/bni.png" alt="bni"/></a></li>
								<li><a href="http://www.ocbcnisp.com/"><img src="img/img-websites/nisp.png" alt="nisp"/></a></li>
								<li><a href="http://www.bankmandiri.co.id/"><img src="img/img-websites/mandiri.png" alt="mandiri"/></a></li>
							</ul>
						</div>
						<div class="office">
							<h3>Head Office : </h3>
							<p>Jl. Sukaati No.20 Bandung. <br /> Telp: 022-426.4230 <br /> Email:pemasaran@amaya.com </p>
						</div>
						<div class="clear"></div>						
						<ul class="menu-footer left">
							<li><a href="#">Home</a></li>
							<li><a href="#">Project Gallery</a></li>
							<li><a href="#">About Us</a></li>
							<li><a href="#">Contact Us</a></li>
						</ul> 
						<span class="copyright right">© Hak Cipta Pavitra Para Artha - 2013</span><div class="clear"></div> 
					</div>
				</div>
			</div>
		</div>
	</footer>
  </body>
</html>