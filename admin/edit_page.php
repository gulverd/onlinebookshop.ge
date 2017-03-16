<?php 
	ob_start();
?>
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

		$page_id = $_GET['page_id'];

		$query1 = "SELECT * FROM pages WHERE id = '$page_id'";
		$run1   = mysqli_query($conn,$query1);

		while($row1 = mysqli_fetch_array($run1)){
			$page_namea = $row1['page_name'];
			$page_desca = $row1['page_description'];
		}	
	?>
	<div class="col-md-12">
		<div class="container">
			<div class="col-md-12 buti_wrapper_partners">
				<a href="pages.php" class="btn btn-default"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> უკან დაბრუნება</a>
			</div>
			<div class="col-md-12 dashboard_buttons_main_wrp">
				<form method="post" action="">
					<div class="form-group">
						<label>გვერდის რედაქტირება</label>
						<input type="text" name="page_name" class="form-control" placeholder="About Company" value="<?php echo $page_namea;?>">
					</div>
					<div class="form-group">
						<label>გვერდის აღწერა</label>
						<textarea name="page_description"><?php echo $page_desca;?></textarea>
		        		<script>
		           			CKEDITOR.replace('page_description');
		       	 		</script>
					</div>
					<div class="form-group">
						<input type="submit" name="submit" value="შენახვა" class="btn btn-primary submit">
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

		$page_name 			= $_POST['page_name'];
		$page_description	= $_POST['page_description'];

		$queryI = "UPDATE pages SET page_name = '$page_name' ,page_description = '$page_description' WHERE id = '$page_id'";
		$runI   = mysqli_query($conn,$queryI);


		header('Location: edit_page.php?page_id='.$page_id);

	}
?>