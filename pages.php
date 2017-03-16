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
	<link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/icomoon.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/color-1.css">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="css/responsive.css">
	<link rel="stylesheet" href="css/transition.css">
	<link rel="stylesheet" href="http://www.atlasestateagents.co.uk/css/tether.min.css">
	<script src="http://www.atlasestateagents.co.uk/javascript/tether.min.js"></script>
	<link rel="stylesheet" id="skins" href="./css/default.css" type="text/css" media="all">
	<link href='https://fonts.googleapis.com/css?family=Merriweather:300,300italic,400italic,400,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Lato:400,300,300italic,400italic,700,700italic,900italic,900,100italic,100' rel='stylesheet' type='text/css'>
	<script src="js/vendor/modernizr.js"></script>
</head>
<body>


<!-- Wrapper -->
<div class="wrapper push-wrapper">
<?php 
	include 'header.php';

	include 'admin/db.php';

	$page_id = $_GET['page_id'];

	$query = "SELECT * FROM pages WHERE id = '$page_id'";
	$run   = mysqli_query($conn,$query);

	while($row = mysqli_fetch_array($run)){
		$page_description = $row['page_description'];
		$page_name 		  = $row['page_name'];
		
	}

?>
	<!-- Main Content -->
	<main class="main-content">

		<!-- Contant Holder -->
		<div class="tc-padding">
			<div class="container">

				<!-- Address Columns -->
				<div class="tc-padding-bottom">
					<div class="row">
						<div class="col-md-12" id="page_name_wrp">
							<h3><?php echo $page_name;?></h3>
						</div>
						<div class="col-md-12">
							<?php echo $page_description;?>
						</div>
					</div>
				</div>

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