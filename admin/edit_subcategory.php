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
		
		$cat_id = $_GET['cat_id'];
		$now = date("YmdHms");
		include 'db.php';
		include 'nav_in.php';

		$query1 	= "SELECT * FROM sub_categories WHERE id  = '$cat_id'";
		$run1 		= mysqli_query($conn,$query1);

		while($row1 = mysqli_fetch_array($run1)){
			$title_en1      = $row1['sub_category_name'];
			$parent_ida     = $row1['parent_id'];
		}
	?>
	<div class="col-md-12">
		<div class="container">
			<div class="col-md-12 dashboard_title_wrp">
				<h2>ქვეკატეგორიები</h2>
			</div>
			<div class="col-md-12 buti_wrapper_partners">
				<a href="sub_categories.php" class="btn btn-default"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> უკან დაბრუნება</a>
			</div>
			<div class="col-md-12 dashboard_buttons_main_wrp">
				<form method="post" action="" enctype="multipart/form-data">
					<div class="form-group">
						<label>კატეგორიის დასახელება (ENG)</label>
						<input type="text" name="sub_category_name" class="form-control" placeholder="კატეგორიის ინგლისური დასახელება" value="<?php echo $title_en1;?>">
					</div>
					<div class="form-group">
						<label>აირჩიეთ კატეგორია</label>
						<select name="parent_id" class="form-control">
							<?php
								$query3 = "SELECT * FROM categories WHERE id = '$parent_ida'";
								$run3   = mysqli_query($conn,$query3);
								while($row3 = mysqli_fetch_array($run3)){
									$category_name = $row3['category_name'];
									$parent_id     = $row3['id'];
									echo '<option value='.$parent_id.'>'.$category_name.'</option>';
								}
								$query2 = "SELECT * FROM categories WHERE id != '$parent_ida'";
								$run2   = mysqli_query($conn,$query2);

								while($row2 = mysqli_fetch_array($run2)){
									$category_name = $row2['category_name'];
									$parent_id     = $row2['id'];
									echo '<option value='.$parent_id.'>'.$category_name.'</option>';
								}
							?>
						</select>
					</div>
					<div class="form-group">
						<input type="submit" name="submit" value="შეცვლა" class="btn btn-primary submit">
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
		$title_en  	 = $_POST['sub_category_name'];
		$parent_idas = $_POST['parent_id'];

		$query = "UPDATE sub_categories SET sub_category_name = '$title_en', parent_id = '$parent_idas' WHERE id = '$cat_id'";
		$run   = mysqli_query($conn,$query);
		
		header('Location: sub_categories.php');

	}