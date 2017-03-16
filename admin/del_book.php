<?php

	ob_start();

	include 'db.php';

	$book_id = $_GET['book_id'];
	
	$query4 = "DELETE FROM books WHERE id = '$book_id'";
	$run4   = mysqli_query($conn,$query4);

	header('location:books.php');
	
?>

