<?php 

    require '../../assets/includes/config.php';

    $name = $_POST["name"];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = "INSERT INTO `customers`(`username`, `email`, `password`) VALUES('$name', '$email', '$password')";
    $result = mysqli_query($con, $query);
    header("Location: ../../pages/login.php");
    
    if($result){
        $response = [
            "success" => true,
            "message" => "Registration successful!"
        ];
    }

    mysqli_close($con);