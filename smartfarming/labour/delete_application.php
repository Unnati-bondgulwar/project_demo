<?php
session_start();
include '../db.php';

if (!isset($_SESSION['labor_id'])) {
    header("Location: login.php");
    exit();
}

if (!isset($_GET['application_id'])) {
    echo "<script>alert('Invalid request!'); window.location.href='myapplication.php';</script>";
    exit();
}

$application_id = $_GET['application_id'];
$labor_id = $_SESSION['labor_id'];

$delete_query = "DELETE FROM job_applications WHERE id = ? AND labor_id = ?";
$stmt = $conn->prepare($delete_query);
$stmt->bind_param("ii", $application_id, $labor_id);

if ($stmt->execute()) {
    echo "<script>alert('Application deleted successfully!'); window.location.href='myapplication.php';</script>";
} else {
    echo "<script>alert('Error deleting application!');</script>";
}
?>
