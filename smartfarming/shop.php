<?php

include 'db.php';

$query = "SELECT p.id, p.produce_name, p.description, p.quantity, p.price, p.created_at, f.name AS farmer_name, f.email, f.phone 
          FROM produce_listings p
          JOIN farmers f ON p.farmer_id = f.id
          ORDER BY p.created_at DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop - Smart Farming App</title>
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
        .navbar {
            background: linear-gradient(45deg, #28a745, #218838);
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Smart Farming</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                   <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                </ul>
            </div>
        </div>
    </nav>

<div class="container">
    <h2 class="text-center my-4">Available Produce</h2>
    <div class="row">
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='col-md-4 mb-4'>";
                echo "<div class='card p-3'>";
                echo "<h4>" . htmlspecialchars($row['produce_name']) . "</h4>";
                echo "<p><strong>Description:</strong> " . htmlspecialchars($row['description']) . "</p>";
                echo "<p><strong>Quantity:</strong> " . htmlspecialchars($row['quantity']) . "</p>";
                echo "<p><strong>Price:</strong> $" . htmlspecialchars($row['price']) . "</p>";
                echo "<h5>Farmer Details</h5>";
                echo "<p><strong>Name:</strong> " . htmlspecialchars($row['farmer_name']) . "</p>";
                echo "<p><strong>Email:</strong> " . htmlspecialchars($row['email']) . "</p>";
                echo "<p><strong>Phone:</strong> " . htmlspecialchars($row['phone']) . "</p>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "<p class='text-center'>No produce available at the moment.</p>";
        }
        ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
