<?php 

    require '../../assets/includes/config.php';

    header('Content-Type: application/json');

    $id = $_GET['id'];

    $query = "DELETE FROM `customers` WHERE `user_id` = '$id'";
    $result = mysqli_query($con, $query);

    if($result) {
        session_unset();
        session_destroy();
        header('Location: ../../index.php');
    } else {
        header("Location: ../../pages/profile.php");
    }

    mysqli_close($con);