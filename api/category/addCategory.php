<?php 

    require '../../assets/includes/config.php';

    $catName = $_POST['cat_name'];
    $query = "INSERT INTO categories(`cat_name`) VALUES('$catName')";
    mysqli_query($con, $query);

    mysqli_close($con);