<?php
session_start();
include '../db.php';

// Check if laborer is logged in
if (!isset($_SESSION['labor_id'])) {
    header("Location: login.php");
    exit();
}

$labor_id = $_SESSION['labor_id'];

// Fetch applications for this laborer
$query = "SELECT ja.id, lr.job_title, lr.description, ja.application_date, ja.status, ja.job_id 
          FROM job_applications ja 
          JOIN labor_requests lr ON ja.job_id = lr.id 
          WHERE ja.labor_id = ? ORDER BY ja.application_date DESC";

$stmt = $conn->prepare($query);
$stmt->bind_param("i", $labor_id);
$stmt->execute();
$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Applications - Smart Farming App</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4;
        }
        .container {
            margin-top: 20px;
        }
        .card {
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            transition: transform 0.3s;
        }
        .card:hover {
            transform: scale(1.05);
        }
        .btn-edit {
            background-color: #ffc107;
            color: white;
            border-radius: 5px;
        }
        .btn-delete {
            background-color: #dc3545;
            color: white;
            border-radius: 5px;
        }
        .btn-edit:hover {
            background-color: #e0a800;
        }
        .btn-delete:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>

<?php include 'header.php'; ?>

<div class="content">
    <h2 class="text-center my-4">My Applications</h2>
    <div class="row">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='col-md-4 mb-4'>";
                echo "<div class='card p-3'>";
                echo "<h4>" . htmlspecialchars($row['job_title']) . "</h4>";
                echo "<p><strong>Description:</strong> " . htmlspecialchars($row['description']) . "</p>";
                echo "<p><strong>Applied On:</strong> " . htmlspecialchars($row['application_date']) . "</p>";
                echo "<p><strong>Status:</strong> " . htmlspecialchars($row['status']) . "</p>";
                echo "<a href='edit_application.php?application_id=" . $row['id'] . "' class='btn btn-edit w-100 mb-2'>Edit</a>";
                echo "<a href='delete_application.php?application_id=" . $row['id'] . "' class='btn btn-delete w-100' onclick='return confirm(\"Are you sure you want to delete this application?\");'>Delete</a>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "<p class='text-center'>You have not applied for any jobs yet.</p>";
        }
        ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
