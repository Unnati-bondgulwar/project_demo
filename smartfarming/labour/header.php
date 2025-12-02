<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Labor Dashboard - Smart Farming App</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4;
        }
        .dashboard-container {
            display: flex;
        }
        .sidebar {
            width: 250px;
            background: #28a745;
            color: white;
            height: 100vh;
            padding: 20px;
            position: fixed;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            transition: background 0.3s;
        }
        .sidebar a:hover, .sidebar a.active {
            background: #218838;
        }
        .content {
            margin-left: 260px;
            padding: 20px;
            width: 100%;
        }
        .card {
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            transition: transform 0.3s;
        }
        .card:hover {
            transform: scale(1.05);
        }
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
                display: flex;
                justify-content: space-around;
            }
            .content {
                margin-left: 0;
                padding-top: 20px;
            }
        }
    </style>
</head>
<body>
   
    
    <div class="dashboard-container">

<div class="sidebar">
            <h3>Labor Dashboard</h3>
            <a href="labor_dashboard.php" class="active">Dashboard</a>
            <a href="viewjob.php" class="active">Available Jobs</a>
            <a href="myapplication.php"  class="active">My Applications</a>
            <a href="profile.php"  class="active">Profile</a>
            <a href="logout.php">Logout</a>
        </div>