<?php 

    require '../../assets/includes/config.php';

    header('Content-Type: application/json');

    $email = $_POST['email'];
    $userId = $_SESSION['user_id'];

    $query = "UPDATE FROM `customers` SET  `email` = '$email' WHERE `user_id` = '$userId'";
    $response = mysqli_query($con, $query);

    $response = [
        "success" => true,
        "message" => "Registration successful!"
    ];
    
    // Return the response as JSON
    echo json_encode($response);
    mysqli_close($con);