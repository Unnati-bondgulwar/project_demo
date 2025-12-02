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

// Fetch application details
$query = "SELECT * FROM job_applications WHERE id = ? AND labor_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("ii", $application_id, $labor_id);
$stmt->execute();
$result = $stmt->get_result();
$app = $result->fetch_assoc();

if (!$app) {
    echo "<script>alert('Application not found!'); window.location.href='myapplication.php';</script>";
    exit();
}

// Handle update request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_status = $_POST['status'];

    $update_query = "UPDATE job_applications SET status = ? WHERE id = ?";
    $stmt = $conn->prepare($update_query);
    $stmt->bind_param("si", $new_status, $application_id);

    if ($stmt->execute()) {
        echo "<script>alert('Application updated successfully!'); window.location.href='myapplication.php';</script>";
    } else {
        echo "<script>alert('Error updating application!');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Application - Smart Farming App</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

<?php include 'header.php'; ?>

<div class="content mt-5">
    <h2>Edit Application</h2>
    <form method="POST">
        <div class="mb-3">
            <label>Status:</label>
            <select name="status" class="form-control" required>
                <option value="Pending" <?= $app['status'] == 'Pending' ? 'selected' : ''; ?>>Pending</option>
                <option value="Accepted" <?= $app['status'] == 'Accepted' ? 'selected' : ''; ?>>Accepted</option>
                <option value="Rejected" <?= $app['status'] == 'Rejected' ? 'selected' : ''; ?>>Rejected</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="myapplication.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>

</body>
</html>
