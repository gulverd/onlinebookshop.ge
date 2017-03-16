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
	<?php include 'header.php';?>
	<?php
		$selectOrderNumber = "SELECT order_number FROM orders";
		$runOrderNumber    = mysqli_query($conn,$selectOrderNumber);

		while($rowOrderNumber = mysqli_fetch_array($runOrderNumber)){
			$orderNumber      = $rowOrderNumber['order_number'] + 1;
		}
	?>
	<!-- Main Content -->
	<main class="main-content">
		<div class="container">

		<form action="" method="POST">
			<div class="col-md-9 car_wrp">
				<div class="col-md-12 padd lefta_wrp">
					<div class="col-md-12 padd">
						<div class="col-md-12 padd" id="billing_header">
							<h4>BILLING & SHIPPING</h4>
						</div>
						<div class="col-md-6 left_col">
							<div class="form-group">
								<input type="text" name="first_name" class="form-control" placeholder="First Name">
							</div>
						</div>
						<div class="col-md-6 padd">
							<div class="form-group">
								<input type="text" name="last_name" class="form-control" placeholder="Last Name">
							</div>
						</div>
						<div class="col-md-12 padd">
							<div class="form-group">
								<input type="text" name="p_id" class="form-control" placeholder="Identification Number (ID)">
							</div>
						</div>
						<div class="col-md-6 left_col">
							<div class="form-group">
								<input type="email" name="email" class="form-control" placeholder="Email">
							</div>
						</div>
						<div class="col-md-6 padd">
							<div class="form-group">
								<input type="text" name="phone" class="form-control" placeholder="Phone Number">
							</div>
						</div>
						<div class="col-md-6 left_col">
							<div class="form-group">
								<select class="form-control" name="city" id="select_city">
									<option value="Tbilisi">Tbilisi</option>
									<option value="Batumi">Batumi</option>
									<option value="Kutaisi">Kutaisi</option>
									<option value="Rustavi">Rustavi</option>
									<option value="Gori">Gori</option>
									<option value="Zugdidi">Zugdidi</option>
									<option value="Poti">Poti</option>
									<option value="Khashuri">Khashuri</option>
									<option value="Samtredia">Samtredia</option>
									<option value="Senaki">Senaki</option>
									<option value="Zestafoni">Zestafoni</option>
									<option value="Marneuli">Marneuli</option>
									<option value="Telavi">Telavi</option>
									<option value="Akhaltsikhe">Akhaltsikhe</option>
									<option value="Kobuleti">Kobuleti</option>
									<option value="Ozurgeti">Ozurgeti</option>
									<option value="Kaspi">Kaspi</option>
									<option value="Chiatura">Chiatura</option>
									<option value="Tsqaltubo">Tsqaltubo</option>
									<option value="Sagarejo">Sagarejo</option>
									<option value="Gardabani">Gardabani</option>
									<option value="Borjomi">Borjomi</option>
									<option value="Tqibuli">Tqibuli</option>
									<option value="Khoni">Khoni</option>
									<option value="Bolnisi">Bolnisi</option>
									<option value="Akhalkalaki">Akhalkalaki</option>
									<option value="Gurjaani">Gurjaani</option>
									<option value="Mtskheta">Mtskheta</option>
									<option value="Qvareli">Qvareli</option>
									<option value="Akhmeta">Akhmeta</option>
									<option value="Kareli">Kareli</option>
									<option value="Lanchkhuti">Lanchkhuti</option>
									<option value="Tsalenjikha">Tsalenjikha</option>
									<option value="Dusheti">Dusheti</option>
									<option value="Sachkhere">Sachkhere</option>
									<option value="Dedoplistsqaro">Dedoplistsqaro</option>
									<option value="Lagodekhi">Lagodekhi</option>
									<option value="Ninotsminda">Ninotsminda</option>
									<option value="Abasha">Abasha</option>
									<option value="Tsnori">Tsnori</option>
									<option value="Terjola">Terjola</option>
									<option value="Martvili">Martvili</option>
									<option value="Jvari">Jvari</option>
									<option value="Khobi">Khobi</option>
									<option value="Vani">Vani</option>
									<option value="Baghdati">Baghdati</option>
									<option value="Vale">Vale</option>
									<option value="Tetritsqaro">Tetritsqaro</option>
									<option value="Tsalka">Tsalka</option>
									<option value="Dmanisi">Dmanisi</option>
									<option value="Oni">Oni</option>
									<option value="Ambrolauri">Ambrolauri</option>
									<option value="Sighnaghi">Sighnaghi</option>
									<option value="Tsageri">Tsageri</option>
								</select>
							</div>
						</div>
						<div class="col-md-6 padd">
							<div class="form-group">
								<input type="text" name="street" class="form-control" placeholder="Street Address">
							</div>
						</div>	
					</div>
					<div class="col-md-12 padd">
						<div class="col-md-12 padd" id="billing_header">
							<h4>Additional Information</h4>
						</div>
						<div class="col-md-12 padd" id="additional_wrp">
							<textarea class="form-contol" name="additional"></textarea>
						</div>
					</div>
					<div class="col-md-12 padd">
						<div class="col-md-12 padd" id="billing_header">
							<h4>YOUR ORDER</h4>
						</div>
						
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

					</div>
				</div>
			</div>
			<div class="col-md-3 right_bag_wrp">
			<?php
				if($count >= 1){
					echo '<table class="table table-bordered">
							<tr>
								<td colspan="2">
									<div class="form-group">
										<label class="cart_label">SHIPPING AND HANDLING</label>
										<select name="delivery" class="selecta">
											<option value="0">BookShop pickup 0 GEL</option>
											<option value="3.5">Delivery in Tbilisi 3.5 GEL</option>
											<option value="8.5">Delivery in Outside Tbilisi 8.5 GEL</option>
										</select>
									</div>
								</td>
							</tr>
							<tr>
								<td>Subtotal: ('.$total_count.' Item)</td>
								<td id="total">'.$total_price.' GEL</td>
							</tr>
							<tr id="suma_wrp">
								<td colspan="2">
								 	<input type="text" name="suma" id="suma">
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<input type="submit" name="submit" class="btn-1 sm shadow-0" id="form_sbmt" value="Place Order">
								</td>
							</tr>
						</table>';
					}
			?>
			</div>
			</form>
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

