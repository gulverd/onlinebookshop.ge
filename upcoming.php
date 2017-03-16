		<section class="upcoming-release">

			<!-- Heading -->
			<div class="container-fluid p-0">
		  	<div class="release-heading pull-right h-white">
		  		<h5>New and Upcoming Release</h5>
		  	</div>
			</div>
			<!-- Heading -->

			<!-- Upcoming Release Slider -->
			<div class="upcoming-slider">
				<div class="container">
					<!-- Release Book Detail -->
					<div class="release-book-detail h-white p-white">
						<div class="release-book-slider">
							<?php 
								include 'admin/db.php';
								$query  = "SELECT * FROM books WHERE upcoming = 1 ORDER BY id LIMIT 5";
								$run    = mysqli_query($conn,$query);

								while($row = mysqli_fetch_array($run)){
									$id    = $row['id'];
									$title = $row['title'];
									$pic   = $row['picture'];
									$price = $row['price'];
									$desc  = $row['blurb'];

								echo '<div class="item">
										<div class="detail">
											<h5><a href="book-detail.php?book_id='.$id.'">'.$title.'</a></h5>
											<p>'.substr($desc, 0,100).'...'.'</p>
											<span>Price: '.$price.' GEL</span>
											<a href="book-detail.php?book_id='.$id.'"><i class="fa fa-angle-double-right"></i></a>
										</div>
										<div class="detail-img">
											<a href="book-detail.php?book_id='.$id.'"><img src="imgs/books/'.$pic.'" alt="" width="122" height="156"></a>
										</div>
									</div>';
								}
							?>
		
						</div>
					</div>
					<!-- Release Book Detail -->

					<!-- Thumbs -->
					<div class="release-thumb-holder">
						<ul id="release-thumb" class="release-thumb">
							<?php 

								$query1  = "SELECT * FROM books WHERE upcoming = 1 ORDER BY id LIMIT 5";
								$run1    = mysqli_query($conn,$query1);

								$i = 0;
								while($row1 = mysqli_fetch_array($run1)){
									$id1    = $row1['id'];
									$title1 = $row1['title'];
									$pic1   = $row1['picture'];
									echo 
										'<li>
											<a data-slide-index="'.$i.'" href="">
												<span>'.substr($title1, 0,10).'...'.'</span>
												<img src="imgs/books/'.$pic1.'" alt="" width="94" height="122">
												<img class="b-shadow" src="images/upcoming-release/b-shadow.png" alt="">
											</a>
										</li>';
									$i++;
								}


							?> 
					</div>
					<!-- Thumbs -->

				</div>
			</div>
			<!-- Upcoming Release Slider -->

		</section>