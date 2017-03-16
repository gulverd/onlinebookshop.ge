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

		$book_id  	= $_GET['book_id'];

		$query2 	= "SELECT * FROM books WHERE id = '$book_id'";
		$run2   	= mysqli_query($conn,$query2);

		while($row2 = mysqli_fetch_array($run2)){
				$isbn1      		= $row2['isbn'];	
				$title1      		= $row2['title'];
				$level1      		= $row2['level'];
				$author1      		= $row2['author'];
				$blurb1      		= $row2['blurb'];
				$price1      		= $row2['price'];
				$sale1 				= $row2['sale'];
				$pages1      		= $row2['pages'];
				$publisher1     	= $row2['publisher'];
				$date1      		= $row2['datee'];
				$status1      		= $row2['status'];
				$picture1 			= $row2['picture'];
				$category1 			= $row2['category_id'];
				$sub_category1  	= $row2['sub_category_id'];
				$parent_id1         = $row2['parent_id'];
				$trade1 			= $row2['trade'];
				$upcoming1  		= $row2['upcoming'];
		}

	?>
	<div class="col-md-12">
		<div class="container">
			<div class="col-md-12 dashboard_title_wrp">
				<h2>სასწავლო წიგნები</h2>
			</div>
			<div class="col-md-12 buti_wrapper_partners">
				<a href="books.php" class="btn btn-default"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> უკან დაბრუნება</a>
			</div>
			<div class="col-md-12 dashboard_buttons_main_wrp">
				<form method="post" action="" enctype="multipart/form-data">
					<div class="col-md-12">
						<div class="checkbox">
							<label>
								<?php

									if($trade1 == 1){
										echo '<input type="checkbox" name="trade" checked> Trade books';
									}else{
										echo '<input type="checkbox" name="trade"> Trade books';
									}
								?>
							</label>
						</div>
						<div class="checkbox">
							<label>
								<?php
									if($upcoming1 == 1){
										echo '<input type="checkbox" name="upcoming" checked> Upcoming Release';
									}else{
										echo '<input type="checkbox" name="upcoming"> Upcoming Release';
									}
								?>
							</label>
						</div>
					</div>
					<div class="col-md-9" id="book_in_left_wrp">
					<div class="col-md-4">
						<div class="form-group">
							<label>Category</label>
							<select name="category" id="category" class="form-control">	
							 			
							<?php
								$queryCat  = "SELECT * FROM categories WHERE id = '$category1'";
								$runCat    = mysqli_query($conn,$queryCat);
								
								while($rowCat = mysqli_fetch_array($runCat)){
									$cat_id1 = $rowCat['id'];
									$cat_name1 = $rowCat['category_name'];
									echo '<option value="'.$cat_id1.'">'.$cat_name1.'</option>'; 
								}

								$query1 = "SELECT * FROM categories WHERE category_type = 1 AND id != '$category1'";
								$run1   = mysqli_query($conn,$query1);

								while($row1 = mysqli_fetch_array($run1)){
									$cat_id 	= $row1['id'];
									$cat_name 	= $row1['category_name'];
									echo '<option value="'.$cat_id.'">'.$cat_name.'</option>'; 
								}					
							?>	
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
						    <label for="exampleInputEmail1">Sub Category</label>
						    <select name="sub_category" id="sub_category" class="form-control">
						   		<?php

						   			$querySub = "SELECT * FROM sub_categories WHERE id = '$sub_category1'";
						   			$runSub   = mysqli_query($conn,$querySub);
						   			
						   			while($rowSub = mysqli_fetch_array($runSub)){
						   				$sub_id = $rowSub['id'];
						   				$sub_name = $rowSub['sub_category_name'];
						   				echo '<option value="'.$sub_id.'">'.$sub_name.'</option>';	
						   			}

						   		?>
						    </select>
						</div> 
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Book Picture</label>
							<input type="file" name="image" class="form-control">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>ISBN</label>
							<input type="text" name="isbn" class="form-control" placeholder="Book ISBN" value="<?php echo $isbn1;?>">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Title</label>
							<input type="text" name="title" class="form-control" placeholder="Book Title" value="<?php echo $title1;?>"> 
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Level</label>
							<select class="form-control" name="level">
								<option value="<?php echo $level1;?>"><?php echo $level1;?></option>
								<option value="A1">A1</option>
								<option value="A2">A2</option>
								<option value="B1">B1</option>
								<option value="B2">B2</option>
								<option value="C1">C1</option>
								<option value="C2">C2</option>
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Author</label>
							<input type="text" name="author" class="form-control" placeholder="Book Author" value="<?php echo $author1;?>">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Price</label>
							<input type="text" name="price" class="form-control" placeholder="Book Price" value="<?php echo $price1;?>">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Sale Price</label>
							<input type="text" name="sale" class="form-control" placeholder="Sale price" value="<?php echo $sale1;?>">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Number of Pages</label>
							<input type="text" name="pages" class="form-control" placeholder="Number of Pages" value="<?php echo $pages1;?>">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Publisher</label>
							<input type="text" name="publisher" class="form-control" placeholder="Book Publisher" value="<?php echo $publisher1;?>">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Publication date</label>
							<select class="form-control" name="date">
								<?php
									echo '<option value="'.$date1.'">'.$date1.' </option>';
									$year = date('Y');
									for($i = $year; $i >= 1900; $i--){
										echo '<option value="'.$i.'">'.$i.'</option>';
									}
								?>
								
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Stock Status</label>
							<select name="status" class="form-control">
							<?php 
								if($status1 == 1){
									echo '
										<option value="1">In Stock</option>
										<option value="0">Out Of Stock</option>';
								}else{
									echo '<option value="0">Out Of Stock</option>
										  <option value="1">In Stock</option>';
								}
							?>	
							</select>
						</div>
					</div>
						<div class="col-md-8">
						<div class="form-group">
							<label>Parent Item</label>
							<select class="form-control" name="parent">
								<?php
									$query4 = "SELECT id,title FROM books WHERE id = '$parent_id1'";
									$run4 	= mysqli_query($conn,$query4);
									if($parent_id1 == 0){
										echo '<option value="0">SELECT PARENT ITEM</option>';
									}else{
										while($row4 = mysqli_fetch_array($run4)){
											$book_title1 = $row4['title'];
											$book_ida1   = $row4['id'];
											echo '<option value="'.$book_ida1.'">'.$book_title1.'</option>';
										}
									}


								?>
								<option value="0">NONE</option>
								<?php 
									$query3 = "SELECT id,title FROM books 
										WHERE 
											id 				    != '$book_id' 
												AND 
											category_id  		= '$category1' 
												AND 
											sub_category_id 	= '$sub_category1'
												AND 
											level = '$level1'
									";
									$run3   = mysqli_query($conn,$query3);

									while($row3 = mysqli_fetch_array($run3)){
										$book_title = $row3['title'];
										$book_ida 	= $row3['id'];
										echo '<option value="'.$book_ida.'">'.$book_title.'</option>';
									}
								?>
							</select>
						</div>
					</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Featured Image</label>
							<img src="..//imgs/books/<?php echo $picture1;?>" id="featured_image">
						</div>

					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label>Blurb</label>
							<textarea name="blurb"><?php echo $blurb1;?></textarea>
			        		<script>
			           			CKEDITOR.replace('blurb');
			       	 		</script>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<input type="submit" name="submit" value="მონაცემების ცვლილება" class="btn btn-primary submit">
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

		if(isset($_POST['trade'])){
			$trade = '1';
		}else{
			$trade = '0';
		}
		
		if(isset($_POST['upcoming'])){
			$upcoming = '1';
		}else{
			$upcoming = '0';
		}

		$isbn      		= $_POST['isbn'];	
		$title      	= $_POST['title'];
		$level      	= $_POST['level'];
		$author      	= $_POST['author'];
		$blurb      	= $_POST['blurb'];
		$price      	= $_POST['price'];
		$sale 			= $_POST['sale'];
		$pages      	= $_POST['pages'];
		$publisher     	= $_POST['publisher'];
		$date      		= $_POST['date'];
		$status      	= $_POST['status'];
		$picture 		= $_POST['isbn'];
		$category 		= $_POST['category'];
		$sub_category  	= $_POST['sub_category'];
		$parent 		= $_POST['parent'];			

		
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
			    if($file_name != ''){
					$queryI = "UPDATE books SET 
									isbn 			= '$isbn', 
									title 			= '$title',  
									level 			= '$level',
									author 			= '$author',
									blurb 			= '$blurb',
									price 			= '$price',
									sale 			= '$sale', 
									pages 			= '$pages', 
									picture  		= '$fl_name',
									publisher 		= '$publisher',
									datee 			= '$date',
									status 			= '$status',
									category_id 	= '$category',
									sub_category_id = '$sub_category',
									parent_id		= '$parent',
									trade 			= '$trade',
									upcoming 		= '$upcoming'
									
							WHERE id = '$book_id'";
					$runI   = mysqli_query($conn,$queryI);
					header('Location: edit_book.php?book_id='.$book_id);
				}else{
						$query5 = "UPDATE books SET 
										isbn 			= '$isbn', 
										title 			= '$title', 
										level 			= '$level',
										author 			= '$author',
										blurb 			= '$blurb',
										price 			= '$price',
										sale 			= '$sale', 
										pages 			= '$pages', 
										publisher 		= '$publisher',
										datee 			= '$date',
										status 			= '$status',
										category_id 	= '$category',
										sub_category_id = '$sub_category',
										parent_id		= '$parent',
										trade 			= '$trade',
										upcoming        = '$upcoming'
							 
						WHERE id = '$book_id'";
						$run5   = mysqli_query($conn,$query5);
						header('Location: edit_book.php?book_id='.$book_id);
				}
			}else{
				print_r($errors);
			}
		}
	}
?>

<script type="text/javascript">

	$(document).ready(function(){

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