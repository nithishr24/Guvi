<?php
require '../vendor/autoload.php';

use MongoDB\Client;

$uri = "mongodb://localhost:27017/";
$databaseName = "profile";
$collectionName = "users";

$client = new Client($uri);
$database = $client->$databaseName;
$collection = $database->$collectionName;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = "nithishr2020csbs@gmail.com";
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $age = $_POST["age"];
    $dob = $_POST["dob"];
    $phoneNumber = $_POST["phoneNumber"];
    $currentPassword = $_POST["currentPassword"];
    $newPassword = $_POST["newPassword"];
    $confirmNewPassword = $_POST["confirmNewPassword"];

    if ($newPassword === $currentPassword) {
        echo 'New Password should not be the same as the Current Password';
    } else if ($newPassword !== $confirmNewPassword) {
        echo 'Passwords do not match';
    } else {
        $updateResult = $collection->updateOne(
            ["email" => $email],
            [
                '$set' => [
                    "firstName" => $firstName,
                    "lastName" => $lastName,
                    "age" => $age,
                    "dob" => $dob,
                    "phoneNumber" => $phoneNumber,
                    "password" => $newPassword,
                ]
            ]
        );

        if ($updateResult->getModifiedCount() > 0) {
            echo "Profile updated successfully";
        } else {
            echo "Failed to update profile";
        }
    }
}
?>
