<?php
require "../assets/includes/config.php";
include pathOf('assets/includes/header.php');

$productQuery = "
    SELECT 
        p.prod_id, p.name, p.price, p.description, p.image, c.cat_name AS category 
    FROM `products` p 
    JOIN `categories` c ON p.cat_id = c.id
    ORDER BY p.cat_id";
$productResult = mysqli_query($con, $productQuery);

// Organize products by category
$productsByCategory = [];
while ($row = mysqli_fetch_assoc($productResult)) {
	$productsByCategory[$row['category']][] = $row;
}

//sql query for displaying desserts
$dessertList = "SELECT * FROM products WHERE cat_id = 4";
$dessertResult = mysqli_query($con, $dessertList);
$dessertData = mysqli_fetch_all($dessertResult);

//sql query for displaying coffee
$coffeeList = "SELECT * FROM products WHERE cat_id = 5";
$coffeeResult = mysqli_query($con, $coffeeList);
$coffeeData = mysqli_fetch_all($coffeeResult);

//sql query for displaying fries
$friesList = "SELECT * FROM products WHERE cat_id = 2";
$friesResult = mysqli_query($con, $friesList);
$friesData = mysqli_fetch_all($friesResult);

//sql query for displaying burgers
$burgerList = "SELECT * FROM products WHERE cat_id = 3";
$burgerResult = mysqli_query($con, $burgerList);
$burgerData = mysqli_fetch_all($burgerResult);

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
							<p> 203 Fake St. Mountain View, San Francisco, California, USA</p>
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
			<?php foreach ($productsByCategory as $categoryName => $products): ?>
				<div class="col-md-6 mb-5 pb-3">
					<h3 class="mb-5 heading-pricing ftco-animate"><?= $categoryName ?></h3>
					<?php foreach ($products as $product): ?>
						<div class="pricing-entry d-flex ftco-animate">
							<a href="./product-single.php?id=<?= $product['prod_id'] ?>">
								<div class="img" style="background-image: url(<?= urlOf('admin/assets/uploads/') . $product['image'] ?>);">
								</div>
							</a>
							<div class="desc pl-3">
								<div class="d-flex text align-items-center">
									<h3><span><?= $product['name'] ?></span></h3>
									<span class="price">₹&nbsp;<?= $product['price'] ?></span>
								</div>
								<div class="d-block">
									<p><?= $product['description'] ?></p>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			<?php endforeach; ?>


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