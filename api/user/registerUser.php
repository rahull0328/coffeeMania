<?php 

    require '../../assets/includes/config.php';

    header('Content-Type: application/json');

    $name = $_POST["name"];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = "INSERT INTO `customers`(`username`, `email`, `password`) VALUES('$name', '$email', '$password')";
    $response = mysqli_query($con, $query);

    $response = [
        "success" => true,
        "message" => "Registration successful!"
    ];
    
    // Return the response as JSON
    echo json_encode($response);
    mysqli_close($con);