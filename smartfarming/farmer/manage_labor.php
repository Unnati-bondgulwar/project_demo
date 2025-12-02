<?php 
include 'header.php'; 
include '../db.php'; 

// Get the logged-in farmer's ID
$farmer_id = $_SESSION['farmer_id']; 

// Fetch all labor requests posted by this farmer
$sql = "SELECT * FROM labor_requests WHERE farmer_id = '$farmer_id' ORDER BY created_at DESC";
$result = mysqli_query($conn, $sql);
?>

<div class="container mt-4">
    <h2 class="mb-4">📋 Manage Labor Requests</h2>

    <div class="card shadow-lg">
        <div class="card-body">
            <table class="table table-bordered">
                <thead class="table-success">
                    <tr>
                        <th>#</th>
                        <th>Job Title</th>
                        <th>Workers Needed</th>
                        <th>Duration</th>
                        <th>Payment (₹)</th>
                        <th>Applications</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if (mysqli_num_rows($result) > 0) {
                        $count = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                                <td>{$count}</td>
                                <td>{$row['job_title']}</td>
                                <td>{$row['required_workers']}</td>
                                <td>{$row['duration']}</td>
                                <td>₹{$row['payment']}</td>
                                <td>
                                    <a href='view_applicants.php?job_id={$row['id']}' class='btn btn-info btn-sm'>👀 View Applications</a>
                                </td>
                                <td>
                                    <a href='edit_labor.php?id={$row['id']}' class='btn btn-primary btn-sm'>✏ Edit</a>
                                    <a href='delete_labor.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure?\")'>🗑 Delete</a>
                                </td>
                            </tr>";
                            $count++;
                        }
                    } else {
                        echo "<tr><td colspan='7' class='text-center'>No labor requests posted yet.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div> <!-- Closes .content from header.php -->
