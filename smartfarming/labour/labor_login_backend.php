<?php
include '../db.php'; // Database connection
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM laborers WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while($row = $result->fetch_assoc()) {
            $_SESSION['labor_id'] =  $row["id"];
        }
        $_SESSION['labor_email'] = $email;
        
        header("Location: labor_dashboard.php");
        exit();
    } else {
        echo "Invalid Email or Password!";
    }
}
?>
