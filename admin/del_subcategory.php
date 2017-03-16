<?php
	

	ob_start();

	include 'db.php';

	$cat_id = $_GET['cat_id'];
	
	$query4 = "DELETE FROM sub_categories WHERE id = '$cat_id'";
	$run4   = mysqli_query($conn,$query4);

	$query3 = "DELETE FROM books WHERE sub_category_id = '$cat_id'";
	$run3   = mysqli_query($conn,$query3);

	header('location:sub_categories.php');
	
?>

