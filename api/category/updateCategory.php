<?php



require '../../assets/includes/config.php';

header('Content-Type: application/json');

$catName = $_POST['updateCategoryName'];

$id = $_POST['updateId'];

$query = "UPDATE `categories` SET `cat_name` = '$catName' WHERE `id`= $id";
$result = mysqli_query($con, $query);

$result = [
    "success" => true,
    "message" => "Updating Category successful!"
];

// Return the response as JSON
echo json_encode($result);

header("Location: ../../admin/pages/categories.php");

mysqli_close($con);