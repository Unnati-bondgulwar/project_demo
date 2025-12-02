<?php
session_start();
include '../db.php';

// Check if laborer is logged in
if (!isset($_SESSION['labor_id'])) {
    header("Location: labor_login.php");
    exit();
}

if (isset($_GET['job_id'])) {
    $job_id = $_GET['job_id'];
    $labor_id = $_SESSION['labor_id'];

    // Check if already applied
    $check_query = "SELECT * FROM job_applications WHERE job_id = ? AND labor_id = ?";
    $stmt = $conn->prepare($check_query);
    $stmt->bind_param("ii", $job_id, $labor_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('You have already applied for this job!'); window.location.href='viewjob.php';</script>";
        exit();
    }

    // Insert application
    $insert_query = "INSERT INTO job_applications (job_id, labor_id) VALUES (?, ?)";
    $stmt = $conn->prepare($insert_query);
    $stmt->bind_param("ii", $job_id, $labor_id);

    if ($stmt->execute()) {
        echo "<script>alert('Application submitted successfully!'); window.location.href='viewjob.php';</script>";
    } else {
        echo "<script>alert('Error applying for the job. Please try again.'); window.location.href='viewjob.php';</script>";
    }
} else {
    echo "<script>alert('Invalid job selection.'); window.location.href='viewjob.php';</script>";
}
?>
