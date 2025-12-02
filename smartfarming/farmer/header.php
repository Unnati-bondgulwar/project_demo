<?php
session_start();
if (!isset($_SESSION['farmer_id'])) {
    header("Location: farmer_login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Farming - Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4;
            display: flex;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            background: #218838;
            padding: 20px;
            position: fixed;
            top: 0;
            left: 0;
            color: white;
        }
        .sidebar h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .sidebar a {
            color: white;
            display: block;
            padding: 10px;
            text-decoration: none;
            border-radius: 5px;
            transition: 0.3s;
        }
        .sidebar a:hover {
            background: #28a745;
        }
        .content {
            margin-left: 260px;
            padding: 20px;
            width: 100%;
        }
        .logout {
            position: absolute;
            bottom: 20px;
            width: 100%;
        }
        .logout a {
            background: #dc3545;
            text-align: center;
        }
        .menu-toggle {
            display: none;
        }
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }
            .content {
                margin-left: 0;
            }
            .menu-toggle {
                display: block;
                background: #218838;
                color: white;
                padding: 10px;
                text-align: center;
                cursor: pointer;
            }
            .sidebar a {
                text-align: center;
            }
        }
    </style>
</head>
<body>

<!-- Sidebar Navigation -->
<div class="sidebar">
    <h2>Smart Farming</h2>
    <a href="dashboard.php">🏠 Dashboard</a>
    <a href="post_labor.php">👷 Post Labor Request</a>
    <a href="manage_labor.php">👷 Manage Labor Request</a>
    <a href="sell_produce.php">🌾 Sell Produce</a>
    <a href="manage_produce.php">🌾 Manage Produce</a>
    
    <div class="logout">
        <a href="logout.php">🚪 Logout</a>
    </div>
</div>

<!-- Content Wrapper -->
<div class="content">
    <div class="menu-toggle">☰ Menu</div>
