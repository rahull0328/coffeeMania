<?php

require "../assets/includes/config.php";
include pathOf('assets/includes/header.php');

if (!isset($_SESSION['user_id'])) {
	header("Location:./login.php");
	exit();
}


$user_id = $_SESSION['user_id'];

?>
<section class="home-slider owl-carousel">

	<div class="slider-item" style="background-image: url(<?= urlOf('assets/images/bg_3.jpg') ?>);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row slider-text justify-content-center align-items-center">

				<div class="col-md-7 col-sm-12 text-center ftco-animate">
					<h1 class="mb-3 mt-5 bread">My Orders</h1>
					<p class="breadcrumbs"><span class="mr-2"><a href="<?= urlOf('index.php') ?>">Home</a></span> <span>Cart</span></p>
				</div>

			</div>
		</div>
	</div>
</section>

<script src="../assets/js/jquery-3.6.0.min.js"></script>

<?php

require '../assets/includes/footer.php';
require '../assets/includes/scripts.php';

?>