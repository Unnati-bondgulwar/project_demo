<?php
session_start();
include '../db.php';

if (!isset($_SESSION['farmer_id']) || !isset($_GET['id']) || !isset($_GET['status'])) {
    echo "<script>alert('Invalid request!'); window.location.href='view_orders.php';</script>";
    exit();
}

$order_id = $_GET['id'];
$status = $_GET['status'];

if (!in_array($status, ['Completed', 'Cancelled'])) {
    echo "<script>alert('Invalid status!'); window.location.href='view_orders.php';</script>";
    exit();
}

// Update order status
$sql = "UPDATE orders SET order_status='$status' WHERE id='$order_id' AND farmer_id='{$_SESSION['farmer_id']}'";
if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Order status updated successfully!'); window.location.href='view_orders.php';</script>";
} else {
    echo "<script>alert('Error updating order!'); window.history.back();</script>";
}
?>
