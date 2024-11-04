<?php 
	session_start();
	require "../assets/includes/config.php";
	include pathOf('assets/includes/header.php');

	//sql query for displaying pizza
	$pizzaList = "SELECT * FROM `products` WHERE `cat_id` = 1";
	$pizzaResult = mysqli_query($con, $pizzaList);
	$pizzaData = mysqli_fetch_all($pizzaResult);

	//sql query for displaying fries
	$friesList = "SELECT * FROM `products` WHERE `cat_id` = 2";
	$friesResult = mysqli_query($con, $friesList);
	$friesData = mysqli_fetch_all($friesResult);

	//sql query for displaying burgers
	$burgerList = "SELECT * FROM `products` WHERE `cat_id` = 3";
	$burgerResult = mysqli_query($con, $burgerList);
	$burgerData = mysqli_fetch_all($burgerResult);

	//sql query for displaying desserts
	$dessertList = "SELECT * FROM `products` WHERE `cat_id` = 4";
	$dessertResult = mysqli_query($con, $dessertList);
	$dessertData = mysqli_fetch_all($dessertResult);

	//sql query for displaying coffee
	$coffeeList = "SELECT * FROM `products` WHERE `cat_id` = 5";
	$coffeeResult = mysqli_query($con, $coffeeList);
	$coffeeData = mysqli_fetch_all($coffeeResult);

