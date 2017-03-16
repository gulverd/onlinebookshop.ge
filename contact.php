<?php 
	session_start();
	//echo session_id();
?>
<html class="no-js" lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="author" content=""/>
<title>OnlineBookShop.ge</title>

<!-- StyleSheets -->
<link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/animate.css">
<link rel="stylesheet" href="css/icomoon.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/color-1.css">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="css/responsive.css">
<link rel="stylesheet" href="css/transition.css">

<!-- Online Lib -->
<link rel="stylesheet" href="http://www.atlasestateagents.co.uk/css/tether.min.css">
<script src="http://www.atlasestateagents.co.uk/javascript/tether.min.js"></script>

<!-- Switcher CSS -->
<link rel="stylesheet" id="skins" href="./css/default.css" type="text/css" media="all">

<!-- FontsOnline -->
<link href='https://fonts.googleapis.com/css?family=Merriweather:300,300italic,400italic,400,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Lato:400,300,300italic,400italic,700,700italic,900italic,900,100italic,100' rel='stylesheet' type='text/css'>

<!-- JavaScripts -->
<script src="js/vendor/modernizr.js"></script>
</head>
<body>
<?php

	include 'admin/db.php';

	$query = "SELECT * FROM contact";
	$run   = mysqli_query($conn,$query);

	while($row = mysqli_fetch_array($run)){
		$address 	= $row['address'];
		$phone   	= $row['phone'];
		$email   	= $row['email'];
		$facebook   = $row['facebook'];
		$instagram  = $row['instagram'];
		$twitter    = $row['twitter'];
		$youtube    = $row['youtube'];
		$map_url    = $row['map_url'];
	}

?>

<!-- Wrapper -->
<div class="wrapper push-wrapper">

	<!-- Header -->
		<?php include 'header.php';?>
	<!-- Header -->
	
	<!-- Main Content -->
	<main class="main-content">

		<!-- Contant Holder -->
		<div class="tc-padding">
			<div class="container">

				<!-- Address Columns -->
				<div class="tc-padding-bottom">
					<div class="row">
				
						<!-- Column -->
						<div class="col-lg-3 col-xs-6 r-full-width">
							<div class="address-column">
								<span class="address-icon"><i class="fa fa-map-marker"></i></span>
								<h6>Address</h6>
								<strong><?php echo $address;?></strong>
							</div>
						</div>
						<!-- Column -->

						<!-- Column -->
						<div class="col-lg-3 col-xs-6 r-full-width">
							<div class="address-column">
								<span class="address-icon"><i class="fa fa-volume-control-phone"></i></span>
								<h6>Phone No.</h6>
								<strong><?php echo $phone;?></strong>
							</div>
						</div>
						<!-- Column -->

						<!-- Column -->
						<div class="col-lg-3 col-xs-6 r-full-width">
							<div class="address-column">
								<span class="address-icon"><i class="fa fa-envelope"></i></span>
								<h6>Email</h6>
								<strong><?php echo $email;?></strong>
							</div>
						</div>
						<!-- Column -->

						<!-- Column -->
						<div class="col-lg-3 col-xs-6 r-full-width">
							<div class="address-column">
								<span class="address-icon"><i class="fa fa-share-alt"></i></span>
								<h6>Follow us</h6>
								<ul class="social-icons">
				                	<li><a class="facebook" href="<?php echo $facebook;?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
				                    <li><a class="twitter" href="<?php echo $twitter;?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
				                    <li><a class="youtube" href="<?php echo $youtube;?>" target="_blank"><i class="fa fa-youtube-play"></i></a></li>
				                    <li><a class="pinterest" href="<?php echo $instagram;?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
				                </ul>
							</div>
						</div>
						<!-- Column -->

					</div>
				</div>
				<!-- Address Columns -->
								<!-- Form -->
				<div class="form-holder">

					<!-- Secondary heading -->
	        		<div class="sec-heading">
	        			<h3>Contact Form</h3>
	        		</div>
	        		<!-- Secondary heading -->

	        		<!-- Sending Form -->
	        		<form class="sending-form">
	        			<div class="row">
	        				<div class="col-sm-12">
			        			<div class="form-group">
			        				<textarea class="form-control" required="required" rows="5" placeholder="Text here..."></textarea>
			        				<i class="fa fa-pencil-square-o"></i>
			        			</div>
		        			</div>
		        			<div class="col-sm-4">
			        			<div class="form-group">
			        				<input class="form-control" required="required" placeholder="Full name">
			        				<i class="fa fa-user"></i>
			        			</div>
		        			</div>
		        			<div class="col-sm-4">
			        			<div class="form-group">
			        				<input class="form-control" required="required" placeholder="Phone no.">
			        				<i class="fa fa-phone"></i>
			        			</div>
		        			</div>
		        			<div class="col-sm-4">
			        			<div class="form-group">
			        				<input class="form-control" required="required" placeholder="Email">
			        				<i class="fa fa-envelope"></i>
			        			</div>
		        			</div>
		        			<div class="col-xs-12">
			        			<button class="btn-1 shadow-0 sm">send message</button>
		        			</div>
	        			</div>
	        		</form>
	        		<!-- Sending Form -->

				</div>
				<!-- Form -->

				<!-- Contact Map -->
				<div class="tc-padding-bottom">
					<div>
						<?php echo $map_url;?>
					</div>
				</div>

				<!-- Contact Map -->

			</div>
		</div>
		<!-- Contant Holder -->

	</main>
	<!-- Main Content -->

	<!-- Footer -->
	<?php include 'footer.php';?>
	<!-- Footer -->

