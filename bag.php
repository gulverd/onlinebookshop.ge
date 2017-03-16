<?php 
	$session_id = session_id();
	$query = "SELECT * FROM tmp_orders WHERE session_id = '$session_id'";
	$run   = mysqli_query($conn,$query);

	$items_count = array();
	while($row = mysqli_fetch_array($run)){
		$qty = $row['qty'];
		array_push($items_count, $qty);
	}

	$count_bag = array_sum($items_count);

?>

<div class="add-to-cart">
	<a class="btn-1" href="cart.php"><i class="fa fa-shopping-cart"><em><?php echo $count_bag;?></em></i>View Cart</a>
</div>