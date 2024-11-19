<?php

require "../assets/includes/config.php";
include pathOf('assets/includes/header.php');

if (!isset($_SESSION['user_id'])) {
	header("Location:./login.php");
	exit();
}

$id = $_GET['id'];
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM `products` WHERE `prod_id` = '$id'";
$result = mysqli_query($con, $sql);
$data = mysqli_fetch_all($result);

$query = "SELECT * FROM `products` ORDER BY RAND() LIMIT 4";
$statement = mysqli_query($con, $query);
$products = mysqli_fetch_all($statement, MYSQLI_ASSOC);
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
					<a href="<?= urlOf('admin/assets/uploads/') . $data[$i][4] ?>" class="image-popup"><img src="<?= urlOf('admin//assets/uploads/') . $data[$i][4] ?>" class="img-fluid" alt="Colorlib Template"></a>
				</div>
				<div class="col-lg-6 product-details pl-md-5 ftco-animate">
					<h3><?= $data[$i][1] ?></h3>
					<p class="price"><span>₹&nbsp;<?= $data[$i][2] ?></span></p>
					<p><?= $data[$i][3] ?></p>
					<form>
						<div class="row mt-4">
							<div class="w-100"></div>
							<div class="input-group col-md-6 d-flex mb-3">
								<span class="input-group-btn mr-2">
									<button type="button" class="quantity-left-minus btn" data-type="minus" data-field="">
										<i class="icon-minus"></i>
									</button>
								</span>
								<input type="text" disabled id="quantity" class="form-control input-number" value="1" min="1" max="100">
								<input type="hidden" id="price" value="<?= $data[$i][2] ?>">
								<input type="hidden" value="<?= $id ?>" class="form-control input-number" id="productId">
								<span class="input-group-btn ml-2">
									<button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
										<i class="icon-plus"></i>
									</button>
								</span>
							</div>
						<?php } ?>
						</div>
						<input type="button" value="Add To Cart" class="btn btn-primary py-3 px-5" onclick="addToCart()">
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
			<?php foreach ($products as $product) { ?>
				<div class="col-md-3">
					<div class="menu-entry">
						<a href="#" class="img" style="background-image: url(<?= urlOf('admin/assets/uploads/') . $product['image'] ?>);"></a>
						<div class="text text-center pt-4">
							<h3><a href="#"><?= $product['name'] ?></a></h3>
							<p><?= $product['description'] ?></p>
							<p class="price"><span><?= $product['price'] ?></span></p>
							<p><a href="./product-single.php?id=<?= $product['prod_id'] ?>" class="btn btn-primary btn-outline-primary">View</a></p>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</section>

<script src="../assets/js/jquery-3.6.0.min.js"></script>
<script>
	$(document).ready(function() {

		$('.quantity-right-plus').click(function(e) {
			e.preventDefault();
			var quantity = parseInt($('#quantity').val());
			$('#quantity').val(quantity + 1);
		});

		$('.quantity-left-minus').click(function(e) {
			e.preventDefault();
			var quantity = parseInt($('#quantity').val());
			if (quantity > 1)
				$('#quantity').val(quantity - 1);
		});

	});

	//ajax call for adding product into cart
	function addToCart() {
		let data = {
			quantity: $('#quantity').val(),
			productId: $('#productId').val(),
			price: $("#price").val(),
		}

		$.post('../api/cart/addToCart.php', data, function(response) {
			console.log(response);
			if (response['success'] == true)
				window.location.href = './cart.php';
			else
				return alert("Something went wrong");
		});
	}
</script>

<?php

require '../assets/includes/footer.php';
require '../assets/includes/scripts.php';

?>