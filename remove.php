<?php
	include 'admin/db.php';
	
	$id = $_GET['id'];

	$book_id  = $_GET['book_id'];

	$query  = "DELETE FROM tmp_orders WHERE id = '$id'";

	$run    = mysqli_query($conn,$query);

	header('location: cart.php');