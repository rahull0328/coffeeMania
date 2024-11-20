<?php
require '../../assets/includes/config.php';

header('Content-Type: application/json');

$data = file_get_contents("php://input");
error_log("Raw POST Data: " . $data);
$orderData = json_decode($data, true);

if (isset($orderData['orderData']) && is_array($orderData['orderData']) && count($orderData['orderData']) > 0) {
    
    $orderData = $orderData['orderData']; 

    $userId = $orderData['userId'];
    $productId = $orderData['productId'];
    $cartId = $orderData['cartId'];
    $price = $orderData['price'];
    $quantity = $orderData['quantity'];

    $totalAmount = $quantity * $price;

    $orderQuery = "INSERT INTO `orders` (`user_id`, `total_amount`) VALUES ('$userId', '$totalAmount')";
    if (mysqli_query($con, $orderQuery)) {
        $orderId = mysqli_insert_id($con);

        $orderItemQuery = "INSERT INTO `order_items` (`order_id`, `product_id`, `quantity`, `price`) VALUES ('$orderId', '$productId', '$quantity', '$price')";
        mysqli_query($con, $orderItemQuery);

        $deleteCartQuery = "DELETE FROM `cart` WHERE `cart_id` = '$cartId' AND `user_id` = '$userId'";
        mysqli_query($con, $deleteCartQuery);

        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['error' => 'Failed to place order']);
    }
} else {
    echo json_encode(['error' => 'Invalid or empty order data']);
}

mysqli_close($con);
?>
