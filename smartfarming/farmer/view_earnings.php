<?php

include 'header.php';
include '../db.php';

if (!isset($_SESSION['farmer_id'])) {
    echo "<script>alert('Please log in first!'); window.location.href='index.php';</script>";
    exit();
}

$farmer_id = $_SESSION['farmer_id'];

// Fetch completed orders & earnings
$sql = "SELECT SUM(total_price) AS total_earnings, COUNT(id) AS completed_orders 
        FROM orders 
        WHERE farmer_id = '$farmer_id' AND order_status = 'Completed'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$total_earnings = $row['total_earnings'] ?? 0;
$completed_orders = $row['completed_orders'] ?? 0;
?>

<div class="container mt-4">
    <h2 class="mb-4">💰 Earnings Summary</h2>

    <div class="row">
        <div class="col-md-6">
            <div class="card shadow-lg p-3">
                <h4 class="text-success">Total Earnings</h4>
                <p class="fs-3 fw-bold">₹<?= number_format($total_earnings, 2); ?></p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow-lg p-3">
                <h4 class="text-primary">Completed Orders</h4>
                <p class="fs-3 fw-bold"><?= $completed_orders; ?></p>
            </div>
        </div>
    </div>

    <h3 class="mt-4">📜 Completed Orders</h3>

    <table class="table table-bordered table-striped mt-3">
        <thead class="table-success">
            <tr>
                <th>#</th>
                <th>Buyer</th>
                <th>Produce</th>
                <th>Quantity (kg)</th>
                <th>Total Price (₹)</th>
                <th>Order Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT o.id, u.name AS buyer_name, p.produce_name, o.quantity, o.total_price, o.order_date 
                    FROM orders o 
                    JOIN users u ON o.user_id = u.id
                    JOIN produce_listings p ON o.produce_id = p.id
                    WHERE o.farmer_id = '$farmer_id' AND o.order_status = 'Completed'
                    ORDER BY o.order_date DESC";

            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0):
                while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?= $row['id']; ?></td>
                        <td><?= htmlspecialchars($row['buyer_name']); ?></td>
                        <td><?= htmlspecialchars($row['produce_name']); ?></td>
                        <td><?= $row['quantity']; ?></td>
                        <td>₹<?= $row['total_price']; ?></td>
                        <td><?= $row['order_date']; ?></td>
                    </tr>
                <?php endwhile; 
            else: ?>
                <tr><td colspan="6" class="text-center">No completed orders yet.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
</div> <!-- Closes .content from header.php -->
