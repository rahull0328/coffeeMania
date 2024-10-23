<?php 

    require '../../assets/includes/config.php';

    header('Content-Type: application/json');

    $id = $_REQUEST['id'];

    $query = "DELETE FROM `categories` WHERE `id` = $id";
    mysqli_query($con, $query);

    header("Location: ../../admin/pages/categories.php");

    mysqli_close($con);