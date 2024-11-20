<?php 

    require '../../assets/includes/config.php';

    header('Content-Type: application/json');

    $cartId = $_GET['cartId'];

    $query = "DELETE FROM `cart` WHERE `cart_id` = '$cartId'";
    $result = mysqli_query($con, $query);
    if($result) [
        "success" => true,    
        "message" => "Product Removed From Product !"
    ];

    header("Location: ../../pages/cart.php");
    mysqli_close($con);