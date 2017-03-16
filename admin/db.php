<?php
	$conn = mysqli_connect('localhost','root','','bookshop');

	if($conn == TRUE){
		//echo 'Connected';
	}else{
		echo 'Not Connected!';
	}