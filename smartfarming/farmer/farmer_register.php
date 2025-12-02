<?php
require '../db.php'; // Database connection file (one folder back)

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']); // No encryption
    $phone = trim($_POST['phone']);

    // Check if email already exists
    $check_email = $conn->prepare("SELECT * FROM farmers WHERE email = ?");
    $check_email->bind_param("s", $email);
    $check_email->execute();
    $result = $check_email->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('Error: Email already registered!'); window.location.href='farmer_register.html';</script>";
    } else {
        // Insert user data into the database
        $stmt = $conn->prepare("INSERT INTO farmers (name, email, password, phone) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $password, $phone);

        if ($stmt->execute()) {
            echo "<script>alert('Registration successful! Please login.'); window.location.href='index.php';</script>";
        } else {
            echo "<script>alert('Error: Registration failed.'); window.location.href='farmer_register.html';</script>";
        }

        $stmt->close();
    }

    $conn->close();
}
?>
