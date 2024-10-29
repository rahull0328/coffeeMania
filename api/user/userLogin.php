<?php 


    require '../../assets/includes/config.php';

    header('Content-Type: application/json');

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT `id`, `username`, `password` FROM `customers` WHERE `username` = '$username'";
    $result = mysqli_query($con, $query);
    $verify = mysqli_fetch_assoc($result);

    if ($verify && password_verify($password, $verify['password'])) {
        session_start();
        $_SESSION['user_id'] = $user_id;
        $_SESSION['username'] = $username;
        echo "Login successful! Welcome, " . $username;
    } else {
        echo "Invalid username or password.";
    }

    mysqli_close($con);