</div>
<!-- Wrapper -->

<!-- Slide Menu -->
<nav id="menu" class="responive-nav">
	<a class="r-nav-logo" href="index.html"><img src="images/logo-1.png" alt=""></a>
	<ul class="respoinve-nav-list">
		<li>
			<a class="triple-eff" data-toggle="collapse" href="#list-1"><i class="pull-right fa fa-angle-down"></i>Home</a>
			<ul class="collapse" id="list-1">
				<li><a href="index.html">home 1</a></li>
				<li><a href="index-2.html">home 2</a></li>
			</ul>
		</li>
		<li>
			<a class="triple-eff" data-toggle="collapse" href="#list-2"><i class="pull-right fa fa-angle-down"></i>Shop</a>
			<ul class="collapse" id="list-2">
				<li><a href="shop.html">shop</a></li>
				<li><a href="shop-detail.html">shop Detail</a></li>
			</ul>
		</li>
		<li>
			<a class="triple-eff" data-toggle="collapse" href="#list-3"><i class="pull-right fa fa-angle-down"></i>Blog</a>
			<ul class="collapse" id="list-3">
				<li><a href="blog-all-views.html">blog all views</a></li>
				<li><a href="blog-larg.html">blog Larg</a></li>
				<li><a href="blog-list.html">blog List</a></li>
				<li><a href="blog-grid.html">blog Grid</a></li>
				<li><a href="blog-detail.html">blog detail</a></li>
			</ul>
		</li>
		<li>
			<a class="triple-eff" data-toggle="collapse" href="#list-4"><i class="pull-right fa fa-angle-down"></i>Pages</a>
			<ul class="collapse" id="list-4">
				<li><a href="about.html">about</a></li>
				<li><a href="gallery.html">gallery</a></li>
				<li><a href="event-list.html">event list</a></li>
				<li><a href="event-detail.html">event detail</a></li>
				<li><a href="book-list.html">blog list</a></li>
				<li><a href="book-detail.html">book detail</a></li>
				<li><a href="404.html">404</a></li>
			</ul>
		</li>
		<li>
			<a class="triple-eff" data-toggle="collapse" href="#list-5"><i class="pull-right fa fa-angle-down"></i>author</a>
			<ul class="collapse" id="list-5">
				<li><a href="author.html">author</a></li>
				<li><a href="author-detail.html">author detail</a></li>
			</ul>
		</li>
		<li><a href="contact.html">Contact</a></li>                       
	</ul>
</nav>
<!-- Slide Menu -->



<!-- Java Script -->
<script src="js/vendor/jquery.js"></script>        
<script src="js/vendor/bootstrap.min.js"></script>
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="js/gmap3.min.js"></script>					
<script src="js/datepicker.js"></script>					
<script src="js/contact-form.js"></script>					
<script src="js/bigslide.js"></script>					
<script src="js/3d-book-showcase.js"></script>					
<script src="js/turn.js"></script>							
<script src="js/jquery-ui.js"></script>								
<script src="js/mcustom-scrollbar.js"></script>					
<script src="js/timeliner.js"></script>					
<script src="js/parallax.js"></script>			   	 
<script src="js/countdown.js"></script>	
<script src="js/countTo.js"></script>		
<script src="js/owl-carousel.js"></script>	
<script src="js/bxslider.js"></script>	
<script src="js/appear.js"></script>		 		
<script src="js/sticky.js"></script>			 		
<script src="js/prettyPhoto.js"></script>			
<script src="js/isotope.pkgd.js"></script>					 
<script src="js/wow-min.js"></script>			
<script src="js/classie.js"></script>					
<script src="js/main.js"></script>	

<!-- Switcher JS -->
<script type="text/javascript" src="./switcher/cookie.js"></script>
<script type="text/javascript" src="./switcher/colorswitcher.js"></script>
<!-- Switcher JS -->
				
</body>
</html>