<?php ob_start();?>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="user-scalable=0, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
	<title>OnlineBookShop- Admin</title>
	<link href="https://fonts.googleapis.com/css?family=Advent+Pro" rel="stylesheet">
	<script src="//cdn.ckeditor.com/4.5.11/full/ckeditor.js"></script>
</head>
<body>
	<?php 
		include 'db.php';
		include 'nav_in.php';
	?>
	<div class="col-md-12">
		<div class="container">
			<div class="col-md-12 dashboard_title_wrp">
				<h2>არასასწავლო წიგნები</h2>
			</div>
			<div class="col-md-12 buti_wrapper_partners">
				<a href="books2.php" class="btn btn-default"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> უკან დაბრუნება</a>
			</div>
			<div class="col-md-12 dashboard_buttons_main_wrp">
				<form method="post" action="" enctype="multipart/form-data">
				<div class="col-md-9">
					<div class="form-group">
						<label>ISBN</label>
						<input type="text" name="isbn" class="form-control" placeholder="Book ISBN">
					</div>
					<div class="form-group">
						<label>Title</label>
						<input type="text" name="title" class="form-control" placeholder="Book Title">
					</div>
					<div class="form-group">
						<label>Author</label>
						<input type="text" name="author" class="form-control" placeholder="Book Author">
					</div>
					<div class="form-group">
						<label>Price</label>
						<input type="text" name="price" class="form-control" placeholder="Book Price">
					</div>
					<div class="form-group">
						<label>Number of Pages</label>
						<input type="text" name="pages" class="form-control" placeholder="Number of Pages">
					</div>
					<div class="form-group">
						<label>Book Picture</label>
						<input type="file" name="image" class="form-control">
					</div>
					<div class="form-group">
						<label>Publisher</label>
						<input type="text" name="publisher" class="form-control" placeholder="Book Publisher">
					</div>
					<div class="form-group">
						<label>Publication date</label>
						<select class="form-control" name="date">
								<?php
									$year = date('Y');
									for($i = $year; $i >= 1900; $i--){
										echo '<option value="'.$i.'">'.$i.'</option>';
									}
								?>
						</select>
					</div>
					<div class="form-group">
						<label>Stock Status</label>
						<select name="status" class="form-control">
							<option value="1">In Stock</option>
							<option value="0">Out Of Stock</option>
						</select>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label>Categories</label>
						<div class="scrolable">
							<?php
								$query1 = "SELECT * FROM categories WHERE category_type = 2";
								$run1   = mysqli_query($conn,$query1);

								while($row1 = mysqli_fetch_array($run1)){
									$cat_id 	= $row1['id'];
									$cat_name 	= $row1['category_name'];
									echo '<div class="checkbox">
											<label>
						     	 				<input type="checkbox" value="'.$cat_id.'" name="cats[]"> '.$cat_name.'
						   				 	</label>
						   				  </div>';
								}					
							?>	
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label>Blurb</label>
						<textarea name="blurb"></textarea>
		        		<script>
		           			CKEDITOR.replace('blurb');
		       	 		</script>
					</div>
					<div class="form-group">
						<input type="submit" name="submit" value="წიგნის დამატება" class="btn btn-primary submit">
					</div>
				</div>
				</form>
			</div>
		</div>
	</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</html>

<?php

	if(isset($_POST['submit'])){
		$isbn      		= $_POST['isbn'];	
		$title      	= $_POST['title'];
		$author      	= $_POST['author'];
		$blurb      	= $_POST['blurb'];
		$price      	= $_POST['price'];
		$pages      	= $_POST['pages'];
		$publisher     	= $_POST['publisher'];
		$date      		= $_POST['date'];
		$status      	= $_POST['status'];
		$picture 		= $_POST['isbn'];
		$cats 			= $_POST['cats'];

		$categories     = implode(",", $cats);

		if(isset($_FILES['image'])){
			$errors= array();
			$file_name  = $_FILES['image']['name'];
			$file_size  = $_FILES['image']['size'];
			$file_tmp   = $_FILES['image']['tmp_name'];
			$file_type  = $_FILES['image']['type'];   
			$file_ext   = strtolower(end(explode('.',$_FILES['image']['name'])));
			$extensions = array("jpeg","jpg","png"); 
			$fl_name    = $isbn.'.'.$file_ext;              
			if(empty($errors)==true){
			    move_uploaded_file($file_tmp,"..//imgs/books/".$fl_name);

				$queryI = "INSERT INTO books2 (isbn,title,author,blurb,price,pages,picture,publisher,datee,status,categories) 
							VALUES ('$isbn','$title','$author','$blurb','$price','$pages','$fl_name','$publisher','$date','$status','$categories')";
				$runI   = mysqli_query($conn,$queryI);

			    header('Location: books2.php');
			}else{
				$queryI = "INSERT INTO books2 (isbn,title,author,blurb,price,pages,publisher,datee,status,categories) 
							VALUES ('$isbn','$title','$author','$blurb','$price','$pages','$publisher','$date','$status','$categories')";
				$runI   = mysqli_query($conn,$queryI);
				header('Location: books2.php');
			    print_r($errors);
			}
		}
	}
?>
