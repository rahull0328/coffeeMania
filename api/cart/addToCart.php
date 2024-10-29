<?php 

    require '../../assets/includes/config.php';

    header('Content-Type: application/json');

    $quantity = $_GET['quantity'];
    $productId = $_GET['productId'];

    $query = "INSERT INTO `cart`(`qty`, `prod_id`) VALUES('$quantity', '$productId')";
    mysqli_query($con, $query);

    mysqli_close($con);
    header("Location: ../../pages/cart.php");