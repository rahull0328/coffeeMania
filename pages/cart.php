<?php
session_start();
if (!isset($_SESSION['user_id'])) {
	header("Location:./login.php");
	exit();
}

require "../assets/includes/config.php";
include pathOf('assets/includes/header.php');

$user_id = $_SESSION['user_id'];
$sql = "SELECT products.name, products.price, products.description, products.image, products.prod_id FROM cart INNER JOIN products ON products.prod_id = cart.prod_id WHERE cart.user_id = '$user_id'";
$result = mysqli_query($con, $sql);
$cartData = mysqli_fetch_all($result);

?>
<section class="home-slider owl-carousel">

	<div class="slider-item" style="background-image: url(<?= urlOf('assets/images/bg_3.jpg') ?>);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row slider-text justify-content-center align-items-center">

				<div class="col-md-7 col-sm-12 text-center ftco-animate">
					<h1 class="mb-3 mt-5 bread">Cart</h1>
					<p class="breadcrumbs"><span class="mr-2"><a href="<?= urlOf('index.php') ?>">Home</a></span> <span>Cart</span></p>
				</div>

			</div>
		</div>
	</div>
</section>

<section class="ftco-section ftco-cart">
	<div class="container">
		<div class="row">
			<div class="col-md-12 ftco-animate">
				<div class="cart-list">
					<table class="table">
						<thead class="thead-primary">
							<tr class="text-center">
								<th>Action</th>
								<th colspan="3">Product</th>
								<th>Price</th>
								<th></th>
							</tr>
						</thead>
						<?php for ($i = 0; $i < count($cartData); $i++) {
						?>
							<tbody>
								<form method="post">
									<tr class="text-center">
										<td class="product-remove"><a href="<?= urlOf('api/cart/removeProduct.php') ?>"><span class="icon-close"></span></a></td>
	
										<td class="image-prod">
											<div class="img" style="background-image:url(<?= urlOf('admin//assets/uploads/') . $cartData[$i][3] ?>);"></div>
										</td>
	
										<td class="product-name">
											<h3><?= $cartData[$i][0] ?></h3>
											<p><?= $cartData[$i][2] ?></p>
										</td>

										<td>

										</td>
										
										<td class="price">₹&nbsp;<?= $cartData[$i][1] ?></td>
	
										<td class="quantity">
											<div class="input-group mb-3">
												<input type="hidden" value="<?= $id ?>" class="form-control input-number" name="productId" id="productId">
												<input type="hidden" value="<?= $user_id ?>" class="form-control input-number" name="userId" id="userId">
											</div>
										</td>
	
									</tr><!-- END TR-->
								</form>
							</tbody>
						<?php } ?>
					</table>
				</div>
			</div>
		</div>
		<div class="row justify-content-end">
			<div class="col col-lg-3 col-md-6 mt-5 cart-wrap ftco-animate">
				<div class="cart-total mb-3">
					<h3>Cart Totals</h3>
					<p class="d-flex">
						<span>Subtotal</span>
						<span>$20.60</span>
					</p>
					<p class="d-flex">
						<span>Delivery</span>
						<span>$0.00</span>
					</p>
					<p class="d-flex">
						<span>Discount</span>
						<span>$3.00</span>
					</p>
					<hr>
					<p class="d-flex total-price">
						<span>Total</span>
						<span>$17.60</span>
					</p>
				</div>
				<p class="text-center"><a href="" class="btn btn-primary py-3 px-4">Place Order</a></p>
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
					<a href="#" class="img" style="background-image: url(<?= urlOf('assets/images/menu-1.jpg') ?>);"></a>
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
					<a href="#" class="img" style="background-image: url(<?= urlOf('assets/images/menu-2.jpg') ?>);"></a>
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
					<a href="#" class="img" style="background-image: url(<?= urlOf('assets/images/menu-3.jpg') ?>);"></a>
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
					<a href="#" class="img" style="background-image: url(<?= urlOf('assets/images/menu-4.jpg') ?>);"></a>
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
</script>

<?php

require '../assets/includes/footer.php';
require '../assets/includes/scripts.php';

?>