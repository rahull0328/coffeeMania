<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location:./login.php");
    exit();
}
require "../assets/includes/config.php";
include pathOf('assets/includes/header.php');

$id = $_GET['id'];
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM `products` WHERE `prod_id` = '$id'";
$result = mysqli_query($con, $sql);
$data = mysqli_fetch_all($result);

?>

<section class="home-slider owl-carousel">

	<div class="slider-item" style="background-image: url(<?= urlOf('assets/images/bg_3.jpg') ?>);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row slider-text justify-content-center align-items-center">

				<div class="col-md-7 col-sm-12 text-center ftco-animate">
					<h1 class="mb-3 mt-5 bread">Product Detail</h1>
					<p class="breadcrumbs"><span class="mr-2"><a href="<?= urlOf('index.php') ?>">Home</a></span> <span>Product Detail</span></p>
				</div>

			</div>
		</div>
	</div>
</section>

<section class="ftco-section">
	<div class="container">
		<div class="row">
			<?php for ($i = 0; $i < count($data); $i++) {
			?>
				<div class="col-lg-6 mb-5 ftco-animate">
					<a href="<?= urlOf('admin//assets/uploads/') . $data[$i][4] ?>" class="image-popup"><img src="<?= urlOf('admin//assets/uploads/') . $data[$i][4] ?>" class="img-fluid" alt="Colorlib Template"></a>
				</div>
				<div class="col-lg-6 product-details pl-md-5 ftco-animate">
					<h3><?= $data[$i][1] ?></h3>
					<p class="price"><span>₹&nbsp;<?= $data[$i][2] ?></span></p>
					<p><?= $data[$i][3] ?></p>
					<form method="GET" id="addQuantityForm">
						<div class="row mt-4">
							<div class="w-100"></div>
							<div class="input-group col-md-6 d-flex mb-3">
								<span class="input-group-btn mr-2">
									<button type="button" class="quantity-left-minus btn" data-type="minus" data-field="">
										<i class="icon-minus"></i>
									</button>
								</span>
								<input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
								<input type="hidden" value="<?= $id ?>" class="form-control input-number" name="productId" id="productId">
								<input type="hidden" value="<?= $user_id ?>" class="form-control input-number" name="userId" id="userId">
								<span class="input-group-btn ml-2">
									<button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
										<i class="icon-plus"></i>
									</button>
								</span>
							</div>
							<?php } ?>
						</div>
						<input type="submit" value="Add To Cart" class="btn btn-primary py-3 px-5">
					</form>
				</div>
		</div>
	</div>
</section>

<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center mb-5 pb-3">
			<div class="col-md-7 heading-section ftco-animate text-center">
				<span class="subheading">Discover</span>
				<h2 class="mb-4">Related products</h2>
				<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<div class="menu-entry">
					<a href="#" class="img" style="background-image: url(../assets/images/menu-1.jpg);"></a>
					<div class="text text-center pt-4">
						<h3><a href="#">Coffee Capuccino</a></h3>
						<p>A small river named Duden flows by their place and supplies</p>
						<p class="price"><span>$5.90</span></p>
						<p><a href="#" class="btn btn-primary btn-outline-primary">Add to Cart</a></p>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="menu-entry">
					<a href="#" class="img" style="background-image: url(../assets/images/menu-2.jpg);"></a>
					<div class="text text-center pt-4">
						<h3><a href="#">Coffee Capuccino</a></h3>
						<p>A small river named Duden flows by their place and supplies</p>
						<p class="price"><span>$5.90</span></p>
						<p><a href="#" class="btn btn-primary btn-outline-primary">Add to Cart</a></p>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="menu-entry">
					<a href="#" class="img" style="background-image: url(../assets/images/menu-3.jpg);"></a>
					<div class="text text-center pt-4">
						<h3><a href="#">Coffee Capuccino</a></h3>
						<p>A small river named Duden flows by their place and supplies</p>
						<p class="price"><span>$5.90</span></p>
						<p><a href="#" class="btn btn-primary btn-outline-primary">Add to Cart</a></p>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="menu-entry">
					<a href="#" class="img" style="background-image: url(../assets/images/menu-4.jpg);"></a>
					<div class="text text-center pt-4">
						<h3><a href="#">Coffee Capuccino</a></h3>
						<p>A small river named Duden flows by their place and supplies</p>
						<p class="price"><span>$5.90</span></p>
						<p><a href="#" class="btn btn-primary btn-outline-primary">Add to Cart</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<script src="../assets/js/jquery-3.6.0.min.js"></script>
<script>
	$(document).ready(function() {

		var quantitiy = 0;
		$('.quantity-right-plus').click(function(e) {

			// Stop acting like a button
			e.preventDefault();
			// Get the field name
			var quantity = parseInt($('#quantity').val());

			// If is not undefined

			$('#quantity').val(quantity + 1);


			// Increment

		});

		$('.quantity-left-minus').click(function(e) {
			// Stop acting like a button
			e.preventDefault();
			// Get the field name
			var quantity = parseInt($('#quantity').val());

			// If is not undefined

			// Increment
			if (quantity > 0) {
				$('#quantity').val(quantity - 1);
			}
		});

	});

	//ajax call for adding product into cart
	function addToCart(event) {
		event.preventDefault();

		let data = {
			quantity: $('#quantity').val(),
			productId: $('#productId').val(),
			userId: $('#userId').val(),
		}

		console.log(data);

		$.get('../api/cart/addToCart.php', data, function(response) {
            window.location.href = "cart.php";
        });
	}

	$("#addQuantityForm").on("submit", addToCart);
</script>

<?php

require '../assets/includes/footer.php';
require '../assets/includes/scripts.php';

?>