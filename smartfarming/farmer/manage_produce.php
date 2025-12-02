<?php

include 'header.php';
include '../db.php';

// Check if farmer is logged in
if (!isset($_SESSION['farmer_id'])) {
    echo "<script>alert('Please log in first!'); window.location.href='index.php';</script>";
    exit();
}

$farmer_id = $_SESSION['farmer_id'];

// Fetch produce listings
$sql = "SELECT * FROM produce_listings WHERE farmer_id = '$farmer_id' ORDER BY created_at DESC";
$result = mysqli_query($conn, $sql);
?>

<div class="container mt-4">
    <h2 class="mb-4">🛒 Manage Your Produce Listings</h2>

    <table class="table table-bordered table-striped">
        <thead class="table-success">
            <tr>
                <th>#</th>
                <th>Produce Name</th>
                <th>Description</th>
                <th>Quantity (kg)</th>
                <th>Price (₹/kg)</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (mysqli_num_rows($result) > 0): ?>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?= $row['id']; ?></td>
                        <td><?= htmlspecialchars($row['produce_name']); ?></td>
                        <td><?= htmlspecialchars($row['description']); ?></td>
                        <td><?= $row['quantity']; ?></td>
                        <td>₹<?= $row['price']; ?></td>
                        <td>
                            <a href="edit_produce.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">✏️ Edit</a>
                            <a href="delete_produce.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?');">🗑 Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="6" class="text-center">No produce listings found.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
</div> <!-- Closes .content from header.php -->
