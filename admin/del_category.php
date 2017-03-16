<?php
	
	ob_start();
	include 'db.php';

	$cat_id = $_GET['cat_id'];

		
	$query  = "DELETE FROM categories WHERE id = '$cat_id'";
	$run    = mysqli_query($conn,$query);

	$query2 = "DELETE FROM sub_categories WHERE parent_id = '$cat_id'";
	$run2   = mysqli_query($conn,$query2);

	$query3 = "DELETE FROM books WHERE category_id = '$cat_id'";
	$run3   = mysqli_query($conn,$query3);
		
	header('location:categories.php');
	
?>