?>
    <section class="home-slider owl-carousel">

      <div class="slider-item" style="background-image: url(<?= urlOf('assets/images/bg_3.jpg') ?>);" data-stellar-background-ratio="0.5">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center">

            <div class="col-md-7 col-sm-12 text-center ftco-animate">
            	<h1 class="mb-3 mt-5 bread">Our Menu</h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="<?= urlOf('index.php') ?>">Home</a></span> <span>Menu</span></p>
            </div>

          </div>
        </div>
      </div>
    </section>

    <section class="ftco-intro">
    	<div class="container-wrap">
    		<div class="wrap d-md-flex align-items-xl-end">
	    		<div class="info">
	    			<div class="row no-gutters">
	    				<div class="col-md-4 d-flex ftco-animate">
	    					<div class="icon"><span class="icon-phone"></span></div>
	    					<div class="text">
	    						<h3>000 (123) 456 7890</h3>
	    						<p>A small river named Duden flows by their place and supplies.</p>
	    					</div>
	    				</div>
	    				<div class="col-md-4 d-flex ftco-animate">
	    					<div class="icon"><span class="icon-my_location"></span></div>
	    					<div class="text">
	    						<h3>198 West 21th Street</h3>
	    						<p>	203 Fake St. Mountain View, San Francisco, California, USA</p>
	    					</div>
	    				</div>
	    				<div class="col-md-4 d-flex ftco-animate">
	    					<div class="icon"><span class="icon-clock-o"></span></div>
	    					<div class="text">
	    						<h3>Open Monday-Friday</h3>
	    						<p>8:00am - 9:00pm</p>
	    					</div>
	    				</div>
	    			</div>
	    		</div>
    		</div>
    	</div>
    </section>

    <section class="ftco-section">
    	<div class="container">
        	<div class="row">
				<div class="col-md-6 mb-5 pb-3">
					<h3 class="mb-5 heading-pricing ftco-animate">Pizza's</h3>
					<?php for ($i = 0; $i < count($pizzaData); $i++){ ?>
					<div class="pricing-entry d-flex ftco-animate">
						<a href="./product-single.php?id=<?= $pizzaData[$i][0] ?>">
							<div class="img" style="background-image: url(<?= urlOf('admin//assets/uploads/') . $pizzaData[$i][4] ?>);">
							</div>
						</a>
						<div class="desc pl-3">
							<div class="d-flex text align-items-center">
								<h3><span><?= $pizzaData[$i][1] ?></span></h3>
								<span class="price">₹&nbsp;<?= $pizzaData[$i][2] ?></span>
							</div>
							<div class="d-block">
								<p><?= $pizzaData[$i][3] ?></p>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>

				<div class="col-md-6 mb-5 pb-3">
					<h3 class="mb-5 heading-pricing ftco-animate">Coffee's</h3>
					<?php for ($i = 0; $i < count($coffeeData); $i++){ ?>
					<div class="pricing-entry d-flex ftco-animate">
						<a href="./product-single.php?id=<?= $coffeeData[$i][0] ?>">
							<div class="img" style="background-image: url(<?= urlOf('admin//assets/uploads/') . $coffeeData[$i][4] ?>);">
							</div>
						</a>
						<div class="desc pl-3">
							<div class="d-flex text align-items-center">
								<h3><span><?= $coffeeData[$i][1] ?></span></h3>
								<span class="price">₹&nbsp;<?= $coffeeData[$i][2] ?></span>
							</div>
							<div class="d-block">
								<p><?= $coffeeData[$i][3] ?></p>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
				
				<div class="col-md-6 mb-5 pb-3">
					<h3 class="mb-5 heading-pricing ftco-animate">Burger's</h3>
					<?php for ($i = 0; $i < count($burgerData); $i++) {
					?>
					<div class="pricing-entry d-flex ftco-animate">
						<a href="./product-single.php?id=<?= $burgerData[$i][0] ?>">
							<div class="img" style="background-image: url(<?= urlOf('admin//assets/uploads/') . $burgerData[$i][4] ?>);">
							</div>
						</a>
						<div class="desc pl-3">
							<div class="d-flex text align-items-center">
								<h3><span><?= $burgerData[$i][1] ?></span></h3>
								<span class="price">₹&nbsp;<?= $burgerData[$i][2] ?></span>
							</div>
							<div class="d-block">
								<p><?= $burgerData[$i][3] ?></p>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
				
				<div class="col-md-6">
					<h3 class="mb-5 heading-pricing ftco-animate">Desserts</h3>
					<?php for ($i = 0; $i < count($dessertData); $i++) { ?>
					<div class="pricing-entry d-flex ftco-animate">
						<a href="./product-single.php?id=<?= $dessertData[$i][0] ?>">
							<div class="img" style="background-image: url(<?= urlOf('admin//assets/uploads/') . $dessertData[$i][4] ?>);">
							</div>
						</a>
						<div class="desc pl-3">
							<div class="d-flex text align-items-center">
								<h3><span><?= $dessertData[$i][1] ?></span></h3>
								<span class="price">₹&nbsp;<?= $dessertData[$i][2] ?></span>
							</div>
							<div class="d-block">
								<p><?= $dessertData[$i][3] ?></p>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>

				<div class="col-md-6">
					<h3 class="mb-5 heading-pricing ftco-animate">Fries</h3>
					<?php for ($i = 0; $i < count($friesData); $i++) 
						{
					?>
						<div class="pricing-entry d-flex ftco-animate">
							<a href="./product-single.php?id=<?= $friesData[$i][0] ?>">
								<div class="img" style="background-image: url(<?= urlOf('admin//assets/uploads/') . $friesData[$i][4] ?>);">
								</div>
							</a>
							<div class="desc pl-3">
								<div class="d-flex text align-items-center">
									<h3><span><?= $friesData[$i][1] ?></span></h3>
									<span class="price">₹&nbsp;<?= $friesData[$i][2] ?></span>
								</div>
								<div class="d-block">
									<p><?= $friesData[$i][3] ?></p>
								</div>
							</div>
						</div>
					<?php 
						} 
					?>
				</div>
			</div>
    	</div>
    </section>

    <section class="ftco-menu mb-5 pb-5">
    	<div class="container">
    		<div class="row justify-content-center mb-5">
          <div class="col-md-7 heading-section text-center ftco-animate">
          	<span class="subheading">Discover</span>
            <h2 class="mb-4">Our Products</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
          </div>
        </div>
    		<div class="row d-md-flex">
	    		<div class="col-lg-12 ftco-animate p-md-5">
		    		<div class="row">
		          <div class="col-md-12 nav-link-wrap mb-5">
		            <div class="nav ftco-animate nav-pills justify-content-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
		              <a class="nav-link active" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Main Dish</a>

		              <a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Drinks</a>

		              <a class="nav-link" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false">Desserts</a>
		            </div>
		          </div>
		          <div class="col-md-12 d-flex align-items-center">
		            
		            <div class="tab-content ftco-animate" id="v-pills-tabContent">

		              <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-1-tab">
		              	<div class="row">
		              		<div class="col-md-4 text-center">
		              			<div class="menu-wrap">
		              				<a href="#" class="menu-img img mb-4" style="background-image: url(<?= urlOf('assets/images/dish-1.jpg') ?>);"></a>
		              				<div class="text">
		              					<h3><a href="#">Grilled Beef</a></h3>
		              					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
		              					<p class="price"><span>$2.90</span></p>
		              					<p><a href="#" class="btn btn-primary btn-outline-primary">Add to cart</a></p>
		              				</div>
		              			</div>
		              		</div>
		              		<div class="col-md-4 text-center">
		              			<div class="menu-wrap">
		              				<a href="#" class="menu-img img mb-4" style="background-image: url(<?= urlOf('assets/images/dish-2.jpg') ?>);"></a>
		              				<div class="text">
		              					<h3><a href="#">Grilled Beef</a></h3>
		              					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
		              					<p class="price"><span>$2.90</span></p>
		              					<p><a href="#" class="btn btn-primary btn-outline-primary">Add to cart</a></p>
		              				</div>
		              			</div>
		              		</div>
		              		<div class="col-md-4 text-center">
		              			<div class="menu-wrap">
		              				<a href="#" class="menu-img img mb-4" style="background-image: url(<?= urlOf('assets/images/dish-3.jpg') ?>);"></a>
		              				<div class="text">
		              					<h3><a href="#">Grilled Beef</a></h3>
		              					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
		              					<p class="price"><span>$2.90</span></p>
		              					<p><a href="#" class="btn btn-primary btn-outline-primary">Add to cart</a></p>
		              				</div>
		              			</div>
		              		</div>
		              		<div class="col-md-4 text-center">
		              			<div class="menu-wrap">
		              				<a href="#" class="menu-img img mb-4" style="background-image: url(<?= urlOf('assets/images/dish-4.jpg') ?>);"></a>
		              				<div class="text">
		              					<h3><a href="#">Grilled Beef</a></h3>
		              					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
		              					<p class="price"><span>$2.90</span></p>
		              					<p><a href="#" class="btn btn-primary btn-outline-primary">Add to cart</a></p>
		              				</div>
		              			</div>
		              		</div>
		              		<div class="col-md-4 text-center">
		              			<div class="menu-wrap">
		              				<a href="#" class="menu-img img mb-4" style="background-image: url(<?= urlOf('assets/images/dish-5.jpg') ?>);"></a>
		              				<div class="text">
		              					<h3><a href="#">Grilled Beef</a></h3>
		              					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
		              					<p class="price"><span>$2.90</span></p>
		              					<p><a href="#" class="btn btn-primary btn-outline-primary">Add to cart</a></p>
		              				</div>
		              			</div>
		              		</div>
		              		<div class="col-md-4 text-center">
		              			<div class="menu-wrap">
		              				<a href="#" class="menu-img img mb-4" style="background-image: url(<?= urlOf('assets/images/dish-6.jpg') ?>);"></a>
		              				<div class="text">
		              					<h3><a href="#">Grilled Beef</a></h3>
		              					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
		              					<p class="price"><span>$2.90</span></p>
		              					<p><a href="#" class="btn btn-primary btn-outline-primary">Add to cart</a></p>
		              				</div>
		              			</div>
		              		</div>
		              	</div>
		              </div>

		              <div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-2-tab">
		                <div class="row">
		              		<div class="col-md-4 text-center">
		              			<div class="menu-wrap">
		              				<a href="#" class="menu-img img mb-4" style="background-image: url(<?= urlOf('assets/images/drink-1.jpg') ?>);"></a>
		              				<div class="text">
		              					<h3><a href="#">Lemonade Juice</a></h3>
		              					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
		              					<p class="price"><span>$2.90</span></p>
		              					<p><a href="#" class="btn btn-primary btn-outline-primary">Add to cart</a></p>
		              				</div>
		              			</div>
		              		</div>
		              		<div class="col-md-4 text-center">
		              			<div class="menu-wrap">
		              				<a href="#" class="menu-img img mb-4" style="background-image: url(<?= urlOf('assets/images/drink-2.jpg') ?>);"></a>
		              				<div class="text">
		              					<h3><a href="#">Pineapple Juice</a></h3>
		              					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
		              					<p class="price"><span>$2.90</span></p>
		              					<p><a href="#" class="btn btn-primary btn-outline-primary">Add to cart</a></p>
		              				</div>
		              			</div>
		              		</div>
		              		<div class="col-md-4 text-center">
		              			<div class="menu-wrap">
		              				<a href="#" class="menu-img img mb-4" style="background-image: url(<?= urlOf('assets/images/drink-3.jpg') ?>);"></a>
		              				<div class="text">
		              					<h3><a href="#">Soda Drinks</a></h3>
		              					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
		              					<p class="price"><span>$2.90</span></p>
		              					<p><a href="#" class="btn btn-primary btn-outline-primary">Add to cart</a></p>
		              				</div>
		              			</div>
		              		</div>
		              		<div class="col-md-4 text-center">
		              			<div class="menu-wrap">
		              				<a href="#" class="menu-img img mb-4" style="background-image: url(<?= urlOf('assets/images/drink-4.jpg') ?>);"></a>
		              				<div class="text">
		              					<h3><a href="#">Lemonade Juice</a></h3>
		              					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
		              					<p class="price"><span>$2.90</span></p>
		              					<p><a href="#" class="btn btn-primary btn-outline-primary">Add to cart</a></p>
		              				</div>
		              			</div>
		              		</div>
		              		<div class="col-md-4 text-center">
		              			<div class="menu-wrap">
		              				<a href="#" class="menu-img img mb-4" style="background-image: url(<?= urlOf('assets/images/drink-5.jpg') ?>);"></a>
		              				<div class="text">
		              					<h3><a href="#">Pineapple Juice</a></h3>
		              					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
		              					<p class="price"><span>$2.90</span></p>
		              					<p><a href="#" class="btn btn-primary btn-outline-primary">Add to cart</a></p>
		              				</div>
		              			</div>
		              		</div>
		              		<div class="col-md-4 text-center">
		              			<div class="menu-wrap">
		              				<a href="#" class="menu-img img mb-4" style="background-image: url(<?= urlOf('assets/images/drink-6.jpg') ?>);"></a>
		              				<div class="text">
		              					<h3><a href="#">Soda Drinks</a></h3>
		              					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
		              					<p class="price"><span>$2.90</span></p>
		              					<p><a href="#" class="btn btn-primary btn-outline-primary">Add to cart</a></p>
		              				</div>
		              			</div>
		              		</div>
		              	</div>
		              </div>

		              <div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-3-tab">
		                <div class="row">
		              		<div class="col-md-4 text-center">
		              			<div class="menu-wrap">
		              				<a href="#" class="menu-img img mb-4" style="background-image: url(<?= urlOf('assets/images/dessert-1.jpg') ?>);"></a>
		              				<div class="text">
		              					<h3><a href="#">Hot Cake Honey</a></h3>
		              					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
		              					<p class="price"><span>$2.90</span></p>
		              					<p><a href="#" class="btn btn-primary btn-outline-primary">Add to cart</a></p>
		              				</div>
		              			</div>
		              		</div>
		              		<div class="col-md-4 text-center">
		              			<div class="menu-wrap">
		              				<a href="#" class="menu-img img mb-4" style="background-image: url(<?= urlOf('assets/images/dessert-2.jpg') ?>);"></a>
		              				<div class="text">
		              					<h3><a href="#">Hot Cake Honey</a></h3>
		              					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
		              					<p class="price"><span>$2.90</span></p>
		              					<p><a href="#" class="btn btn-primary btn-outline-primary">Add to cart</a></p>
		              				</div>
		              			</div>
		              		</div>
		              		<div class="col-md-4 text-center">
		              			<div class="menu-wrap">
		              				<a href="#" class="menu-img img mb-4" style="background-image: url(<?= urlOf('assets/images/dessert-3.jpg') ?>);"></a>
		              				<div class="text">
		              					<h3><a href="#">Hot Cake Honey</a></h3>
		              					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
		              					<p class="price"><span>$2.90</span></p>
		              					<p><a href="#" class="btn btn-primary btn-outline-primary">Add to cart</a></p>
		              				</div>
		              			</div>
		              		</div>
		              		<div class="col-md-4 text-center">
		              			<div class="menu-wrap">
		              				<a href="#" class="menu-img img mb-4" style="background-image: url(<?= urlOf('assets/images/dessert-4.jpg') ?>);"></a>
		              				<div class="text">
		              					<h3><a href="#">Hot Cake Honey</a></h3>
		              					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
		              					<p class="price"><span>$2.90</span></p>
		              					<p><a href="#" class="btn btn-primary btn-outline-primary">Add to cart</a></p>
		              				</div>
		              			</div>
		              		</div>
		              		<div class="col-md-4 text-center">
		              			<div class="menu-wrap">
		              				<a href="#" class="menu-img img mb-4" style="background-image: url(<?= urlOf('assets/images/dessert-5.jpg') ?>);"></a>
		              				<div class="text">
		              					<h3><a href="#">Hot Cake Honey</a></h3>
		              					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
		              					<p class="price"><span>$2.90</span></p>
		              					<p><a href="#" class="btn btn-primary btn-outline-primary">Add to cart</a></p>
		              				</div>
		              			</div>
		              		</div>
		              		<div class="col-md-4 text-center">
		              			<div class="menu-wrap">
		              				<a href="#" class="menu-img img mb-4" style="background-image: url(<?= urlOf('assets/images/dessert-6.jpg') ?>);"></a>
		              				<div class="text">
		              					<h3><a href="#">Hot Cake Honey</a></h3>
		              					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
		              					<p class="price"><span>$2.90</span></p>
		              					<p><a href="#" class="btn btn-primary btn-outline-primary">Add to cart</a></p>
		              				</div>
		              			</div>
		              		</div>
		              	</div>
		              </div>
		            </div>
		          </div>
		        </div>
		      </div>
		    </div>
    	</div>
    </section>

<?php 

require '../assets/includes/footer.php';
require '../assets/includes/scripts.php';

?>