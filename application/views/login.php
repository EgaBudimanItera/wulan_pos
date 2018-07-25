<!DOCTYPE html>
<html class="no-js">
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Aplikasi Tes Minat dan Bakat Siswa</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/logo.png">
	<link href='https://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
	<!-- <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,400italic,700' rel='stylesheet' type='text/css'> -->

	<!-- Animate.css -->
	<link rel="stylesheet" href="assets/css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="assets/css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<!-- Flexslider  -->
	<link rel="stylesheet" href="assets/css/flexslider.css">
	<!-- Theme style  -->
	<link rel="stylesheet" href="assets/css/style.css">

	<!-- Modernizr JS -->
	<script src="assets/js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>


	<div id="fh5co-page">
	<header id="fh5co-header" role="banner">
		<div class="container">
			<div class="row">
				<div class="header-inner">
					<h1><a href="#">YP Unila<span>.</span></a></h1>
					<nav role="navigation">
						<ul>
							<li>APLIKASI TES MINAT &amp; BAKAT SISWA SMA YP Unila Bandar Lampung</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</header>

<aside id="fh5co-hero" clsas="js-fullheight">
  <div class="flexslider js-fullheight">
    <ul class="slides">
      <li style="background-image: url(<?php base_url(); ?>assets/images/yp.jpg);">
        <div class="container">
          <div class="col-md-12 text-center js-fullheight fh5co-property-brief slider-text">
            <div class="fh5co-property-brief-inner">
              <div class="fh5co-box">

                <h3>Login</h3>
								<?php echo $this->session->flashdata('status'); ?>
                          <form class="" action="<?php base_url() ?>Authentication/SiswaLogin" method="post">
                            <div class="row">
                  						<div class="col-md-12">
                  							<div class="form-group">
                  								<input class="form-control" placeholder="Username" name="username" type="text" required>
                  							</div>
                  						</div>
                  						<div class="col-md-12">
                  							<div class="form-group">
                  								<input class="form-control" placeholder="Password" name="password" type="password" required>
                  							</div>
                  						</div>
                  					</div>
                            <input type="submit" value="LOGIN" class="btn btn-primary" />
															<div class="pull-right"><a href="<?php echo base_url(); ?>AdminLogin" class="btn btn-warning" />Login Admin</a></div>
                          </form>

              </div>
            </div>
          </div>
        </div>
      </li>

      </ul>
    </div>
</aside>

<?php $this->load->view("partials/front/foot");?>
