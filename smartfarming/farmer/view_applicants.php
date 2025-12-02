<?php include 'header.php'; ?>

<?php

include '../db.php';

if (!isset($_SESSION['farmer_id'])) {
    header("Location: index.php");
    exit();
}

if (!isset($_GET['job_id'])) {
    echo "Invalid request.";
    exit();
}

$job_id = $_GET['job_id'];

// Fetch all laborers who applied for this job
$query = "SELECT applications.id, laborers.name, laborers.email, laborers.phone, applications.status
          FROM job_applications AS applications
          JOIN laborers ON applications.labor_id = laborers.id
          WHERE applications.job_id = '$job_id'";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Applications</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>



<div class="container mt-4">
    <h2 class="mb-4">👷‍♂️ Job Applications</h2>
    
    <div class="card shadow-lg">
        <div class="card-body">
            <table class="table table-bordered">
                <thead class="table-primary">
                    <tr>
                        <th>#</th>
                        <th>Laborer Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Application Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if (mysqli_num_rows($result) > 0) {
                        $count = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                                <td>{$count}</td>
                                <td>{$row['name']}</td>
                                <td>{$row['email']}</td>
                                <td>{$row['phone']}</td>
                                <td>{$row['status']}</td>
                            </tr>";
                            $count++;
                        }
                    } else {
                        echo "<tr><td colspan='5' class='text-center'>No applications yet.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <a href="manage_labor.php" class="btn btn-success mt-3">⬅ Back to Job Listings</a>
</div>

</body>
</html>
