<?php 
	ob_start();
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
	<?php
		include 'header.php';
		$orderNumber  = $_GET['order_id'];

			

	?>
	<!-- Main Content -->
	<main class="main-content">
		<div class="container">
			<div class="col-md-9 car_wrp">
				<div class="col-md-12 padd lefta_wrp">
					<div class="col-md-12 padd">
						<div class="col-md-12 padd" id="billing_header">
							<h4>Order Owner Information</h4>
						</div>
						<div class="col-md-12">
							<?php 
								$queryUserInfo = "SELECT * FROM order_owners WHERE order_number = '$orderNumber'";
								$runUserInfo   = mysqli_query($conn,$queryUserInfo);

								while($rowUserInfo = mysqli_fetch_array($runUserInfo)){
									$fname 		= $rowUserInfo['fname'];
									$lname 		= $rowUserInfo['lname'];
									$email 		= $rowUserInfo['email'];
									$phone 		= $rowUserInfo['phone'];
									$p_id   	= $rowUserInfo['p_id'];
									$delivery 	= $rowUserInfo['delivery_price'];
									$city 	    = $rowUserInfo['city'];
									$street 	= $rowUserInfo['street'];
									$additional = $rowUserInfo['additional'];
								}
							?>
							<table class="table table-bordered">
								<tr>
									<td><?php echo $fname;?></td>
									<td><?php echo $lname;?></td>
									<td><?php echo $p_id;?></td>
									<td><?php echo $phone;?></td>
								</tr>
								<tr>
									<td><?php echo $email;?></td>
									<td><?php echo $city;?></td>
									<td colspan="2"><?php echo $street;?></td>									
								</tr>
								<tr>
									<td colspan="4"><?php echo $additional;?></td>
								</tr>
							</table>
						</div>
						<div class="col-md-12 padd" id="billing_header">
							<h4>Order Details</h4>
						</div>
						<div class="col-md-12">
							<table class="table table-bordered">
								<tr>
									<td id="pic_td">Item Image</td>
									<td id="left_td">Item Title</td>
									<td id="cent_td">Quantity</td>
									<td id="cent_td">Price</td>
									<td id="cent_td">Total Price</td>
								</tr>
							
							<?php
								$items_count = array();
								$items_price = array();
								$queryOrder = "SELECT a.item_id as item_id ,a.qty as qty,a.price as price,b.title as title,b.picture as picture
								FROM orders a INNER JOIN books b ON a.item_id = b.id 
								WHERE order_number = '$orderNumber'";
								$runOrder 	= mysqli_query($conn,$queryOrder);

								while($rowOrder = mysqli_fetch_array($runOrder)){
									$item_id 	= $rowOrder['item_id'];
									$picture	= $rowOrder['picture'];
									$title 		= $rowOrder['title'];
									$qty 		= $rowOrder['qty'];
									$price 		= $rowOrder['price'];
									$total_items_price = $qty*$price;

									array_push($items_count, $qty);
									array_push($items_price,$total_items_price);

									echo '<tr>
											<td><img src="imgs/books/'.$picture.'" id="cart_book_img"></td>
											<td id="left_td">'.$title.'</td>
											<td id="cent_td">'.$qty.'</td>
											<td id="cent_td">'.$price.' GEL </td>
											<td id="cent_td">'.$total_items_price.' GEL</td>
										</tr>';

								}

								$total_items = array_sum($items_count);
								$total_items_amount = array_sum($items_price);
								$total_price = $total_items_amount+$delivery;
							?>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3 right_bag_wrp">
				<table class="table table-bordered">
					<tr>
						<td>Total items</td>
						<td><?php echo $total_items;?></td>
					</tr>
					<tr>
						<td>Total items price</td>
						<td><?php echo $total_items_amount;?> GEL</td>
					</tr>
					<tr>
						<td>Delivery price</td>
						<td><?php echo $delivery;?> GEL</td>
					</tr>
					<tr>
						<td>Total price</td>
						<td><?php echo $total_price;?> GEL</td>
					</tr>
					<tr>
						<td colspan="2">

<?php

	include 'cert/tbcpay.lib.php';

			$tetri 	 = $total_price *100;

			$Payment = new tbcpay( 'https://securepay.ufc.ge:18443/ecomm2/MerchantHandler', __DIR__ . '/cert/cert/tbcpay.pem', 'Globalupper1133)*', $_SERVER['REMOTE_ADDR'],  $tetri, 981, 'Order Number: '. $orderNumber, 'GE' );

			$start = $Payment->sms_start_transaction();

			if ( isset($start['TRANSACTION_ID']) AND !isset($start['error']) ) {
				$trans_id = $start['TRANSACTION_ID'];
			}

			//print $trans_id;
?>
			     <script type="text/javascript" language="javascript">
			        function redirect() {
			          document.returnform.submit();
			        }
			    </script>							
							<form name="returnform" action="https://securepay.ufc.ge/ecomm2/ClientHandler" method="POST">
								 <input type="hidden" name="trans_id" value="<?php echo $trans_id; ?>">
								<input type="submit" name="submit" class="btn-1 sm shadow-0" id="form_sbmt" value="Checkout">
							</form>       

						</td> 
					</tr>
				</table>
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

