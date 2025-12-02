<?php
session_start();
require '../db.php'; // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']); // No encryption

    // Verify credentials
    $stmt = $conn->prepare("SELECT * FROM farmers WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows == 1) {
        $farmer = $result->fetch_assoc();
        $_SESSION['farmer_id'] = $farmer['id'];
        $_SESSION['farmer_name'] = $farmer['name'];

        echo "<script>alert('Login successful! Redirecting...'); window.location.href='dashboard.php';</script>";
    } else {
        echo "<script>alert('Invalid email or password!'); window.location.href='farmer_login.html';</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
