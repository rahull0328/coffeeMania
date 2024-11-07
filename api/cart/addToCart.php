<?php 

    require '../../assets/includes/config.php';

    header('Content-Type: application/json');

    $quantity = $_GET['quantity'];
    $productId = $_GET['productId'];
    $userId = $_GET['userId'];
    $cart_amt = $_GET['price'];

    $query = "INSERT INTO `cart`(`qty`, `cart_amt`, `prod_id`, `user_id`) VALUES('$quantity', '$cart_amt', '$productId', '$userId')";
    mysqli_query($con, $query);

    header("Location: ../../pages/cart.php");
    mysqli_close($con);