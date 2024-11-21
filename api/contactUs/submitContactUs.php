<?php

require '../../assets/includes/config.php';

header('Content-Type: application/json');

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// Check if email already exists
$emailCheckQuery = "SELECT * FROM `contactus` WHERE `email` = '$email'";
$emailCheckResult = mysqli_query($con, $emailCheckQuery);

if (mysqli_num_rows($emailCheckResult) > 0) {
    // If email exists, return a message
    $response = [
        "success" => false,
        "message" => "Email already exists in our records. Please use a different email."
    ];
} else {
    // If email does not exist, insert the new message
    $query = "INSERT INTO `contactus`(`name`, `email`, `subject`, `message`) VALUES('$name', '$email', '$subject', '$message')";
    $result = mysqli_query($con, $query);

    if ($result) {
        $response = [
            "success" => true,
            "message" => "Message sent successfully!"
        ];
    } else {
        $response = [
            "success" => false,
            "message" => "Error sending message: " . mysqli_error($con)
        ];
    }
}

echo json_encode($response);
mysqli_close($con);
?>
