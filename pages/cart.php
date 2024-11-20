<?php

require "../assets/includes/config.php";
include pathOf('assets/includes/header.php');

if (!isset($_SESSION['user_id'])) {
	header("Location:./login.php");
	exit();
}


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
						if ($cartData) {
							for ($i = 0; $i < count($cartData); $i++) {
								print_r($cartData);
						?>
								<tbody>
									<form method="POST">
										<tr class="text-center">
											<td class="product-remove"><a href="../api/cart/remove.php?cartId=<?= $cartData[$i][7] ?>"><span class="icon-close"></span></a></td>

											<td class="image-prod">
												<div class="img" style="background-image:url(<?= urlOf('admin/assets/uploads/') . $cartData[$i][3] ?>);"></div>
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

											<td class="price" id="">₹&nbsp;<?= $cartData[$i][5] ?></td>

										</tr><!-- END TR-->
								</tbody>
							<?php }
						} else { ?>
							<h3 class="text-center">No products found in your cart.</h3>
						<?php } ?>
					</table>
				</div>
			</div>
		</div>
		<div class="row justify-content-end">
			<div class="col col-lg-6 col-md-6 mt-5 cart-wrap ftco-animate">
				<p class="text-center"><input type="button" class="btn btn-primary py-3 px-4" value="Place Order" onclick="placeOrder()" /></p>

			</div>
			<div class="col col-lg-6 col-md-6 mt-5 cart-wrap ftco-animate">
				<p class="text-center"><a href="./viewOrder.php" class="btn btn-primary py-3 px-4">View Order</a></p>
			</div>
		</div>
	</div>
	</form>
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
			price: $('#price').val(),
			quantity: $("#quantity").val(),
			cartId: $("#cartId").val(),
			productId: $("#productId").val(),
			userId: $("#userId").val(),
		}
		console.log(data);
		$.post("../api/cart/updateCart.php", data, function(response) {
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

	function placeOrder() {
		let orderData = {
			productId: $("#productId").val(),
			cartId: $("#cartId").val(),
			userId: $("#userId").val(),
            price: $("#price").val(),
            quantity: $("#quantity").val(),
		}

		console.log(orderData);
		$.ajax({
			url: '../api/order/placeOrder.php',
			type: 'POST',
			contentType: 'application/json',
			data: JSON.stringify({orderData: orderData}), // Make sure to stringify the data
			success: function(response) {
				alert("Order placed successfully!");
				window.location.href = "./viewOrder.php";
				console.log(response); // Log the response from the server
			},
			error: function(xhr, status, error) {
				console.log("Error:", error);
			}
		});
	}
</script>

<?php

require '../assets/includes/footer.php';
require '../assets/includes/scripts.php';

?>