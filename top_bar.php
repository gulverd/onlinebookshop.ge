	<?php
		include 'admin/db.php';
	?>
	<div class="topbar">
			<div class="container">
				
				<!-- Online Option -->
				<div class="online-option">
					<ul>
						<?php 
							$query2  = "SELECT * FROM pages ORDER BY id ASC";
							$run2    = mysqli_query($conn,$query2);

							while($row2 = mysqli_fetch_array($run2)){
								$id   	= $row2['id'];
								$page   = $row2['page_name'];
								echo '<li><a href="pages.php?page_id='.$id.'">'.$page.'</a></li>';
							}

						?>
						
					</ul>
				</div>
				<!-- Online Option -->

				<!-- Social Icons -->
				<?php
					$query = "SELECT instagram,facebook,youtube,twitter FROM contact";
					$run   =  mysqli_query($conn,$query);

					while($row = mysqli_fetch_array($run)){
						$instagram = $row['instagram'];
						$facebook  = $row['facebook'];
						$youtube   = $row['youtube'];
						$twitter   = $row['twitter'];
					}

				?>
				<div class="social-icons pull-right">
					<ul>
						<li><a class="fa fa-facebook" href="<?php echo $facebook;?>" target="_blank"></a></li>	
						<li><a class="fa fa-twitter" href="<?php echo $twitter;?>" target="_blank"></a></li>	
						<li><a class="fa fa-instagram" href="<?php echo $instagram;?>" target="_blank"></a></li>	
						<li><a class="fa fa-youtube" href="<?php echo $youtube;?>" target="_blank"></a></li>	
					</ul>
				</div>
				<!-- Social Icons -->

			</div>
		</div>