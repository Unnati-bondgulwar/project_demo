<?php
session_start();
include '../db.php';

// Check if user is logged in
if (!isset($_SESSION['farmer_id'])) {
    echo "<script>alert('Please log in to sell produce!'); window.location.href='index.php';</script>";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $farmer_id = $_SESSION['farmer_id'];
    $produce_name = mysqli_real_escape_string($conn, $_POST['produce_name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $quantity = intval($_POST['quantity']);
    $price = floatval($_POST['price']);

    // Validate input
    if (empty($produce_name) || empty($description) || $quantity <= 0 || $price <= 0) {
        echo "<script>alert('All fields are required!'); window.history.back();</script>";
        exit();
    }

    // Insert into database
    $sql = "INSERT INTO produce_listings (farmer_id, produce_name, description, quantity, price, created_at)
            VALUES ('$farmer_id', '$produce_name', '$description', '$quantity', '$price', NOW())";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Produce listed successfully!'); window.location.href='dashboard.php';</script>";
    } else {
        echo "<script>alert('Error listing produce. Try again!'); window.history.back();</script>";
    }
}
?>
