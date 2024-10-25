<?php

    require '../../assets/includes/config.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT id, name, password FROM `admin` WHERE `name` = '$username' AND `password` = '$password'";
    $result = mysqli_query($con, $query);
    $verify = mysqli_fetch_assoc($result);
    if($verify){
        session_start();
        $_SESSION['admin_id'] = $verify['id'];
        $_SESSION['username'] = $verify['name'];
        echo json_encode(["success" => true, "message" => "Verified"]);
        header('Location: ../../admin/index.php');
    } else {
        echo json_encode(["error" => false, "message" => 'Not received any data']);
        header('Location: ../../admin/pages/login.php');
    }