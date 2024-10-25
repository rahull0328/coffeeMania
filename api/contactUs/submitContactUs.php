<?php 

    require '../../assets/includes/config.php';

    header('Content-Type: application/json');

    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $query = "INSERT INTO `contactUs`(`name`, `email`, `subject`, `message`) VALUES('$name', '$email', '$subject', '$message')";
    $result  = mysqli_query($con, $query);

    if($result){
        $response = [
            "success" => true,
            "message" => "Message sent successfully!"
        ];
    } else {
        $response = [
            "success" => false,
            "message" => "Error sending message: ". mysqli_error($con)
        ];
    }

    echo json_encode($response);
    mysqli_close($con);