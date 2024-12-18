<?php

require "../assets/includes/config.php";
include pathOf('assets/includes/header.php');

if (!isset($_SESSION['user_id'])) {
	header("Location:./login.php");
	exit();
}


$user_id = $_SESSION['user_id'];
$sql = "SELECT products.name, products.description, products.image, orders.total_amount AS totAmt, order_items.quantity AS ordersQty FROM order_items INNER JOIN products ON products.prod_id = order_items.product_id INNER JOIN orders ON orders.order_id = order_items.order_id WHERE orders.user_id = '$user_id'";
$result = mysqli_query($con, $sql);
$orderData = mysqli_fetch_all($result);

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

<section class="ftco-section ftco-cart">
	<div class="container">
		<div class="row">
			<div class="col-md-12 ftco-animate">
				<div class="cart-list">
					<table class="table">
						<thead class="thead-primary">
							<tr class="text-center">
								<th colspan="2">Product</th>
								<th>Quantity</th>
								<th>Total Amount</th>
							</tr>
						</thead>
						<?php
						if ($orderData) {
							for ($i = 0; $i < count($orderData); $i++) {
						?>
								<tbody>
										<tr class="text-center">

											<td class="image-prod">
												<div class="img" style="background-image:url(<?= urlOf('admin/assets/uploads/') . $orderData[$i][2] ?>);"></div>
											</td>

											<td class="product-name">
												<h3><?= $orderData[$i][0] ?></h3>
												<p><?= $orderData[$i][1] ?></p>
											</td>

											<td class="price" id="quantity"><?= $orderData[$i][4] ?></td>

											<td class="price" id="price">₹&nbsp;<?= $orderData[$i][3] ?></td>

										</tr><!-- END TR-->
								</tbody>
							<?php }
						} else { ?>
							<h3 class="text-center">No Orders Placed.</h3>
						<?php } ?>
					</table>
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