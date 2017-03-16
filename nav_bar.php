		<nav class="nav-holder style-2">
				
			<!-- Logo bar -->
			<div class="logo-bar">
				<div class="container">

					<!-- Logo -->
					<div class="logo"><a href="index.php"><img src="images/logo-1.png" alt=""></a></div>
					<!-- Logo -->

					<!-- Add To Cart -->
					<?php include 'bag.php';?>
					<!-- Add To Cart -->

					<!-- Address Lisr -->
					<div class="address-list style-2">
						<?php 
							include 'admin/db.php';
							$query = "SELECT phone FROM contact";
							$run   = mysqli_query($conn,$query);

							while($row = mysqli_fetch_array($run)){
								$phone = $row['phone'];
							}
						?>
						<ul>
							<li><i class="fa fa-phone"></i> Call us: <?php echo $phone;?><span>Monday to Saturday 09:00 am 6:00pm</span></li>
							<li><i class="fa fa-usd"></i> Money back guarantee<span>WITHIN IN 3 DAYS</span></li>
						</ul>
					</div>
					<!-- Address Lisr -->

				</div>
			</div>
			<!-- Logo bar -->

			<!-- Nav Bar -->
			<div class="nav-bar">
				<div class="container">
					<div class="mega-dropdown-wrapper">

						<!-- Responsive Button -->
						<div class="responsive-btn">
							<a href="#menu" class="menu-link circle-btn"><i class="fa fa-bars"></i></a>
						</div>
						<!-- Responsive Button -->

						<!-- Navigation -->
						<div class="navigation">
							<ul>
								<li class="active dropdown-icon">
									<a href="index.php"><i class="fa fa-home"></i>Home</a>
								</li>
								<li class="dropdown-icon">
									<a href="shop.php?cate_id=all"><i class="fa fa-shopping-bag"></i>shop</a>
								</li>
								<li class="dropdown-icon">
									<a href="trade_books.php"><i class="fa fa-book" aria-hidden="true"></i>Trade Books</a>
								</li>
								<li class="dropdown-icon mega-dropdown-holder">
									<a href="#"><i class="fa fa-list-ul" aria-hidden="true"></i>Publishers</a>
									<ul>
										<li>
											<div class="mega-dropdown">
												<div class="row">
													<div class="col-sm-3">
														<div class="categories-list">
															<h6>Mamcillan Education</h6>
															<?php 
																$query2 = "SELECT * FROM sub_categories WHERE parent_id = 1";
																$run2   = mysqli_query($conn,$query2);

																while($row2 = mysqli_fetch_array($run2)){
																	$id2   = $row2['id'];
																	$name2 = $row2['sub_category_name'];
																	echo '<a href="shop.php?cate_id='.$id2.'">'.$name2.'</a>';
 																}
															?>
														</div>
													</div>
													<div class="col-sm-3">
														<div class="categories-list">
															<h6>PEARSON EDUCATION</h6>
															<?php 
																$query3 = "SELECT * FROM sub_categories WHERE parent_id = 2";
																$run3   = mysqli_query($conn,$query3);

																while($row3 = mysqli_fetch_array($run3)){
																	$id3   = $row3['id'];
																	$name3 = $row3['sub_category_name'];
																	echo '<a href="shop.php?cate_id='.$id3.'">'.$name3.'</a>';
 																}
															?>
														</div>
													</div>
													<div class="col-sm-3">
														<div class="categories-list">
															<h6>OXFORD UNIVERSITY PRESS</h6>
															<?php 
																$query4 = "SELECT * FROM sub_categories WHERE parent_id = 3";
																$run4   = mysqli_query($conn,$query4);

																while($row4 = mysqli_fetch_array($run4)){
																	$id4   = $row4['id'];
																	$name4 = $row4['sub_category_name'];
																	echo '<a href="shop.php?cate_id='.$id4.'">'.$name4.'</a>';
 																}
															?>
														</div>
													</div>
													<div class="col-sm-3">
														<div class="categories-list">
															<h6>CAMBRIDGE UNIVERSITY PRESS</h6>
															<?php 
																$query5 = "SELECT * FROM sub_categories WHERE parent_id = 4";
																$run5   = mysqli_query($conn,$query5);

																while($row5 = mysqli_fetch_array($run5)){
																	$id5   = $row5['id'];
																	$name5 = $row5['sub_category_name'];
																	echo '<a href="shop.php?cate_id='.$id5.'">'.$name5.'</a>';
 																}
															?>	
													</div>
												</div>
											</div>
										</li>
									</ul>
								</li>
								<li class="dropdown-icon">
									<a href="#"><i class="fa fa-files-o"></i>Pages</a>
									<ul>
										<?php
											$queryPages = "SELECT * FROM pages ORDER BY id ASC";
											$runPages	= mysqli_query($conn,$queryPages);

											while($rowPages = mysqli_fetch_array($runPages)){
												$page_id 	= $rowPages['id'];
												$page_name  = $rowPages['page_name'];
												echo '<li><a href="pages.php?page_id='.$page_id.'">'.$page_name.'</a></li>';
											}
										?>
									</ul>
								</li>
								<li class="dropdown-icon">
									<a href="#"><i class="fa fa-file-text"></i>Other Products</a>
									<ul>
										<?php
											$queryProducs = "SELECT * FROM products ORDER BY id ASC";
											$runProducs	= mysqli_query($conn,$queryProducs);

											while($rowProducs = mysqli_fetch_array($runProducs)){
												$product_id 	= $rowProducs['id'];
												$product_name   = $rowProducs['product_name'];
												echo '<li><a href="products.php?product_id='.$product_id.'">'.$product_name.'</a></li>';
											}
										?>
									</ul>

								</li>
								<li><a href="contact.php"><i class="fa fa-fax"></i>contact</a></li>
							</ul>
						</div>
						<!-- Navigation -->

						<!-- Search Nd Drop -->
						<div class="search-nd-drop">
							<ul>
								<li>
									<form class="search-bar style-2">
										<input type="text" class="form-control" required="required" placeholder="Type a search here..." id="search_input">
										<button class="sub-btn fa fa-search"></button>
									</form>
								</li>
							</ul>
							<div class="search_tool_wrapper">
							</div>
						</div>
						<!-- Search Nd Drop -->

					</div>
				</div>
			</div>
			<!-- Nav Bar -->

		</nav>

