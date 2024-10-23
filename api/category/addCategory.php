<?php 

    require '../../assets/includes/config.php';

    header('Content-Type: application/json');

    $catName = $_POST['categoryName'];

    $query = "INSERT INTO `categories`(`cat_name`) VALUES('$catName')";
    $result = mysqli_query($con, $query);

    $response = [
        "success" => true,
        "message" => "Registration successful!"
    ];
    
    // Return the response as JSON
    echo json_encode($response);

    mysqli_close($con);