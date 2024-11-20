<?php

    require '../../assets/includes/config.php';

    header('Content-Type: application/json');

    $userId = $_SESSION['user_id'];
    $quantity = $_POST['quantity'];
    $productId = $_POST['productId'];
    $price = $_POST['price'];
    $cartId = $_POST['cartId'];

    $cartAmount = $quantity * $price;
    $query = "INSERT INTO `orders`(`cart_id`, `total_amount`, `prod_id`, `user_id`) VALUES('$cartId', '$cartAmount', '$productId', '$userId')";
    $result = mysqli_query($con, $query);

    if ($result)
        echo json_encode(['success' => true]);
    else
        echo json_encode(['success' => false]);

    echo json_encode($result);
    mysqli_close($con);
