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
	<script src="//cdn.ckeditor.com/4.5.11/full/ckeditor.js"></script>
</head>
<body>
	<?php 
		include 'db.php';
		include 'nav_in.php';
	?>
	<div class="col-md-12">
		<div class="container">
			<div class="col-md-12 buti_wrapper_partners">
				<a href="products.php" class="btn btn-default"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> უკან დაბრუნება</a>
			</div>
			<div class="col-md-12 dashboard_buttons_main_wrp">
				<form method="post" action="">
					<div class="form-group">
						<label>პტოდუქტის დასახელება</label>
						<input type="text" name="product_name" class="form-control" placeholder="TEACHERS LOYALTY CARD">
					</div>
					<div class="form-group">
						<label>პროდუქტის აღწერა</label>
						<textarea name="product_description"></textarea>
		        		<script>
		           			CKEDITOR.replace('product_description');
		       	 		</script>
					</div>
					<div class="form-group">
						<input type="submit" name="submit" value="შენახვა" class="btn btn-primary submit">
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</html>

<?php

	if(isset($_POST['submit'])){

		$product_name 			= $_POST['product_name'];
		$product_description	= $_POST['product_description'];

		$queryI  	 	 = "INSERT INTO products (product_name,product_description) VALUES ('$product_name','$product_description')";
		$runI 			 = mysqli_query($conn,$queryI);


		header('Location: products.php');

	}