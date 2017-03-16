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
		$query2  = "SELECT * FROM contact";
		$run2    = mysqli_query($conn,$query2);

		if(mysqli_num_rows($run2) >= 1){
			while($row2 = mysqli_fetch_array($run2)){
				$c_phone      = $row2['phone'];
				$c_email      = $row2['email'];
				$c_address    = $row2['address'];
				$c_facebook   = $row2['facebook'];
				$c_instagram  = $row2['instagram'];
				$c_youtube    = $row2['youtube'];
				$c_twitter    = $row2['twitter'];
				$c_map_url 	  = $row2['map_url'];
			}
		}else{
				$c_phone      = '';
				$c_email      = '';
				$c_address    = '';
				$c_facebook   = '';
				$c_instagram  = '';
				$c_youtube    = '';
				$c_twitter    = '';
				$c_map_url 	  = '';
		}

	
	?>
	<div class="col-md-12">
		<div class="container">
			<div class="col-md-12 dashboard_title_wrp">
				<h2>საკონტაქტო ინფორმაცია</h2>
			</div>
			<div class="col-md-12 dashboard_buttons_main_wrp">
				<form method="post">
					<div class="form-group">
						<label>კომპანიის ტელეფონი</label>
						<input type="text" name="phone" class="form-control" placeholder="მაგ: 599999999" value="<?php echo $c_phone;?>">
					</div>
					<div class="form-group">
						<label>კომპანიის ელ-ფოსტა</label>
						<input type="text" name="email" class="form-control" placeholder="მაგ: info@motif.ge" value="<?php echo $c_email;?>">
					</div>
					<div class="form-group">
						<label>კომპანიის მისამართი (ENG)</label>
						<input type="text" name="address" value="<?php echo $c_address;?>" class="form-control" placeholder="Chavchavadze 14 , Tbilisi , Georgia">
					</div>
					<div class="form-group">
						<label>Facebook url</label>
						<input type="text" name="facebook" class="form-control" placeholder="მაგ: https://facebook.com/ebg" value="<?php echo $c_facebook;?>">
					</div>
					<div class="form-group">
						<label>Twitter url</label>
						<input type="text" name="twitter" class="form-control" placeholder="მაგ: https://twitter.com/ebg" value="<?php echo $c_twitter;?>">
					</div>
					<div class="form-group">
						<label>Instagram url</label>
						<input type="text" name="instagram" class="form-control" placeholder="მაგ: https://instagram.com/ebg" value="<?php echo $c_instagram;?>">
					</div>
					<div class="form-group">
						<label>Youtube url</label>
						<input type="text" name="youtube" class="form-control" placeholder="მაგ: https://youtube.com/ebg" value="<?php echo $c_youtube;?>">
					</div>
					<div class="form-group">
						<label>Google Map Embed</label>
						<textarea class="form-control" rows="4" name="map_url"><?php echo $c_map_url;?></textarea>
					</div>
					<div class="form-group">
						<input type="submit" name="submit" value="განახლება" class="btn btn-primary submit">
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
			$phone      = $_POST['phone'];
			$email      = $_POST['email'];
			$address    = $_POST['address'];
			$facebook   = $_POST['facebook'];
			$instagram  = $_POST['instagram'];
			$youtube    = $_POST['youtube'];
			$twitter    = $_POST['twitter'];
			$map_url 	= $_POST['map_url'];


		$query = "UPDATE contact SET phone = '$phone',  email = '$email', address = '$address', facebook = '$facebook', instagram = '$instagram', youtube = '$youtube', twitter = '$twitter', map_url = '$map_url'";
		$run   = mysqli_query($conn,$query);

		header('Location: contact.php');
	}