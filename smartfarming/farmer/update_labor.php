<?php
session_start();
include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $job_title = $_POST['job_title'];
    $description = $_POST['description'];
    $required_workers = $_POST['required_workers'];
    $duration = $_POST['duration'];
    $payment = $_POST['payment'];

    $sql = "UPDATE labor_requests SET job_title='$job_title', description='$description', required_workers='$required_workers', duration='$duration', payment='$payment' WHERE id='$id' AND farmer_id='{$_SESSION['farmer_id']}'";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Labor request updated successfully!'); window.location.href='manage_labor.php';</script>";
    } else {
        echo "<script>alert('Error updating request. Try again!'); window.history.back();</script>";
    }
}
?>
