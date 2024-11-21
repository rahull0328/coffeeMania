<?php

require "../assets/includes/config.php";
include pathOf('assets/includes/header.php');

?>

<section class="home-slider owl-carousel">

	<div class="slider-item" style="background-image: url(<?= urlOf('assets/images/bg_3.jpg') ?>);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row slider-text justify-content-center align-items-center">

				<div class="col-md-7 col-sm-12 text-center ftco-animate">
					<h1 class="mb-3 mt-5 bread">About Us</h1>
					<p class="breadcrumbs"><span class="mr-2"><a href="<?= urlOf('index.php') ?>">Home</a></span> <span>About</span></p>
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

<section class="ftco-section img" id="ftco-testimony" style="background-image: url(<?= urlOf('assets/images/bg_1.jpg') ?>);" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row justify-content-center mb-5">
			<div class="col-md-7 heading-section text-center ftco-animate">
				<span class="subheading">Testimony</span>
				<h2 class="mb-4">Customers Says</h2>
				<p>
					Hear out what our regular customers are saying about CoffeeMania
				</p>
			</div>
		</div>
	</div>
	<div class="container-wrap">
		<div class="row d-flex no-gutters">
			<div class="col-lg align-self-sm-end ftco-animate">
				<div class="testimony">
					<blockquote>
						<p>&ldquo;Absolutely love this place! The coffee is always rich and flavorful, and the ambiance is perfect for relaxing or catching up with friends.&rdquo;</p>
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
						<p>&ldquo;Fast service, friendly staff, and the best pastries in town! The croissants are heavenly, and the cappuccino hits the spot every time. A must-visit for coffee lovers who like it smooth and sweet!&rdquo;</p>
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
						<p>&ldquo;The perfect cafe for any occasion—work meetings, dates, or just a quiet moment alone. Their mocha is out of this world, and the customer service is fantastic.&rdquo;</p>
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

<section class="ftco-section">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-md-6 pr-md-5">
				<div class="heading-section text-md-right ftco-animate">
					<span class="subheading">Discover</span>
					<h2 class="mb-4">Our Menu</h2>
					<p class="mb-4">Step into a world of flavors at our café, where every dish is crafted with care and passion. Whether you're craving a hearty breakfast, a light lunch, or a comforting dinner, our diverse menu offers something for everyone. From freshly brewed coffee to indulgent pastries, savory meals to decadent desserts, we’ve got the perfect combination to satisfy your taste buds. Explore our extensive selection of artisanal creations, made with the finest ingredients, and let every bite take you on a delightful journey</p>
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

<?php

require '../assets/includes/footer.php';
require '../assets/includes/scripts.php';

?>