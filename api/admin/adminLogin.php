<?php

    require '../../assets/includes/config.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT id, name, password FROM `admin` WHERE `name` = '$username' AND `password` = '$password'";
    $result = mysqli_query($con, $query);
    $verify = mysqli_fetch_assoc($result);
    if($verify){
        $_SESSION['admin_id'] = $verify['id'];
        $_SESSION['username'] = $verify['name'];
        echo json_encode([
            "status" => true, 
            "message" => "Welcome",
            "username" => $username,
        ]);
    } else {
        echo json_encode(["status" => false, "message" => 'Invalid Username Or Password']);
    }

    mysqli_close($con);