<?php
	ob_start();
	include 'db.php';

	$page_id = $_GET['page_id'];

		
	$query  = "DELETE FROM pages WHERE id = '$page_id'";
	$run    = mysqli_query($conn,$query);
		
	header('location:pages.php');
	

