<?php
session_start();
if (!isset($_SESSION['user_id'])) {
	header("Location:./login.php");
	exit();
}

require "../assets/includes/config.php";
include pathOf('assets/includes/header.php');

$user_id = $_SESSION['user_id'];
$sql = "SELECT products.name, products.price, products.description, products.image, products.prod_id, cart.cart_amt AS cartAmt, cart.qty AS cartQty, cart.cart_id AS cartId FROM cart INNER JOIN products ON products.prod_id = cart.prod_id WHERE cart.user_id = '$user_id'";
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
								<th colspan="2">Product</th>
								<th>Price</th>
								<th>Quantity</th>
								<th>Total</th>
							</tr>
						</thead>
						<?php
							if($cartData) { 
							for ($i = 0; $i < count($cartData); $i++) {
							print_r($cartData);
						?>
							<tbody>
								<form method="get">
									<tr class="text-center">
										<td class="product-remove"><a href="<?= urlOf('api/cart/removeProduct.php') ?>"><span class="icon-close"></span></a></td>

										<td class="image-prod">
											<div class="img" style="background-image:url(<?= urlOf('admin//assets/uploads/') . $cartData[$i][3] ?>);"></div>
										</td>

										<td class="product-name">
											<h3><?= $cartData[$i][0] ?></h3>
											<p><?= $cartData[$i][2] ?></p>
										</td>

										<td class="price">₹&nbsp;<?= $cartData[$i][1] ?></td>

										<td class="quantity">
											<div class="input-group mb-3">
												<input type="text" id="quantity" name="quantity" class="form-control input-number" onchange="calcPrice()" value="<?= $cartData[$i][6] ?>" max="100">
												<input type="hidden" id="price" name="price" class="form-control input-number" value="<?= $cartData[$i][1] ?>" />
												<input type="hidden" id="updatedprice" name="updatedprice" class="form-cotnrol input-number" value="<?= $cartData[$i][1] ?>" />
												<input type="hidden" name="productId" id="productId" value="<?= $cartData[$i][4] ?>" class="form-control input-number">
												<input type="hidden" value="<?= $user_id ?>" class="form-control input-number" name="userId" id="userId">
												<input type="hidden" value="<?= $cartData[$i][7] ?>" class="form-control input-number" name="cartId" id="cartId">
											</div>
										</td>

										<td class="price" id="totalPrice">₹&nbsp;</td>

									</tr><!-- END TR-->
								</form>
							</tbody>
						<?php }} else { ?>
							<h3 class="text-center">No products found in your cart.</h3>
						<?php }?>
					</table>
				</div>
			</div>
		</div>
		<div class="row justify-content-end">
			<div class="col col-lg-12 col-md-12 mt-5 cart-wrap ftco-animate">
				<p class="text-center"><a href="" class="btn btn-primary py-3 px-4">Place Order</a></p>
			</div>
		</div>
	</div>
</section>

<script src="../assets/js/jquery-3.6.0.min.js"></script>
<script>
	$(init)

	function init() {
		updateTotalPrice();
	}

	function calcPrice() {
		var price = $("#price").val();
		var quantity = $("#quantity").val();
		var totalPrice = parseInt(price) * parseInt(quantity);
		$("#updatedprice").text(totalPrice);
		updateTotalPrice();
		let data = {
			totalPrice: $('#totalPrice').val(),
			quantity: $("#quantity").val(),
			cartId: $("#cartId").val(),
			productId: $("#productId").val(),
			userId: $("#userId").val(),
		}
		console.log(data);
		$.get("../api/cart/updateCart.php", data, function(response) {
			window.location.reload();
		})
	}

	function updateTotalPrice() {
		let totalPrice = $("#updatedprice").text();
		let mainTotal = 0;
		mainTotal += parseInt(totalPrice);
		console.log(mainTotal);
		$("#totalPrice").text(mainTotal);
	}
</script>

<?php

require '../assets/includes/footer.php';
require '../assets/includes/scripts.php';

?>