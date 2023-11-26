<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $conn = new mysqli("localhost", "root", "", "register");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $query = "select * from users where email='$email' and password='$password'";
    $res = $conn->query($query);

        if (mysqli_num_rows($res)>0){
            echo "success";
        } else {
            echo "failed";
        }
    } else {
        echo "failed";
    }
    $conn->close();
?>
