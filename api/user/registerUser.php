<?php 

    require '../../assets/includes/config.php';

    header('Content-Type: application/json');

    $name = $_POST["name"];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $checkUser = "SELECT username, email FROM `customers` WHERE `username` = '$name' AND `email` = '$email'";
    $res = mysqli_query($con, $checkUser);
    $userList = mysqli_fetch_array($res);

    if(!$userList) {
        $query = "INSERT INTO `customers`(`username`, `email`, `password`) VALUES('$name', '$email', '$password')";
        $response = mysqli_query($con, $query);
        
        if($response){
            $result = [
                "success" => true,
                "message" => "Registration successful!"
            ];
        }

    } else {
        $result = [
            "success" => false,
            "message" => "Username or Email already exists!"
        ];
    }
    
    // Return the response as JSON
    echo json_encode($result);
    mysqli_close($con);