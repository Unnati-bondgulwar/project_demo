<?php
session_start();
include '../db.php';

// Check if user is logged in
if (!isset($_SESSION['farmer_id'])) {
    echo "<script>alert('Please log in to post a request!'); window.location.href='index.php';</script>";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $farmer_id = $_SESSION['farmer_id'];
    $job_title = mysqli_real_escape_string($conn, $_POST['job_title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $required_workers = intval($_POST['required_workers']);
    $duration = mysqli_real_escape_string($conn, $_POST['duration']);
    $payment = floatval($_POST['payment']);
    
    // Validate input
    if (empty($job_title) || empty($description) || $required_workers <= 0 || empty($duration) || $payment <= 0) {
        echo "<script>alert('All fields are required!'); window.history.back();</script>";
        exit();
    }

    // Insert into database
    $sql = "INSERT INTO labor_requests (farmer_id, job_title, description, required_workers, duration, payment, created_at)
            VALUES ('$farmer_id', '$job_title', '$description', '$required_workers', '$duration', '$payment', NOW())";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Labor request posted successfully!'); window.location.href='dashboard.php';</script>";
    } else {
        echo "<script>alert('Error posting request. Try again!'); window.history.back();</script>";
    }
}
?>
