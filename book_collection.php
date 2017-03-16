		<section class="best-seller tc-padding">
			<div class="container">
			    		<div class="col-md-12">
			    			<div class="sec-heading">
									<h3>Educational <span class="theme-color">Books</span> Collection</h3>
									<a class="view-all" href="shop.php">View All<i class="fa fa-angle-double-right"></i></a>
								</div>
			    			<?php
			    				include 'admin/db.php';
			    				$query = "SELECT * FROM books WHERE book_type = 1 ORDER BY RAND() LIMIT 8";
			    				$run   = mysqli_query($conn,$query);

			    				while($row = mysqli_fetch_array($run)){
			    					$id  			= $row['id'];
			    					$isbn      		= $row['isbn'];	
									$title      	= $row['title'];
									$level      	= $row['level'];
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
									$sub_category  	= $row['sub_category_id'];

										$query1 = "SELECT * FROM categories WHERE id = '$category'";
										$run1   = mysqli_query($conn,$query1);

										while($row1 = mysqli_fetch_array($run1)){
											$category_name = $row1['category_name'];
										}

										$query2 = "SELECT * FROM sub_categories WHERE id = '$sub_category'";
										$run2   = mysqli_query($conn,$query2);

										while($row2 = mysqli_fetch_array($run2)){
											$sub_category_name = $row2['sub_category_name'];
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
						    						<span>'.$category_name.' </br> '.$sub_category_name.'</span>
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
			</div>
		</section>
