<?php
require '../../assets/includes/config.php';

$username = $_POST['username'];
$password = $_POST['password'];

// Secure query with prepared statements
$stmt = $con->prepare("SELECT id, name, password FROM `admin` WHERE `name` = ? AND `password` = ?");
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$result = $stmt->get_result();
$verify = $result->fetch_assoc();

if ($verify) {
    $_SESSION['admin_id'] = $verify['id'];
    $_SESSION['username'] = $verify['name'];
    echo json_encode([
        "status" => true,
        "message" => "Welcome",
        "username" => $username,
    ]);
} else {
    echo json_encode(["status" => false, "message" => "Invalid Username Or Password"]);
}

$stmt->close();
$con->close();
