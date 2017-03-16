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
	<?php include 'admin/db.php';?>
	<!-- header -->
	<?php include 'header.php';?>
	<!-- Header -->

	<!-- Main Content -->
	<main class="main-content">
			<div class="col-md-12 books_header">
				<div class="main-heading-holder">
					<div class="main-heading style-3 padd" >
						<h2>Online <span class="theme-color">Book</span> Shop - Your Adventure Starts Here!</h2>
					</div>
				</div>
			</div>
			<div class="col-md-3 padd">	
				<div class="col-md-12 left_header">
					Categories
				</div>
				<div class="col-md-12 padd menu_wrp">
					<ul class="category_menu">
					<?php 
						$query = "SELECT * FROM categories WHERE category_type = 1 AND id !=6";
						$run   = mysqli_query($conn,$query);

						while($row = mysqli_fetch_array($run)){
							$cat_id    = $row['id'];
							$cat_name  = $row['category_name'];

							$query2 = "SELECT * FROM sub_categories WHERE parent_id = '$cat_id'";
							$run2   = mysqli_query($conn,$query2);
							if(mysqli_num_rows($run2)>=1){
								echo '<li class="toggle_item">'.$cat_name.'  <i class="fa fa-caret-down" aria-hidden="true" id="careta"></i></li>';
								echo '<ul class="sub_cat_menu">';
									while($row2 = mysqli_fetch_array($run2)){
										$sub_id   = $row2['id'];
										$sub_name = $row2['sub_category_name'];
										echo '<li><a href="shop.php?cate_id='.$sub_id.'">'.$sub_name.'</a></li>';
									}
								echo '</ul>';
							}else{
								echo '<li><a href="">'.$cat_name.'</a></li>';
							}
						}
						$query3 = "SELECT * FROM categories WHERE category_type = 2";
						$run3   = mysqli_query($conn,$query3);

						while($row3 = mysqli_fetch_array($run3)){
							$cat_id3    = $row3['id'];
							$cat_name3  = $row3['category_name'];


						}
					?>

					<?php 
						$query = "SELECT * FROM categories WHERE id = 6";
						$run   = mysqli_query($conn,$query);

						while($row = mysqli_fetch_array($run)){
							$cat_id    = $row['id'];
							$cat_name  = $row['category_name'];

							$query2 = "SELECT * FROM sub_categories WHERE parent_id = '$cat_id'";
							$run2   = mysqli_query($conn,$query2);
							if(mysqli_num_rows($run2)>=1){
								echo '<li class="toggle_item">'.$cat_name.'  <i class="fa fa-caret-down" aria-hidden="true" id="careta"></i></li>';
								echo '<ul class="sub_cat_menu">';
									while($row2 = mysqli_fetch_array($run2)){
										$sub_id   = $row2['id'];
										$sub_name = $row2['sub_category_name'];
										echo '<li><a href="shop.php?cate_id='.$sub_id.'">'.$sub_name.'</a></li>';
									}
								echo '</ul>';
							}else{
								echo '<li><a href="">'.$cat_name.'</a></li>';
							}
						}
						$query3 = "SELECT * FROM categories WHERE category_type = 2";
						$run3   = mysqli_query($conn,$query3);

						while($row3 = mysqli_fetch_array($run3)){
							$cat_id3    = $row3['id'];
							$cat_name3  = $row3['category_name'];
							echo '<li><a href="shop2.php?cate_id='.$cat_id3.'">'.$cat_name3.'</a></li>';
						}
					?>
					</ul>
				</div>
				<div class="col-md-12 left_header">
					Trade Books
				</div>
				<div class="col-md-12 featured_wrp">
					<?php
						$query8 = "SELECT * FROM books WHERE trade = 1 ORDER BY id DESC LIMIT 8";
						$run8   = mysqli_query($conn,$query8);

						while($row8 = mysqli_fetch_array($run8)){
							$id  			= $row8['id'];
				    		$isbn      		= $row8['isbn'];	
							$title      	= $row8['title'];
							$level      	= $row8['level'];
							$author      	= $row8['author'];
							$blurb      	= $row8['blurb'];
							$price      	= $row8['price'];
							$sale 			= $row8['sale'];
							$pages      	= $row8['pages'];
							$publisher     	= $row8['publisher'];
							$date      		= $row8['datee'];
							$status      	= $row8['status'];
							$picture 		= $row8['picture'];
							$category 		= $row8['category_id'];
							$sub_category  	= $row8['sub_category_id'];
							
							$query6 = "SELECT * FROM categories WHERE id = '$category'";
							$run6   = mysqli_query($conn,$query6);

							while($row6 = mysqli_fetch_array($run6)){
								$category_name = $row6['category_name'];
							}

							$query7 = "SELECT * FROM sub_categories WHERE id = '$sub_category'";
							$run7   = mysqli_query($conn,$query7);
							
							while($row7 = mysqli_fetch_array($run7)){
								$sub_category_name = $row7['sub_category_name'];
							}

							if($sale != '' or $sale != NULL){
								$sale_batch = '<span class="sale-bacth">sale</span>';
								$book_price = '<span class="new_price">'. $price.' GEL   </span>  '. $sale . ' GEL';
							}else{
								$book_price = $price .' GEL';
								$sale_batch = '';
							}

								echo '

										<div class="col-md-6 item itemsa">
						    				<div class="product-box">
						    					<div class="product-img" id="featured_img">
						    						<a href="book-detail.php?book_id='.$id.'">
						    							<img src="imgs/books/'.$picture.'" alt="">
						    						</a>
						    					</div>
						    				</div>
						    			</div>

									';
						}
					?>
				</div>

			</div>
			<div class="col-md-9">
				<?php
					$cate_id    = $_GET['cate_id'];

					echo $cate_id;

				/*	$query6 = "SELECT * FROM books WHERE category_id = ''"
*/
					
					if($cate_id == 'all'){
						$query5 = "SELECT * FROM books ORDER BY id DESC LIMIT 30";
						$run5   = mysqli_query($conn,$query5);
					}else{
						$query5 = "SELECT * FROM books WHERE '$cate_id' in (category_id) ORDER BY id DESC LIMIT 30";
						$run5   = mysqli_query($conn,$query5);
					}

					

					if(mysqli_num_rows($run5)>= 1){
						while($row5 = mysqli_fetch_array($run5)){
							$id  			= $row5['id'];
				    		$isbn      		= $row5['isbn'];	
							$title      	= $row5['title'];
							$level      	= $row5['level'];
							$author      	= $row5['author'];
							$blurb      	= $row5['blurb'];
							$price      	= $row5['price'];
							$sale 			= $row5['sale'];
							$pages      	= $row5['pages'];
							$publisher     	= $row5['publisher'];
							$date      		= $row5['datee'];
							$status      	= $row5['status'];
							$picture 		= $row5['picture'];
							$category 		= $row5['category_id'];
							$sub_category  	= $row5['sub_category_id'];
							
							$query6 = "SELECT * FROM categories WHERE id = '$category'";
							$run6   = mysqli_query($conn,$query6);

							while($row6 = mysqli_fetch_array($run6)){
								$category_name = $row6['category_name'];
							}

							$query7 = "SELECT * FROM sub_categories WHERE id = '$sub_category'";
							$run7   = mysqli_query($conn,$query7);
							
							while($row7 = mysqli_fetch_array($run7)){
								$sub_category_name = $row7['sub_category_name'];
							}

							if($sale != '' or $sale != NULL){
								$sale_batch = '<span class="sale-bacth">sale</span>';
								$book_price = '<span class="new_price">'. $price.' GEL   </span>  '. $sale . ' GEL';
							}else{
								$book_price = $price .' GEL';
								$sale_batch = '';
							}

							echo '

											<div class="col-md-3 item itemsa">
							    				<div class="product-box">
							    					<div class="product-img" id="shop_img">
							    						<a href="book-detail.php?book_id='.$id.'">
							    							<img src="imgs/books/'.$picture.'" alt="">
							    						</a>
							    						'.$sale_batch.'
							    					</div>
							    					<div class="product-detail">
							    						<span>'.$category_name.' </br> '.$sub_category_name.'</span>
							    						<h5><a href="book-detail.php?book_id='.$id.'">'.$title.'</a></h5>
							    						<div class="rating-nd-price">
							    							<strong>'.$book_price.'</strong>
							    						</div>
							    					</div>
							    				</div>
							    			</div>

										';
						}	
					}else{
						echo '<div class="col-md-12 no-posts"><h4>Sorry. No posts in this category yet...</h4></div>';
					}

				?>
			</div>
	</main>
	<!-- Main Content -->

	<!-- Footer -->
	<?php include 'footer.php';?>
	<!-- Footer -->

</div>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

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
				<script type="text/javascript">

					$(".toggle_item").click(function(){
					    var obj = $(this).next();
					    if($(obj).hasClass("hidden")){
					        $(obj).removeClass("hidden").slideDown();
					    } else {
					        $(obj).addClass("hidden").slideUp();
					    }
					 });

				</script>