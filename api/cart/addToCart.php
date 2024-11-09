<?php

require '../../assets/includes/config.php';

header('Content-Type: application/json');

$userId = $_SESSION['user_id'];
$quantity = $_POST['quantity'];
$productId = $_POST['productId'];
$price = $_POST['price'];

$cartAmount = $quantity * $price;
$query = "INSERT INTO `cart`(`qty`, `cart_amt`, `prod_id`, `user_id`) VALUES('$quantity', '$cartAmount', '$productId', '$userId')";
$result = mysqli_query($con, $query);

if ($result)
    echo json_encode(['success' => true]);
else
    echo json_encode(['success' => false]);
