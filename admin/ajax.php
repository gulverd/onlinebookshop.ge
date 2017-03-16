<?php 
	
	include 'db.php';

	$categoryId = $_POST['categoryId'];

	echo "<option>Select Sub Category</option>";

	$query = "SELECT * FROM sub_categories WHERE parent_id = '$categoryId' ORDER BY id DESC";
	$run   = mysqli_query($conn,$query);

	while($row = mysqli_fetch_array($run)){
		$id = $row['id'];
		$sub_category_name = $row['sub_category_name'];
		echo '<option value="'.$id.'">'.$sub_category_name.'</option>';
	}
?>