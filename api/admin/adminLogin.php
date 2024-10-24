<?php

require '../../assets/includes/config.php';

header('Content-Type: application/json');

print_r($_GET);

if (isset($_GET['username']) && isset($_GET['password'])) {

    $username = $_GET['username'];
    $password = $_GET['password'];

    $query = "SELECT id, name, password FROM `admin` WHERE `name` = '$username' AND `password` = '$password'";
    $data = mysqli_query($con, $query);
    $verify = mysqli_fetch_assoc($data);

    if ($verify) {
        $_SESSION['admin_id'] = $verify['id'];
        $_SESSION['username'] = $verify['name'];
        echo json_encode(["success" => true]);
        exit();
    } else {
        echo json_encode(["error" => false, "message" => "Invalid credentials"]);
    }
} else {
    echo json_encode(["error" => false, "message" => "Username or password missing"]);
}

mysqli_close($con);
