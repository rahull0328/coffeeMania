<?php

require "./assets/includes/config.php";
include pathOf('assets/includes/header.php');

$coffeeList = "SELECT * FROM `products` ORDER BY RAND() LIMIT 4";
$coffeeResult = mysqli_query($con, $coffeeList);
$coffeeData = mysqli_fetch_all($coffeeResult);
?>

<section class="home-slider owl-carousel">
	<div class="slider-item" style="background-image: url(<?= urlOf('assets/images/bg_1.jpg') ?>);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

				<div class="col-md-8 col-sm-12 text-center ftco-animate">
					<span class="subheading">Welcome</span>
					<h1 class="mb-4">The Best Coffee Testing Experience</h1>
					<p class="mb-4 mb-md-5">Crafted Coffee, Cozy Vibes - Because You Deserve a Break from the Ordinary.</p>
					<p><a href="<?= urlOf('pages/menu.php') ?>" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View Menu</a></p>
				</div>

			</div>
		</div>
	</div>

	<div class="slider-item" style="background-image: url(<?= urlOf('assets/images/bg_2.jpg') ?>);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

				<div class="col-md-8 col-sm-12 text-center ftco-animate">
					<span class="subheading">Welcome</span>
					<h1 class="mb-4">Amazing Taste &amp; Beautiful Place</h1>
					<p class="mb-4 mb-md-5">Crafted Coffee, Cozy Vibes - Because You Deserve a Break from the Ordinary.</p>
					<p><a href="<?= urlOf('pages/menu.php') ?>" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View Menu</a></p>
				</div>

			</div>
		</div>
	</div>

	<div class="slider-item" style="background-image: url(<?= urlOf('assets/images/bg_3.jpg') ?>);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

				<div class="col-md-8 col-sm-12 text-center ftco-animate">
					<span class="subheading">Welcome</span>
					<h1 class="mb-4">Creamy Hot and Ready to Serve</h1>
					<p class="mb-4 mb-md-5">Crafted Coffee, Cozy Vibes - Because You Deserve a Break from the Ordinary.</p>
					<p><a href="<?= urlOf('pages/menu.php') ?>" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View Menu</a></p>
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
							<h3>Open All Week</h3>
							<p>8:00am - 9:00pm</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-about d-md-flex">
	<div class="one-half img" style="background-image: url(<?= urlOf('assets/images/about.jpg') ?>);"></div>
	<div class="one-half ftco-animate">
		<div class="overlap">
			<div class="heading-section ftco-animate ">
				<span class="subheading">Discover</span>
				<h2 class="mb-4">Our Story</h2>
			</div>
			<div>
				<p>
					Welcome to CoffeeMania, where every sip and bite tells a story of passion, quality, and community. Our journey began with a simple dream: to create a space where people can come together to enjoy exceptional coffee, delicious treats, and unforgettable moments.
					From handpicked beans sourced from the finest growers to our chef-inspired menu, we’re dedicated to delivering an experience that delights your senses. Whether you’re here to relax, connect, or create, we’re proud to be part of your day.
					Step into our story and discover the heart behind every flavor.
				</p>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section ftco-services">
	<div class="container">
		<div class="row">
			<div class="col-md-4 ftco-animate">
				<div class="media d-block text-center block-6 services">
					<div class="icon d-flex justify-content-center align-items-center mb-5">
						<span class="flaticon-choices"></span>
					</div>
					<div class="media-body">
						<h3 class="heading">Easy to Order</h3>
						<p>
							Enjoy a seamless experience with our Easy to Order system—browse, select, and place your order in just a few clicks!
						</p>
					</div>
				</div>
			</div>
			<div class="col-md-4 ftco-animate">
				<div class="media d-block text-center block-6 services">
					<div class="icon d-flex justify-content-center align-items-center mb-5">
						<span class="flaticon-delivery-truck"></span>
					</div>
					<div class="media-body">
						<h3 class="heading">Fastest Delivery</h3>
						<p>
							Craving your favorites? We've got you covered with lightning-fast delivery! Freshly prepared and brought straight to your doorstep in no time.
						</p>
					</div>
				</div>
			</div>
			<div class="col-md-4 ftco-animate">
				<div class="media d-block text-center block-6 services">
					<div class="icon d-flex justify-content-center align-items-center mb-5">
						<span class="flaticon-coffee-bean"></span>
					</div>
					<div class="media-body">
						<h3 class="heading">Quality Coffee</h3>
						<p>
							Experience the rich bold flavors of our premium coffee. Sourced from the finest beans, every cup is brewed to perfection just for you.
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-md-6 pr-md-5">
				<div class="heading-section text-md-right ftco-animate">
					<span class="subheading">Discover</span>
					<h2 class="mb-4">Our Menu</h2>
					<p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
					<p><a href="<?= urlOf('pages/menu.php') ?>" class="btn btn-primary btn-outline-primary px-4 py-3">View Full Menu</a></p>
				</div>
			</div>
			<div class="col-md-6">
				<div class="row">
					<div class="col-md-6">
						<div class="menu-entry">
							<a href="#" class="img" style="background-image: url(<?= urlOf('assets/images/menu-1.jpg') ?>);"></a>
						</div>
					</div>
					<div class="col-md-6">
						<div class="menu-entry mt-lg-4">
							<a href="#" class="img" style="background-image: url(<?= urlOf('assets/images/menu-2.jpg') ?>);"></a>
						</div>
					</div>
					<div class="col-md-6">
						<div class="menu-entry">
							<a href="#" class="img" style="background-image: url(<?= urlOf('assets/images/menu-3.jpg') ?>);"></a>
						</div>
					</div>
					<div class="col-md-6">
						<div class="menu-entry mt-lg-4">
							<a href="#" class="img" style="background-image: url(<?= urlOf('assets/images/menu-4.jpg') ?>);"></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-counter ftco-bg-dark img" id="section-counter" style="background-image: url(<?= urlOf('assets/images/bg_2.jpg') ?>);" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-10">
				<div class="row">
					<div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
						<div class="block-18 text-center">
							<div class="text">
								<div class="icon"><span class="flaticon-coffee-cup"></span></div>
								<strong class="number" data-number="100">0</strong>
								<span>Coffee Branches</span>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
						<div class="block-18 text-center">
							<div class="text">
								<div class="icon"><span class="flaticon-coffee-cup"></span></div>
								<strong class="number" data-number="85">0</strong>
								<span>Number of Awards</span>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
						<div class="block-18 text-center">
							<div class="text">
								<div class="icon"><span class="flaticon-coffee-cup"></span></div>
								<strong class="number" data-number="10567">0</strong>
								<span>Happy Customer</span>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
						<div class="block-18 text-center">
							<div class="text">
								<div class="icon"><span class="flaticon-coffee-cup"></span></div>
								<strong class="number" data-number="900">0</strong>
								<span>Staff</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center mb-5 pb-3">
			<div class="col-md-7 heading-section ftco-animate text-center">
				<span class="subheading">Discover</span>
				<h2 class="mb-4">Our Best Sellers</h2>
				<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
			</div>
		</div>
		<div class="row">
			<?php for ($i = 0 ; $i < count($coffeeData); $i++) { ?>
				<div class="col-md-3">
					<div class="menu-entry">
						<a href="#" class="img" style="background-image: url(<?= urlOf('admin/assets/uploads/').$coffeeData[$i][4] ?>);"></a>
						<div class="text text-center pt-4">
							<h3><a href="#"><?= $coffeeData[$i][1] ?></a></h3>
							<p><?= $coffeeData[$i][3] ?></p>
							<p class="price"><span><?= $coffeeData[$i][2] ?></span></p>
							<p><a href="./pages/product-single.php?id=<?= $coffeeData[$i][0] ?>" class="btn btn-primary btn-outline-primary">Add to Cart</a></p>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</section>

<section class="ftco-gallery">
	<div class="container-wrap">
		<div class="row no-gutters">
			<div class="col-md-3 ftco-animate">
				<a href="gallery.html" class="gallery img d-flex align-items-center" style="background-image: url(<?= urlOf('assets/images/gallery-1.jpg') ?>);">
					<div class="icon mb-4 d-flex align-items-center justify-content-center">
						<span class="icon-search"></span>
					</div>
				</a>
			</div>
			<div class="col-md-3 ftco-animate">
				<a href="gallery.html" class="gallery img d-flex align-items-center" style="background-image: url(<?= urlOf('assets/images/gallery-2.jpg') ?>);">
					<div class="icon mb-4 d-flex align-items-center justify-content-center">
						<span class="icon-search"></span>
					</div>
				</a>
			</div>
			<div class="col-md-3 ftco-animate">
				<a href="gallery.html" class="gallery img d-flex align-items-center" style="background-image: url(<?= urlOf('assets/images/gallery-3.jpg') ?>);">
					<div class="icon mb-4 d-flex align-items-center justify-content-center">
						<span class="icon-search"></span>
					</div>
				</a>
			</div>
			<div class="col-md-3 ftco-animate">
				<a href="gallery.html" class="gallery img d-flex align-items-center" style="background-image: url(<?= urlOf('assets/images/gallery-4.jpg') ?>);">
					<div class="icon mb-4 d-flex align-items-center justify-content-center">
						<span class="icon-search"></span>
					</div>
				</a>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section img" id="ftco-testimony" style="background-image: url(<?= urlOf('assets/images/bg_1.jpg') ?>);" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row justify-content-center mb-5">
			<div class="col-md-7 heading-section text-center ftco-animate">
				<span class="subheading">Testimony</span>
				<h2 class="mb-4">Customers Says</h2>
				<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
			</div>
		</div>
	</div>
	<div class="container-wrap">
		<div class="row d-flex no-gutters">
			<div class="col-lg align-self-sm-end ftco-animate">
				<div class="testimony">
					<blockquote>
						<p>&ldquo;Absolutely love this place! The coffee is always rich and flavorful, and the ambiance is perfect for relaxing or catching up with friends. Highly recommend the signature latte—it’s a game-changer!&rdquo;</p>
					</blockquote>
					<div class="author d-flex mt-4">
						<div class="image mr-3 align-self-center">
							<img src="<?= urlOf('assets/images/person_2.jpg') ?>" alt="">
						</div>
						<div class="name align-self-center">Savan Thakrar<span class="position">Illustrator Designer</span></div>
					</div>
				</div>
			</div>
			<div class="col-lg align-self-sm-end">
				<div class="testimony overlay">
					<blockquote>
						<p>&ldquo;Fast service, friendly staff, and the best pastries in town! The croissants are heavenly, and the cappuccino hits the spot every time. A must-visit for coffee lovers!&rdquo;</p>
					</blockquote>
					<div class="author d-flex mt-4">
						<div class="image mr-3 align-self-center">
							<img src="<?= urlOf('assets/images/person_3.jpg') ?>" alt="">
						</div>
						<div class="name align-self-center">Vaibhavi Rana <span class="position">Frontend Engineer</span></div>
					</div>
				</div>
			</div>
			<div class="col-lg align-self-sm-end ftco-animate">
				<div class="testimony">
					<blockquote>
						<p>&ldquo;Amazing experience every time. The staff is so welcoming, and they always make sure you’re satisfied. Their focus on quality and service is unbeatable!&rdquo;</p>
					</blockquote>
					<div class="author d-flex mt-4">
						<div class="image mr-3 align-self-center">
							<img src="<?= urlOf('assets/images/person_2.jpg') ?>" alt="">
						</div>
						<div class="name align-self-center">Bhumi Soni<span class="position">Senior Backend Developer</span></div>
					</div>
				</div>
			</div>
			<div class="col-lg align-self-sm-end">
				<div class="testimony overlay">
					<blockquote>
						<p>&ldquo;I’ve traveled a lot, but this café serves some of the best coffee I’ve ever had. The beans are clearly top-notch, and the baristas know their craft. Five stars to the quality of coffee and the chef!&rdquo;</p>
					</blockquote>
					<div class="author d-flex mt-4">
						<div class="image mr-3 align-self-center">
							<img src="<?= urlOf('assets/images/person_4.jpg') ?>" alt="">
						</div>
						<div class="name align-self-center">Rakshit Patel <span class="position">HR</span></div>
					</div>
				</div>
			</div>
			<div class="col-lg align-self-sm-end ftco-animate">
				<div class="testimony">
					<blockquote>
						<p>&ldquo;The perfect café for any occasion—work meetings, dates, or just a quiet moment alone. Their mocha is out of this world, and the customer service is fantastic.&rdquo;</p>
					</blockquote>
					<div class="author d-flex mt-4">
						<div class="image mr-3 align-self-center">
							<img src="<?= urlOf('assets/images/person_3.jpg') ?>" alt="">
						</div>
						<div class="name align-self-center">Rahul Mehta <span class="position">Full Stack Developer</span></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<?php

require './assets/includes/footer.php';
require './assets/includes/scripts.php';

?>