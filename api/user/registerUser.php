<?php

require '../../assets/includes/config.php';

header('Content-Type: application/json');

    $name = $_POST["name"];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the username already exists in the database
    $sql = "SELECT * FROM users WHERE name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $name); // Binding the username parameter
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Username already exists
        $response = [
            "success" => false,
            "message" => "Username already exists, please choose a different one."
        ];
        echo json_encode($response);
        exit();
    }

    // If username is unique, insert the user data into the database
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT); // Hash the password
    $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $hashedPassword);

    if ($stmt->execute()) {
        // Successfully inserted the user
        $response = [
            "success" => true,
            "message" => "Registration successful!"
        ];
    } else {
        // Handle database insertion error
        $response = [
            "success" => false,
            "message" => "An error occurred while registering the user."
        ];
    }

    echo json_encode($response);

    // Return the response as JSON
    echo json_encode($response);
    mysqli_close($con);