<script type="text/javascript">
	var price    = '<?php echo $total_price;?>';

	$("#suma").val(Number(price));

    $('.selecta').on("change",function () {
    	var price    = '<?php echo $total_price;?>';
	    var delivery = $(this).find('option:selected').val();
	    $("#total").html(Number(price)+Number(delivery) + ' GEL');
	    $("#suma").val(Number(price)+Number(delivery));
	});

</script>					
</body>
</html>

<?php

	if(isset($_POST['submit'])){
		$fname  			= $_POST['first_name'];
		$lname  			= $_POST['last_name'];
		$p_id   			= $_POST['p_id'];
		$email  			= $_POST['email'];
		$city   			= $_POST['city'];
		$street 			= $_POST['street'];
		$additional 		= $_POST['additional'];
		$suma 				= $_POST['suma'];
		$delivery_price     = $_POST['delivery'];
		$phone  			= $_POST['phone'];


		$queryOrderOwner   = "INSERT INTO order_owners (fname,lname,p_id,email,phone,city,additional,street,order_number,delivery_price)
		VALUES ('$fname','$lname','$p_id','$email','$phone','$city','$additional','$street','$orderNumber','$delivery_price')";
		$runOrderOwner     = mysqli_query($conn,$queryOrderOwner);

		$orderQuery = "SELECT a.id,a.qty,a.price, b.title,b.picture,b.id as ida, b.isbn
			FROM tmp_orders a 
			INNER JOIN books b ON a.item_id = b.id 
			WHERE a.session_id = '$session_id'";

		$runOrderQuery = mysqli_query($conn,$orderQuery);

		while($rowOrderQuery = mysqli_fetch_array($runOrderQuery)){
				$isbna    = $rowOrderQuery['isbn'];
				$qtya     = $rowOrderQuery['qty'];
				$pricea   = $rowOrderQuery['price'];
				$item_ida = $rowOrderQuery['ida'];

				//echo $item_ida . ' - '.  $isbna . ' - ' . $qtya . ' - ' . $pricea .'</br>';
				$queryInsertOrder = "INSERT INTO orders (item_id,qty,price,order_number,payment_status)
											VALUES ('$item_ida','$qtya','$pricea','$orderNumber','NOT')";

				$RunInsertOrder = mysqli_query($conn,$queryInsertOrder); 
		}

		$headers = "Content-Type: text/plain; charset=utf-8";

		


				

		$order_details = array();
		$orderQuerya = "SELECT a.id,a.qty,a.price, b.title,b.picture,b.id as ida, b.isbn
			FROM tmp_orders a 
			INNER JOIN books b ON a.item_id = b.id 
			WHERE a.session_id = '$session_id'";
		$runOrderQuerya = mysqli_query($conn,$orderQuerya);

		while($rowOrderQuerya = mysqli_fetch_array($runOrderQuerya)){
			$isbna    = $rowOrderQuerya['isbn'];
			$qtya     = $rowOrderQuerya['qty'];
			$pricea   = $rowOrderQuerya['price'];
			$titlea   = $rowOrderQuerya['title'];
			$string   = 'BOOK ISBN: '. $isbna . ' ' . 'Title: ' . $titlea. ' ' . 'Quantity: ' . $qtya . ' ' .'Price : '. $pricea;  
			array_push($order_details,$string);
						
		}
		print_r($order_details);	
/*		$message = "First Name:  ".$fname ."\n". "Last Name:  ". $lname ."\n". "Personal ID:   ". $p_id ."\n". "E-mail:   ". $email ."\n"."Phone:   ". $phone ."\n"."Address:   ".$street ."\n"."City:   " .$city ."\n"."Additional Information:   ".$additional . "\n" ."ORDER DETAILS: ";

        mail('v.pataraia@englishbook.co.uk', 'Certificate Payment  - '.$orderNumber, $message, $headers);

		header('Location: orders.php?order_id='.$orderNumber);*/
	}

?>