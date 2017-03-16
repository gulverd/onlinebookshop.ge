<?php 
	session_start();
	ob_start();
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
	<?php

		include 'admin/db.php';
		$book_id = $_GET['book_id'];
		$query  = "SELECT * FROM books WHERE id = '$book_id'";
		$run    = mysqli_query($conn,$query);

		while($row = mysqli_fetch_array($run)){

			$isbn      		= $row['isbn'];	
			$title      	= $row['title'];
			$level      	= $row['level'];
			$author      	= $row['author'];
			$blurb      	= $row['blurb'];
			$price      	= $row['price'];
			$sale 			= $row['sale'];
			$pages      	= $row['pages'];
			$publisher     	= $row['publisher'];
			$date      		= $row['datee'];
			$status      	= $row['status'];
			$picture 		= $row['picture'];
			$category 		= $row['category_id'];
			$sub_category  	= $row['sub_category_id'];
			$parent_id      = $row['parent_id'];
			$book_type		= $row['book_type'];
		}	

			$query1 = "SELECT * FROM categories WHERE id = '$category'";
			$run1   = mysqli_query($conn,$query1);

			while($row1 = mysqli_fetch_array($run1)){
				$category_name = $row1['category_name'];
			}

		$query2 = "SELECT * FROM sub_categories WHERE id = '$sub_category'";
		$run2   = mysqli_query($conn,$query2);

		while($row2 = mysqli_fetch_array($run2)){
			$sub_category_name = $row2['sub_category_name'];
		}

		if($status == 1){
			$statusa = '<strong>In Stock<i class="fa fa-check-circle"></i></strong>';
		}else{
			$statusa = '<strong><span id="out">Out Of Stock <i class="fa fa-minus-circle" aria-hidden="true"></i></span></strong>';
		}

		if($sale != '' or $sale != NULL){
			$book_price = '<span class="new_price">'. $price.' GEL </span> | '. $sale . ' GEL';
			$b_price    = $sale;
		}else{
			$book_price = $price .' GEL';
			$b_price 	= $price;
		}
	?>
		<!-- Book Detail -->
		<div class="book-detail">
			<div class="container">

				<!-- Single Book Detail -->
				<div class="single-boook-detail">
					<div class="row">
						<div class="breadcrumbs">
			  				<ul>
			  					<li><?php 
			  						if($book_type == 1){
			  							echo $category_name;
			  						}else{
			  							$cat_array = explode(',', $category);
														for($x=0; $x<sizeof($cat_array); $x++){
															$query1 = "SELECT * FROM categories WHERE id = '$cat_array[$x]'";
															$run1   = mysqli_query($conn,$query1);

															while($row1 = mysqli_fetch_array($run1)){
																$category_name = $row1['category_name'];
																echo $category_name . ' / ';
															}
														}
			  						}
			  					?>
			  						</li>
			  					<?php
			  						if($book_type == 1){
			  							echo '<li>'.$sub_category_name .'</li>';
			  						}
			  					?>
			  				</ul>
			  			</div>
						<!-- Book Thumnbnail -->
						<div class="col-lg-4 col-md-5">
							<div class="product-thumnbnail">
								<ul class="product-slider">
								  	<li>
								  		<img src="imgs/books/<?php echo $picture;?>" alt="">
								  	</li>
								</ul>
							</div>					
						</div>
						<!-- Book Thumnbnail -->

						<!-- book Detail -->
						<div class="col-lg-8 col-md-7">
							<div class="single-product-detail">
								<span class="availability">STOCK STATUS : <?php echo $statusa;?></span>
								<h3><?php echo $title;?></h3>
    							<div class="book-info-list">
									<ul>
										<li><span>ISBN: </span><?php echo $isbn;?></li>
										<li><span>CATEGORY: </span>
											<?php 
												if($book_type == 1){
													echo $category_name;
												}else{
													$cat_array = explode(',', $category);
														for($x=0; $x<sizeof($cat_array); $x++){
															$query1 = "SELECT * FROM categories WHERE id = '$cat_array[$x]'";
															$run1   = mysqli_query($conn,$query1);

															while($row1 = mysqli_fetch_array($run1)){
																$category_name = $row1['category_name'];
																echo $category_name . ' , ';
															}
														}
												}
												 
												if($book_type == 1){
													echo ' / ' . $sub_category_name;
												} 
											?>
										</li>
										<li><span>PUBLISHER: </span><?php echo $publisher;?></li>
										<li><span>AUTHOR: </span><?php echo $author;?></li>
										<?php
											if($book_type == 1){
												echo '<li><span>LEVEL: </span>'.$level .'</li>';
											}
										?>
										
										<li><span>PAGE NUMBERS: </span><?php echo $pages;?></li>								
									</ul>
								</div>
								<div class="col-md-12 padd" id="price_wrp">
									<h3>Book Price: <span><?php echo $book_price;?></span></h3>
								</div>		
							</div>
						</div>
						<!-- book Detail -->
						<div class="col-md-12 book_menu">
							<div class="col-sm-4">
								<form action="" method="POST">
									<div class="col-md-12 padd lefts">
										<input type="number" value="1" class="form-control" name="qty" placeholder="Quantity" min="1">
									</div>
									<div class="col-md-12 padd lefts">
				    					<button name="submit" class="btn-1 sm shadow-0" id="form_sbmt">Add to cart <i class="fa fa-shopping-bag" aria-hidden="true"></i></button>
				    				</div>
								</form>
								<div class="col-md-12 padd">
									<span id="desc">Description</span>
								</div>
								<div class="col-md-12 padd">
									<span id="comm">Comments</span>
								</div>
							</div>
							<div class="col-sm-8">
								<div class="col-md-12 padd" id="desc_wrp">
									<?php echo $blurb;?>
								</div>
								<div class="col-md-12 padd" id="comm_wrp">
									Comments
								</div>
							</div>
						</div>

					</div>
				</div>
				<!-- Single Book Detail -->
			</div>
		</div>
		<!-- Book Detail -->

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
	var status = '<?php echo $status;?>';
	if(status == 0){
		$('.lefts').hide();
	}
	$('#desc').click(function(){
		$('#desc_wrp').show();
		$('#comm_wrp').hide();
	});
	$('#comm').click(function(){
		$('#desc_wrp').hide();
		$('#comm_wrp').show();
	});
