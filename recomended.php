<div class="recomended-products tc-padding">
			<div class="container">
				
				<!-- Main Heading -->
				<div class="main-heading-holder">
					<div class="main-heading">
						<h2>Trade <span class="theme-color">Books </span></h2>
					</div>
				</div>
				<!-- Main Heading -->

				<!-- Recomend products Slider -->
				<div class="recomend-slider">
				<?php

					include 'admin/db.php';

						$query8 = "SELECT * FROM books WHERE trade = 1 ORDER BY id DESC LIMIT 10";
						$run8   = mysqli_query($conn,$query8);

						while($row8 = mysqli_fetch_array($run8)){
							$id  			= $row8['id'];
				    		$isbn      		= $row8['isbn'];	
							$title      	= $row8['title'];
							$level      	= $row8['level'];
							$author      	= $row8['author'];
							$blurb      	= $row8['blurb'];
							$price      	= $row8['price'];
							$sale 			= $row8['sale'];
							$pages      	= $row8['pages'];
							$publisher     	= $row8['publisher'];
							$date      		= $row8['datee'];
							$status      	= $row8['status'];
							$picture 		= $row8['picture'];
							$category 		= $row8['category_id'];
							$sub_category  	= $row8['sub_category_id'];

							echo '					
								<div class="item">
									<a href="book-detail.php?book_id='.$id.'"><img src="imgs/books/'.$picture.'" alt="" id="trd_main_pic"></a>
								</div>';
						}


					?>
					<!-- Item -->

					<!-- Item -->

				</div>
				<!-- Recomend products Slider -->

			</div>
		</div>