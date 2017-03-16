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
		
	<!-- Main Content -->
	<main class="main-content">
		<div class="container">
			<div class="col-md-9 car_wrp">
	
					<form action="" method="POST">
						<?php 
							$session_id = session_id();
							$query = "SELECT a.id,a.qty,a.price, b.title,b.picture 
										FROM tmp_orders a 
										INNER JOIN books b ON a.item_id = b.id 
										WHERE a.session_id = '$session_id'";
							$run   = mysqli_query($conn,$query);

							$count = mysqli_num_rows($run);

							if($count >= 1){
								echo '
								<table class="table table-bordered">
									<tr>
										<td id="pic_td">Item Image</td>
										<td id="left_td">Item Title</td>
										<td id="cent_td">Quantity</td>
										<td id="cent_td">Price</td>
										<td id="cent_td">Total Price</td>
										<td id="cent_td"><i class="fa fa-times" aria-hidden="true"></i></td>
									</tr>';
								$total_array  	 = array();
								$total_qty_array = array();
								while($row = mysqli_fetch_array($run)){
									$id      = $row['id'];
									$qty     = $row['qty'];
									$price   = $row['price'];
									$picture = $row['picture'];
									$title   = $row['title'];
									$item_total  =  $qty * $price;
									
									echo '
										<tr>
											<td id="pic_td"><img src="imgs/books/'.$picture.'" id="cart_book_img"></td>
											<td id="left_td">'.$title.'</td>
											<td id="cent_td">'.$qty.'</td>
											<td id="cent_td">'.$price.' GEL </td>
											<td id="cent_td">'.$item_total.' GEL </td>
											<td id="cent_td"><a href="remove.php?id='.$id.'"><i class="fa fa-times" aria-hidden="true"></i></td>
										</tr>
									';
									array_push($total_array,$item_total);
									array_push($total_qty_array,$qty);
								}
								echo '</table>';

								$total_count = array_sum($total_qty_array);
								$total_price = array_sum($total_array);
							}else{
								echo '<div class="col-md-12 empty_cart_wrp">
									  	<div class="col-md-12 empty_panel">
									  		Your cart is empty!
									  	</div>
									  </div>';
							}

						?>
					</form>
				
			</div>
			<div class="col-md-3 right_bag_wrp">
			<?php
				
				if($count >= 1){
					echo '<table class="table table-bordered">
						<tr>
							<td>Subtotal: ('.$total_count.' Item)</td>
							<td id="total">'.$total_price.' GEL</td>
						</tr>
						<tr>
							<td colspan="2">
								<a href="checkout.php" class="btn-1 sm shadow-0" id="form_sbmt">Proceed to checkout</a>
							</td>
						</tr>
					</table>';
				}
			?>
			</div>
		</div>
	</main>
	<!-- Main Content -->

	<!-- Footer -->
	<?php include 'footer.php';?>
	<!-- Footer -->

</div>
<!-- Wrapper -->

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