</script>					
</body>
</html>

<?php
	$session_id = session_id();

	$select_tmp  	= "SELECT * FROM tmp_orders WHERE session_id = '$session_id'";
	$run_select_tmp = mysqli_query($conn,$select_tmp);
	
	$items_array    = array();
	
	while($rowSelect = mysqli_fetch_array($run_select_tmp)){
		array_push($items_array,$rowSelect['item_id']);
	}

	if(isset($_POST['submit'])){
		$qty = $_POST['qty'];
		
		if(in_array($book_id, $items_array)){
			$query_qty = "SELECT qty FROM tmp_orders WHERE session_id = '$session_id' AND item_id = '$book_id'";
			$run_qty   = mysqli_query($conn,$query_qty);

			while($row_qty = mysqli_fetch_array($run_qty)){
				$count_qty = $row_qty['qty'];
			}
			$update_qty = $count_qty + $qty;

			$query_tmp = "UPDATE tmp_orders SET qty = '$update_qty' WHERE session_id = '$session_id' AND item_id = '$book_id'";
			$run_tmp   = mysqli_query($conn,$query_tmp);
			header('location: book-detail.php?book_id='.$book_id);
		}else{
			$query_tmp = "INSERT INTO tmp_orders (session_id,item_id,qty,price) 
			VALUES ('$session_id','$book_id','$qty','$b_price')";
			$run_tmp   = mysqli_query($conn,$query_tmp);
			header('location: book-detail.php?book_id='.$book_id);
		}

	}
?>