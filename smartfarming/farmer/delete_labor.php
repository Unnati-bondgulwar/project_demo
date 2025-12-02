<?php
session_start();
include '../db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM labor_requests WHERE id = '$id' AND farmer_id = '{$_SESSION['farmer_id']}'";
    
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Labor request deleted successfully!'); window.location.href='manage_labor.php';</script>";
    } else {
        echo "<script>alert('Error deleting request.'); window.history.back();</script>";
    }
}
?>
