<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Smk Negeri Prototype</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />

  <!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700,800" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/magnific-popup.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/flexslider.css">

	<!-- Owl Carousel -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/owl.carousel.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/owl.theme.default.min.css">
	
	<!-- Flaticons  -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/fonts/flaticon/font/flaticon.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">

	<!-- Modernizr JS -->
	<script src="<?php echo base_url() ?>assets/js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
		
	<div class="colorlib-loader"></div>

	<div id="page">
		<nav class="colorlib-nav" role="navigation">
			<div class="top-menu">
				<div class="container">
					<div class="row">
						<div class="col-md-2">
							<div id="colorlib-logo"><a href="<?php echo base_url().'web/index' ?>">Prototype</a></div>
						</div>
						<div class="col-md-10 text-right menu-1">
							<ul>

								<!-- class="active" -->
								<?php if($judul==="Home") { ?>
									<li class="active"><a href="<?php echo base_url().'web/index' ?>">Home</a></li>
								<?php }else{ ?>
									<li><a href="<?php echo base_url().'web/index' ?>">Home</a></li>
								<?php } ?>
								<!-- class="active" -->
								<?php if($judul==="Pendaftaran") { ?>
									<li class="active"><a href="<?php echo base_url().'web/pendaftaran' ?>">Pendaftaran</a></li>
								<?php }else{ ?>
									<li><a href="<?php echo base_url().'web/pendaftaran' ?>">Pendaftaran</a></li>
								<?php } ?>
								<!-- class="active" -->
								<?php if($judul==="About") { ?>
									<li class="active"><a href="<?php echo base_url().'web/about' ?>">About</a></li>
								<?php }else{ ?>
									<li><a href="<?php echo base_url().'web/about' ?>">About</a></li>
								<?php } ?>
								<!-- class="active" -->
								<?php if($judul==="Event") { ?>
									<li class="active"><a href="<?php echo base_url().'web/event' ?>">Event</a></li>
								<?php }else{ ?>
									<li><a href="<?php echo base_url().'web/event' ?>">Event</a></li>
								<?php } ?>
								<!-- class="active" -->
								<?php if($judul==="News") { ?>
									<li class="active"><a href="<?php echo base_url().'web/news' ?>">News</a></li>
								<?php }else{ ?>
									<li><a href="<?php echo base_url().'web/news' ?>">News</a></li>
								<?php } ?>
								<!-- class="active" -->
								<?php if($judul==="Contact") { ?>
									<li class="active"><a href="<?php echo base_url().'web/contact' ?>">contact</a></li>
								<?php }else{ ?>
									<li><a href="<?php echo base_url().'web/contact' ?>">contact</a></li>
								<?php } ?>

								<li class="btn-cta"><a href="<?php echo base_url().'web/login' ?>"><span>
									Login

								</span></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>
		<aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url(<?php echo base_url() ?>assets/images/img_bg_1.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-8 col-sm-12 col-md-offset-2 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<h2>Best High School</h2>
				   					<p><a href="<?php echo base_url().'web/pendaftaran' ?>" class="btn btn-primary btn-lg btn-learn">Register Now</a></p>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			   	<li style="background-image: url(<?php echo base_url() ?>assets/images/img_bg_2.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-8 col-sm-12 col-md-offset-2 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<h2>Terakreditas A</h2>
				   					<p><a href="<?php echo base_url().'web/news' ?>" class="btn btn-primary btn-lg btn-learn">Baca</a></p>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			   	<li style="background-image: url(<?php echo base_url() ?>assets/images/img_bg_3.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-8 col-sm-12 col-md-offset-2 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<h2>Education is a Key to Success</h2>
				   					<p><a href="<?php echo base_url().'web/pendaftaran' ?>" class="btn btn-primary btn-lg btn-learn">Register Now</a></p>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			   	<li style="background-image: url(<?php echo base_url() ?>assets/images/img_bg_4.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-8 col-sm-12 col-md-offset-2 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<h2>Best Online Learning Center</h2>
				   					<p><a href="<?php echo base_url().'web/pendaftaran' ?>" class="btn btn-primary btn-lg btn-learn">Register Now</a></p>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>	
			  	</ul>
		  	</div>
		</aside>
		