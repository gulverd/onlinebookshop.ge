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
<!-- Wrapper -->
<div class="wrapper push-wrapper">

	<!-- Header -->
	<?php include 'header.php';?>
	<!-- Header -->

	<!-- Main Content -->
	<main class="main-content">
	
		<!-- Upcoming Release -->
		<?php include 'upcoming.php';?>
		<!-- Upcoming Release -->

		<!-- Best Seller Products -->
		<?php include 'best_seller.php';?>
		<!-- Best Seller Products -->
		<!-- Recomend products -->
		<?php include 'recomended.php';?>
		<!-- Recomend products -->

		<!-- Book Collections -->
		<?php include 'book_collection.php';?>
		<!-- Book Collections --> 

		<!-- Related Products -->
		<?php //include 'related.php ';?>
		<!-- Related Products -->  

	</main>
	<!-- Main Content -->

	<!-- Footer -->
	<?php include 'footer.php';?>
	<!-- Footer -->

</div>
<!-- Wrapper -->

	<!-- Java Script -->
	<script src="js/vendor/jquery.js"></script>        
	<script src="js/vendor/bootstrap.min.js"></script>				
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

</body>
</html>

<?php include 'search.php';?>