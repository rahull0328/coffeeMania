<?php 

    require '../../assets/includes/config.php';

    header('Content-Type: application/json');

    $quantity = $_POST['quantity'];
    $productId = $_POST['productId'];

    $query = "INSERT INTO `cart`(`qty`, `prod_id`) VALUES('$quantity', '$productId')";
    $result = mysqli_query($con, $query);

    if($result) {
        echo json_encode(["success" => true, "message" => "Product Added To Cart successfully"]);
    } else {
        echo json_encode(["success" => false, "message" => "Failed Adding Product To Cart"]);
    }

    mysqli_close($con);