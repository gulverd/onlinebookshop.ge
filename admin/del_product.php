<?php
	ob_start();
	include 'db.php';

	$product_id = $_GET['product_id'];

		
	$query  = "DELETE FROM products WHERE id = '$product_id'";
	$run    = mysqli_query($conn,$query);
		
	header('location:products.php');
	

