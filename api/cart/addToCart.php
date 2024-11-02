<?php 

    require '../../assets/includes/config.php';

    header('Content-Type: application/json');

    $quantity = $_GET['quantity'];
    $productId = $_GET['productId'];
    $userId = $_GET['userId'];

    $query = "INSERT INTO `cart`(`qty`, `prod_id`, `user_id`) VALUES('$quantity', '$productId', '$userId')";
    mysqli_query($con, $query);

    header("Location: ../../pages/cart.php");
    mysqli_close($con);