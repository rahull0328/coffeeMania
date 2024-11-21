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
							<p>Ring us when you want to take a break from your healthy appetite.</p>
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

<?php

require '../assets/includes/footer.php';
require '../assets/includes/scripts.php';

?>