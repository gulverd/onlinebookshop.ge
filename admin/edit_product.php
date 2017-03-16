<?php 
	ob_start();
?>
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

		$product_id = $_GET['product_id'];

		$query1 = "SELECT * FROM products WHERE id = '$product_id'";
		$run1   = mysqli_query($conn,$query1);

		while($row1 = mysqli_fetch_array($run1)){
			$product_namea = $row1['product_name'];
			$product_desca = $row1['product_description'];
		}	
	?>
	<div class="col-md-12">
		<div class="container">
			<div class="col-md-12 buti_wrapper_partners">
				<a href="products.php" class="btn btn-default"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> უკან დაბრუნება</a>
			</div>
			<div class="col-md-12 dashboard_buttons_main_wrp">
				<form method="post" action="">
					<div class="form-group">
						<label>გვერდის რედაქტირება</label>
						<input type="text" name="product_name" class="form-control" placeholder="About Company" value="<?php echo $product_namea;?>">
					</div>
					<div class="form-group">
						<label>გვერდის აღწერა</label>
						<textarea name="product_description"><?php echo $product_desca;?></textarea>
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

		$queryI = "UPDATE products SET product_name = '$product_name' ,product_description = '$product_description' WHERE id = '$product_id'";
		$runI   = mysqli_query($conn,$queryI);


		header('Location: edit_product.php?product_id='.$product_id);

	}
?>