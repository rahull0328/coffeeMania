<?php 

    header('Content-Type: application/json');

    require '../../assets/includes/config.php';

    $quantity = $_GET['quantity'];
    $userId = $_GET['userId'];
    $productId = $_GET['productId'];
    $cartId = $_GET['cartId'];
    $totalPrice = $_GET['totalPrice'];

    $query = "UPDATE `cart` SET `qty` = '$quantity', `cart_amt` = '$totalPrice' WHERE `cart_id` = '$cartId' AND `user_id` = '$userId'";
    $result = mysqli_query($con, $query);
    if($result) [
        "success" => true,
        "message" => "Updating Cart successful!"
    ];

    echo json_encode($result);
    mysqli_close($con);