<?php 

    include '../../assets/includes/config.php';

    header('Content-Type: application/json');

    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $image = $_FILES['file'];

    $time = time();
    $fileName = "$time-" . $_FILES['file']['name'];
    $tmpFileName = $_FILES['file']['tmp_name'];

    $fileUploaded = move_uploaded_file($tmpFileName, pathOf("admin/assets/uploads/$fileName"));

    if (!$fileUploaded) {
        echo json_encode(["status" => false, "message" => "Error uploading file."]);
        exit();
    }

    $query = "INSERT INTO `products`(`name`, `price`, `description`, `cat_id`, `image`) VALUES('$name', '$price', '$description', '$category', '$fileName')";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo json_encode(["status" => true, "message" => "Product added successfully!"]);
    } else {
        echo json_encode(["status" => false, "message" => "Error inserting product: " . mysqli_error($con)]);
    }
    
        
    mysqli_close($con);