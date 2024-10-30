<?php
    require '../../assets/includes/config.php';

    header('Content-Type: application/json');

    $username = $_POST['username'] ?? null;
    $password = $_POST['password'] ?? null;

    $stmt = $con->prepare("SELECT `id`, `username`, `password` FROM `customers` WHERE `username` = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        if (password_verify($password, $row['password'])) {
            session_start();
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            
            echo json_encode(["status" => true, "message" => "Login successful! Welcome, " . $username]);
        } else {
            echo json_encode(["status" => false, "message" => "Invalid username or password."]);
        }
    } else {
        echo json_encode(["status" => false, "message" => "Invalid username or password."]);
    }

    $stmt->close();
    $con->close();

?>