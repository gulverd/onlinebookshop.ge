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
				<h2>წიგნის დამატება</h2>
			</div>
			<div class="col-md-12 buti_wrapper_partners">
				<a href="books.php" class="btn btn-default"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> უკან დაბრუნება</a>
			</div>
			<div class="col-md-12 dashboard_buttons_main_wrp">
				<div class="col-dm-12">
					<div class="form-group">
						<select class="form-control" id="book_type">
							<option id="book_type_a">გთხოვთ აირჩიოთ წიგნის ტიპი</option>
							<option value="1">სასწავლო</option>
							<option value="2">არა სასწავლო</option>
						</select>
					</div>
				</div>
	
				<div class="col-md-12 book_edu">
					<form method="post" action="" enctype="multipart/form-data">
						<input type="hidden" name="book_type" value="1">
						<div class="form-group">
							<label>Category</label>
							<select name="category" id="category" class="form-control">	
							 <option>Select Category</option>		
							<?php
								$query1 = "SELECT * FROM categories WHERE category_type = 1 AND id != 6";
								$run1   = mysqli_query($conn,$query1);

								while($row1 = mysqli_fetch_array($run1)){
									$cat_id 	= $row1['id'];
									$cat_name 	= $row1['category_name'];
									echo '<option value="'.$cat_id.'">'.$cat_name.'</option>'; 
								}					
							?>	
							</select>
						</div>
						<div class="form-group">
						    <label for="exampleInputEmail1">Subcategory Name</label>
						    <select name="sub_category" id="sub_category" class="form-control">

						    </select>
						</div> 
						<div class="form-group">
							<label>ISBN</label>
							<input type="text" name="isbn" class="form-control" placeholder="Book ISBN">
						</div>
						<div class="form-group">
							<label>Title</label>
							<input type="text" name="title" class="form-control" placeholder="Book Title">
						</div>
						<div class="form-group">
							<label>Level</label>
							<select class="form-control" name="level">
								<option value="A1">A1</option>
								<option value="A2">A2</option>
								<option value="B1">B1</option>
								<option value="B2">B2</option>
								<option value="C1">C1</option>
								<option value="C2">C2</option>
							</select>
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
					</form>
				</div>
				<div class="col-md-12 book_non_edu">
					<form method="post" action="" enctype="multipart/form-data">
					<input type="hidden" name="book_type" value="2">
					<div class="col-md-9">
					<div class="form-group">
						<label>ISBN</label>
						<input type="text" name="isbn2" class="form-control" placeholder="Book ISBN">
					</div>
					<div class="form-group">
						<label>Title</label>
						<input type="text" name="title2" class="form-control" placeholder="Book Title">
					</div>
					<div class="form-group">
						<label>Author</label>
						<input type="text" name="author2" class="form-control" placeholder="Book Author">
					</div>
					<div class="form-group">
						<label>Price</label>
						<input type="text" name="price2" class="form-control" placeholder="Book Price">
					</div>
					<div class="form-group">
						<label>Number of Pages</label>
						<input type="text" name="pages2" class="form-control" placeholder="Number of Pages">
					</div>
					<div class="form-group">
						<label>Book Picture</label>
						<input type="file" name="image" class="form-control">
					</div>
					<div class="form-group">
						<label>Publisher</label>
						<input type="text" name="publisher2" class="form-control" placeholder="Book Publisher">
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
						<select name="status2" class="form-control">
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
						<textarea name="blurb2"></textarea>
		        		<script>
		           			CKEDITOR.replace('blurb2');
		       	 		</script>
					</div>
					<div class="form-group">
						<input type="submit" name="submit2" value="წიგნის დამატება" class="btn btn-primary submit">
					</div>
				</div>
					</form>
				</div>
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
		$level      	= $_POST['level'];
		$author      	= $_POST['author'];
		$blurb      	= $_POST['blurb'];
		$price      	= $_POST['price'];
		$pages      	= $_POST['pages'];
		$publisher     	= $_POST['publisher'];
		$date      		= $_POST['date'];
		$status      	= $_POST['status'];
		$picture 		= $_POST['isbn'];
		$category 		= $_POST['category'];
		$sub_category  	= $_POST['sub_category'];
		$book_type 		= $_POST['book_type'];


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

				$queryI = "INSERT INTO books (isbn,title,level,author,blurb,price,pages,picture,publisher,datee,status,category_id,sub_category_id,book_type) 
							VALUES ('$isbn','$title','$level','$author','$blurb','$price','$pages','$fl_name','$publisher','$date','$status','$category','$sub_category','$book_type')";
				$runI   = mysqli_query($conn,$queryI);

			    header('Location: books.php');
			}else{
				$queryI = "INSERT INTO books (isbn,title,level,author,blurb,price,pages,publisher,datee,status,category_id,sub_category_id,book_type) 
							VALUES ('$isbn','$title','$level','$author','$blurb','$price','$pages','$publisher','$date','$status','$category','$sub_category','$book_type')";
				$runI   = mysqli_query($conn,$queryI);
			    print_r($errors);
			}
		}
	}

	if(isset($_POST['submit2'])){
		$isbn2      	= $_POST['isbn2'];	
		$title2      	= $_POST['title2'];
		$author2      	= $_POST['author2'];
		$blurb2     	= $_POST['blurb2'];
		$price2      	= $_POST['price2'];
		$pages2      	= $_POST['pages2'];
		$publisher2     = $_POST['publisher2'];
		$date2      	= $_POST['date2'];
		$status2      	= $_POST['status2'];
		$picture2 		= $_POST['isbn2'];
		$cats2 			= $_POST['cats'];
		$book_type 		= $_POST['book_type'];

		$categories     = implode(",", $cats2);

		if(isset($_FILES['image'])){
			$errors= array();
			$file_name  = $_FILES['image']['name'];
			$file_size  = $_FILES['image']['size'];
			$file_tmp   = $_FILES['image']['tmp_name'];
			$file_type  = $_FILES['image']['type'];   
			$file_ext   = strtolower(end(explode('.',$_FILES['image']['name'])));
			$extensions = array("jpeg","jpg","png"); 
			$fl_name    = $isbn2.'.'.$file_ext;              
			if(empty($errors)==true){
			    move_uploaded_file($file_tmp,"..//imgs/books/".$fl_name);

				$queryI = "INSERT INTO books (isbn,title,author,blurb,price,pages,picture,publisher,datee,status,category_id,book_type) 
							VALUES ('$isbn2','$title2','$author2','$blurb2','$price2','$pages2','$fl_name','$publisher2','$date2','$status2','$categories','$book_type')";
				$runI   = mysqli_query($conn,$queryI);

			    header('Location: books.php');
			}else{
				$queryI = "INSERT INTO books (isbn,title,author,blurb,price,pages,publisher,datee,status,category_id,book_type) 
							VALUES ('$isbn2','$title2','$author2','$blurb2','$price2','$pages2','$publisher2','$date2','$status2','$categories','$book_type')";
				$runI   = mysqli_query($conn,$queryI);
				header('Location: books.php');
			    print_r($errors);
			}
		}
	}
?>

<script type="text/javascript">

	$(document).ready(function(){
		
		$('#book_type').on("change",function () {
			var book_type = $(this).find('option:selected').val();
			$('#book_type_a').hide();
			$('#book_type').hide();
			if(book_type == 1){
				$('.book_edu').show();
				$('.book_non_edu').hide();
			}else if(book_type == 2){
				$('.book_non_edu').show();
				$('.book_edu').hide();
			}
		});

	    $('#category').on("change",function () {
	        var categoryId = $(this).find('option:selected').val();
	        $.ajax({
	            url: "ajax.php",
	            type: "POST",
	            data: "categoryId="+categoryId,
	            success: function (response) {
	                console.log(response);
	                $("#sub_category").html(response);
	            },
	        });
	    }); 

	});

</script>