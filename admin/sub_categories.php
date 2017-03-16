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
</head>
<body>
	<?php 
		$now = date("YmdHms");
		include 'db.php';
		include 'nav_in.php';
	?>
	<div class="col-md-12">
		<div class="container">
			<div class="col-md-12 dashboard_title_wrp">
				<h2>ქვეკატეგორიები</h2>
			</div>
			<div class="col-md-12 dashboard_buttons_main_wrp">
				<form method="post" action="" enctype="multipart/form-data">
					<div class="form-group">
						<label>ქვეკატეგორიის დასახელება (ENG)</label>
						<input type="text" name="sub_category_name" class="form-control" placeholder="ქვეკკატეგორიის ინგლისური დასახელება">
					</div>
					<div class="form-group">
						<label>აირჩიეთ მშობელი კატეგორია</label>
						<select class="form-control" name="parent_id">
							<?php
								$query3 = "SELECT * FROM categories";
								$run3   = mysqli_query($conn,$query3);

								while($row3 = mysqli_fetch_array($run3)){
									$parent_id   = $row3['id'];
									$parent_name = $row3['category_name'];

									echo '<option value="'.$parent_id.'">'.$parent_name.'</option>'; 
								}
							?>
						</select>
					</div>
					<div class="form-group">
						<input type="submit" name="submit" value="დამატება" class="btn btn-primary submit">
					</div>
				</form>
			</div>
		</div>
	</div>
				<div class="col-md-12 dashboard_buttons_main_wrp">
				<table class="table table-bordered">
					<tr class="table_header">
						<td id="cent_td">ქვეკატეგორიის დასახელება (ENG)</td>
						<td id="cent_td">მშობელი კატეგორია</td>
						<td id="cent_td">წიგნები</td>
						<td id="cent_td">რედაქტირება</td>
						<td id="cent_td">წაშლა</td>
					</tr>

					<?php 

						$query = "SELECT a.id as id, a.sub_category_name as title_en , b.category_name as parent_title
									FROM sub_categories a 
									JOIN categories b on a.parent_id = b.id 
									ORDER BY a.id DESC";
						$run   = mysqli_query($conn,$query);

						while($row = mysqli_fetch_array($run)){
							$id 	     	 = $row['id'];
							$title_en   	 = $row['title_en'];
							$parent_title    = $row['parent_title'];

							echo '<tr>
								<td id="cent_td">'.$title_en.'</td>
								<td id="cent_td">'.$parent_title.'</td>
								<td id="cent_td">';
									$query3 = "SELECT count(*) as book_count FROM books where sub_category_id = '$id'";
									$run3   = mysqli_query($conn,$query3);

								while($row3 = mysqli_fetch_array($run3)){
									$count_books = $row3['book_count'];
									echo $count_books;
								}

								echo '</td>
								<td id="cent_td"><button class="btn btn-primary"><a href="edit_subcategory.php?cat_id='.$id.'"><span class="glyphicon glyphicon-edit"></span> რედაქტირება</a></button></td>
								<td id="cent_td">
									<button type="button" data-toggle="modal" data-target="#myModal'.$id.'">
									  <span class="glyphicon glyphicon-trash" id="dl"></span>
									</button>
									<div class="modal fade" id="myModal'.$id.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									  <div class="modal-dialog" role="document">
									    <div class="modal-content">
									      <div class="modal-header">
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									        <h4 class="modal-title" id="myModalLabel">კატეგორიის წაშლა</h4>
									      </div>
									      <div class="modal-body">
											<p>
												დარწმუნებული ხართ რომ გინდათ წაშალოთ კატეგორია: <span id="del">'.$title_en.'</span> ?
												შეგახსენებთ რომ ქვეკატეგორიასთან ერთად წაიშლება მასში არსებული წიგნები!
											</p>
									      </div>
									      <div class="modal-footer">
									        <button type="button" class="btn btn-default" data-dismiss="modal" id="butia">ოპერაციის გაუქმება</button>
									        <button type="button" class="btn btn-danger" id="butia"><a href="del_subcategory.php?cat_id='.$id.'"><span class="glyphicon glyphicon-trash"></span> წაშლა</a></button>
									      </div>
									    </div>
									  </div>
									</div>
								</td>
							</tr> 
								</td>
							</tr>'; 
						}

					?>
				</table>
			</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</html>

<?php 

	if(isset($_POST['submit'])){
		
		$sub_category_name = $_POST['sub_category_name'];
		$parent_id   	   = $_POST['parent_id'];

		$query2 = "INSERT INTO sub_categories (sub_category_name,parent_id) VALUES ('$sub_category_name','$parent_id')";
		$run2   = mysqli_query($conn,$query2);

		header('Location: sub_categories.php');

	}

?>