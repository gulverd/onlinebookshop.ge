<ul>
	<?php 
		
		include 'admin/db.php';

		$key = "%" . $_POST['key'] ."%";

		$query = "SELECT * FROM books WHERE title like '$key' ORDER BY id DESC";
		$run   = mysqli_query($conn,$query);

		while($row = mysqli_fetch_array($run)){
			$id = $row['id'];
			$title = $row['title'];
			echo '<li><a href="book-detail.php?book_id='.$id.'">'.$title.'</li>';
		}
		
	?>
</ul>