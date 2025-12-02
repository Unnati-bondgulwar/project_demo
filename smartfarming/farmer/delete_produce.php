<?php
session_start();
include '../db.php';

if (!isset($_SESSION['farmer_id']) || !isset($_GET['id'])) {
    echo "<script>alert('Unauthorized access!'); window.location.href='index.php';</script>";
    exit();
}

$produce_id = $_GET['id'];

$sql = "DELETE FROM produce_listings WHERE id='$produce_id' AND farmer_id='{$_SESSION['farmer_id']}'";
if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Produce deleted successfully!'); window.location.href='manage_produce.php';</script>";
} else {
    echo "<script>alert('Error deleting produce!'); window.history.back();</script>";
}
?>
