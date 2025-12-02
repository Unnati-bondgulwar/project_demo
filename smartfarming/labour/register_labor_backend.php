<?php
include '../db.php'; // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"]; // No encryption as per request
    $phone = $_POST["phone"];
    $skills = $_POST["skills"];
    $location = $_POST["location"];

    // Insert into laborers table
    $sql = "INSERT INTO laborers (name, email, password, phone, skills, location) 
            VALUES ('$name', '$email', '$password', '$phone', '$skills', '$location')";

    if (mysqli_query($conn, $sql)) {
        header("Location: labor_login.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
