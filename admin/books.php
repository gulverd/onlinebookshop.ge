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
				<h2>სასწავლო წიგნები</h2>
			</div>
			<div class="col-md-12 buti_wrapper_partners">
				<a href="add_new_book.php" class="btn btn-default"><i class="fa fa-plus" aria-hidden="true"></i> ახალი წიგნის დამატება</a>
			</div>
		</div>
	</div>
	<div class="col-md-12" id="tbls_wrp">
<div class="col-md-12 dashboard_buttons_main_wrp">
				<table class="table table-bordered">
					<tr class="table_header">
						<td id="cent_td">ID</td>
						<td id="cent_td">ISBN</td>
						<td id="cent_td">Title</td>
						<td id="cent_td">Level</td>
						<td id="cent_td">Blurb</td>
						<td id="cent_td">Picture</td>
						<td id="cent_td">Parent ID</td>
						<td id="cent_td">Status</td>
						<td id="cent_td">Book Type</td>
						<td id="cent_td"><span class="glyphicon glyphicon-edit"></span></td>
						<td id="cent_td"><span class="glyphicon glyphicon-trash"></span></td>
					</tr>
					<?php 
						$query = "SELECT id,isbn,title,level,author,blurb,picture,publisher,datee,status,parent_id,book_type
						FROM books ORDER BY id DESC";
						$run   = mysqli_query($conn,$query);

						while($row = mysqli_fetch_array($run)){
							$id 	    	= $row['id'];	
							$isbn      		= $row['isbn'];	
							$title      	= $row['title'];
							$level      	= $row['level'];
							$author      	= $row['author'];
							$blurb      	= $row['blurb'];
							$book_type 		= $row['book_type'];

							if($book_type == 1){
								$book_type = 'სასწავლო';
							}else{
								$book_type = 'არასასწავლო';
							}
							if($blurb == '' or is_null($blurb)){
								$blurb = '<span class="glyphicon glyphicon-remove" id="del"></span>';
							}else{
								$blurb = '<span class="glyphicon glyphicon-ok" id="ok"></span>';
							}
							$picture      	= $row['picture'];
							if($picture == '' or is_null($picture)){
								$picture = '<span class="glyphicon glyphicon-remove" id="del"></span>';
							}else{
								$picture = '<span class="glyphicon glyphicon-ok" id="ok"></span>';
							}
							$parent_id     	= $row['parent_id'];
							$date      		= $row['datee'];
							$status      	= $row['status'];
							if($status != '1' or $status != 1){
								$status = '<span class="glyphicon glyphicon-remove" id="del"></span>';
							}else{
								$status = '<span class="glyphicon glyphicon-ok" id="ok"></span>';
							}

							echo '<tr>
								<td id="cent_td">'.$id.'</td>
								<td id="cent_td">'.$isbn.'</td>
								<td id="cent_td">'.$title.'</td>
								<td id="cent_td">'.$level.'</td>
								<td id="cent_td">'.$blurb.'</td>
								<td id="cent_td">'.$picture.'</td>
								<td id="cent_td">'.$parent_id.'</td>
								<td id="cent_td">'.$status.'</td>
								<td id="cent_td">'.$book_type.'</td>
								<td id="cent_td"><button class="btn btn-primary"><a href="edit_book.php?book_id='.$id.'"><span class="glyphicon glyphicon-edit"></span></a></button></td>								
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
												დარწმუნებული ხართ რომ გინდათ წაშალოთ წიგნი: <span id="del">'.$title.'</span> ?
											</p>
									      </div>
									      <div class="modal-footer">
									        <button type="button" class="btn btn-default" data-dismiss="modal" id="butia">ოპერაციის გაუქმება</button>
									        <button type="button" class="btn btn-danger" id="butia"><a href="del_book.php?book_id='.$id.'"><span class="glyphicon glyphicon-trash"></span> წაშლა</a></button>
									      </div>
									    </div>
									  </div>
									</div>
								</td>
								</td>
							</tr>'; 
						}

					?>
				</table>
			</div>
	</div>	
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</html>
