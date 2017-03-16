<?php ob_start();?>

<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="user-scalable=0, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
	<title>OnlineBookShop- Admin</title>
	<link href="https://fonts.googleapis.com/css?family=Advent+Pro" rel="stylesheet">
</head>
<body>
	<?php include 'nav.php';?>
	<div class="col-md-12">
		<div class="container">
			<div class="col-md-12 dashboard_title_wrp">
				<h2>OnlineBookShop - სამართავი პანელი</h2>
			</div>
			<div class="col-md-12 dashboard_buttons_main_wrp">
				<div class="col-md-4 dashboard_buttonsi">
					<a href="books.php">
					<div class="col-md-12 dashboard_buttons_wrp">
						<h2><i class="fa fa-book" aria-hidden="true"></i> წიგნები</h2>
					</div>
					</a>
				</div>
				<div class="col-md-4 dashboard_buttonsi">
					<a href="categories.php">
					<div class="col-md-12 dashboard_buttons_wrp">
						<h2><i class="fa fa-list" aria-hidden="true"></i> კატეგორიები</h2>
					</div>
					</a>
				</div>
				<div class="col-md-4 dashboard_buttonsi">
					<a href="sub_categories.php">
					<div class="col-md-12 dashboard_buttons_wrp">
						<h2><i class="fa fa-list-ol" aria-hidden="true"></i> ქვეკატეგორიები</h2>
					</div>
					</a>
				</div>
				<div class="col-md-4 dashboard_buttonsi">
					<a href="pages.php">
					<div class="col-md-12 dashboard_buttons_wrp">
						<h2><i class="fa fa-file-o" aria-hidden="true"></i> გვერდები</h2>
					</div>
					</a>
				</div>
				<div class="col-md-4 dashboard_buttonsi">
					<a href="products.php">
					<div class="col-md-12 dashboard_buttons_wrp">
						<h2><i class="fa fa-cubes" aria-hidden="true"></i> სხვა პროდუქტები</h2>
					</div>
					</a>
				</div>
				<div class="col-md-4 dashboard_buttonsi">
					<a href="contact.php">
					<div class="col-md-12 dashboard_buttons_wrp">
						<h2><i class="fa fa-phone" aria-hidden="true"></i> კონტაქტი</h2>
					</div>
					</a>
				</div>
				<div class="col-md-4 dashboard_buttonsi">
					<a href="orders.php">
					<div class="col-md-12 dashboard_buttons_wrp">
						<h2><i class="fa fa-credit-card-alt" aria-hidden="true"></i> Orders</h2>
					</div>
					</a>
				</div>
				<div class="col-md-4 dashboard_buttonsi">
					<a href="keywords.php">
					<div class="col-md-12 dashboard_buttons_wrp">
						<h2><i class="fa fa-key" aria-hidden="true"></i> Keywords</h2>
					</div>
					</a>
				</div>
				<div class="col-md-4 dashboard_buttonsi">
					<a href="reviews.php">
					<div class="col-md-12 dashboard_buttons_wrp">
						<h2><i class="fa fa-comment-o" aria-hidden="true"></i> Reviews</h2>
					</div>
					</a>
				</div>
			</div>
		</div>
	</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</html>

