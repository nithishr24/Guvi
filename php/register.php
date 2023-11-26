<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmpassword"];

   
    if ($password !== $confirmPassword) {
        echo "Passwords do not match.";
        exit();
    }



    $conn = new mysqli("localhost", "root", "", "register");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $checkEmailQuery = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $checkEmailQuery->bind_param("s", $email);
    $checkEmailQuery->execute();
    $checkEmailQuery->store_result();

    if ($checkEmailQuery->num_rows > 0) {
        echo "Email Already Exists";
        exit();
    }

    $checkEmailQuery->close();

    // Insert user into the database
    $insertQuery = $conn->prepare("INSERT INTO users (firstname, lastname, email, password) VALUES (?, ?, ?, ?)");
    $insertQuery->bind_param("ssss", $firstname, $lastname, $email, $password);

    if ($insertQuery->execute()) {
        echo "Registration Successful";
    } else {
        echo "Registration Failed: " . $insertQuery->error;
    }

    $insertQuery->close();
    $conn->close();
} else {
    echo "Invalid request method.";
}
?>
