<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Jobs - Smart Farming App</title>
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
        .btn-apply {
            background-color: #28a745;
            color: white;
            border-radius: 5px;
        }
        .btn-apply:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    
    <?php include 'header.php'; ?>
    
    <div class="content">
        <h2 class="text-center my-4">Available Jobs</h2>
        <div class="row">
            <?php
            include '../db.php';
            $query = "SELECT * FROM labor_requests ORDER BY created_at DESC";
            $result = mysqli_query($conn, $query);
            
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='col-md-4 mb-4'>";
                    echo "<div class='card p-3'>";
                    echo "<h4>" . htmlspecialchars($row['job_title']) . "</h4>";
                    echo "<p><strong>Description:</strong> " . htmlspecialchars($row['description']) . "</p>";
                    echo "<p><strong>Workers Needed:</strong> " . htmlspecialchars($row['required_workers']) . "</p>";
                    echo "<p><strong>Duration:</strong> " . htmlspecialchars($row['duration']) . " days</p>";
                    echo "<p><strong>Payment:</strong> $" . htmlspecialchars($row['payment']) . "</p>";
                    echo "<a href='apply_job.php?job_id=" . $row['id'] . "' class='btn btn-apply w-100'>Apply Now</a>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "<p class='text-center'>No jobs available at the moment.</p>";
            }
            ?>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
