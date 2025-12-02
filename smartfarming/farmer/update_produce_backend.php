<?php
session_start();
include '../db.php';

if (!isset($_SESSION['farmer_id']) || $_SERVER["REQUEST_METHOD"] != "POST") {
    echo "<script>alert('Unauthorized access!'); window.location.href='index.php';</script>";
    exit();
}

$produce_id = $_POST['produce_id'];
$produce_name = mysqli_real_escape_string($conn, $_POST['produce_name']);
$description = mysqli_real_escape_string($conn, $_POST['description']);
$quantity = intval($_POST['quantity']);
$price = floatval($_POST['price']);

$sql = "UPDATE produce_listings SET 
        produce_name = '$produce_name', 
        description = '$description', 
        quantity = '$quantity', 
        price = '$price'
        WHERE id='$produce_id' AND farmer_id='{$_SESSION['farmer_id']}'";

if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Produce updated successfully!'); window.location.href='manage_produce.php';</script>";
} else {
    echo "<script>alert('Error updating produce!'); window.history.back();</script>";
}
?>
