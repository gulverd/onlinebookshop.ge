<section class="best-seller tc-padding">
			<div class="container">
				
				<!-- Main Heading -->
				<div class="main-heading-holder">
					<div class="main-heading style-3">
						<h2>Best <span class="theme-color">Seller</span> Books</h2>
					</div>
				</div>
				<!-- Main Heading -->

				<!-- Best sellers Tabs -->
				<div id="best-sellers-tabs" class="best-sellers-tabs">

					<!-- Nav tabs -->
					<div class="tabs-nav-holder">
						<ul class="tabs-nav">
							<?php
								$query = "SELECT * FROM categories WHERE category_type = 2";
								$run   = mysqli_query($conn,$query);

								while($row = mysqli_fetch_array($run)){
									$id = $row['id'];
									$cat_name = $row['category_name'];
									echo '<li><a href="#">'.$cat_name.'</a></li>';
								}
							?>
						</ul>
					</div>
					<!-- Nav tabs -->
			    		<div class="col-md-12">
			    			<?php
			    				include 'admin/db.php';
			    				$query = "SELECT * FROM books WHERE book_type = 2 ORDER BY RAND() LIMIT 8";
			    				$run   = mysqli_query($conn,$query);

			    				while($row = mysqli_fetch_array($run)){
			    					$id  			= $row['id'];
			    					$isbn      		= $row['isbn'];	
									$title      	= $row['title'];
									$author      	= $row['author'];
									$blurb      	= $row['blurb'];
									$price      	= $row['price'];
									$sale 			= $row['sale'];
									$pages      	= $row['pages'];
									$publisher     	= $row['publisher'];
									$date      		= $row['datee'];
									$status      	= $row['status'];
									$picture 		= $row['picture'];
									$category 		= $row['category_id'];

										$query1 = "SELECT * FROM categories WHERE id = '$category'";
										$run1   = mysqli_query($conn,$query1);

										while($row1 = mysqli_fetch_array($run1)){
											$category_name = $row1['category_name'];
										}

										if($sale != '' or $sale != NULL){
											$sale_batch = '<span class="sale-bacth">sale</span>';
											$book_price = '<span class="new_price">'. $price.' GEL   </span>  '. $sale . ' GEL';
										}else{
											$book_price = $price .' GEL';
											$sale_batch = '';
										}

									echo '

										<div class="col-md-3 item itemsa">
						    				<div class="product-box">
						    					<div class="product-img">
						    						<a href="book-detail.php?book_id='.$id.'">
						    							<img src="imgs/books/'.$picture.'" alt="">
						    						</a>
						    						'.$sale_batch.'
						    					</div>
						    					<div class="product-detail">
						    						<span>'.$category_name.'</span>
						    						<h5><a href="book-detail.php?book_id='.$id.'">'.$title.'</a></h5>
						    						<div class="rating-nd-price">
						    							<strong>'.$book_price.'</strong>
						    						</div>
						    					</div>
						    				</div>
						    			</div>

									';
			    				}
			    			?>

			    		</div>
				<!-- Best sellers Tabs -->

			</div>
		</section>