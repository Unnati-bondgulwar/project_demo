<?php

include 'header.php';
include '../db.php';

if (!isset($_SESSION['farmer_id'])) {
    echo "<script>alert('Please log in first!'); window.location.href='index.php';</script>";
    exit();
}

$farmer_id = $_SESSION['farmer_id'];

// Fetch orders for this farmer
$sql = "SELECT o.id, u.name AS buyer_name, p.produce_name, o.quantity, o.total_price, o.order_status, o.order_date 
        FROM orders o 
        JOIN users u ON o.user_id = u.id
        JOIN produce_listings p ON o.produce_id = p.id
        WHERE o.farmer_id = '$farmer_id'
        ORDER BY o.order_date DESC";

$result = mysqli_query($conn, $sql);
?>

<div class="container mt-4">
    <h2 class="mb-4">📦 Your Orders</h2>

    <table class="table table-bordered table-striped">
        <thead class="table-success">
            <tr>
                <th>#</th>
                <th>Buyer</th>
                <th>Produce</th>
                <th>Quantity (kg)</th>
                <th>Total Price (₹)</th>
                <th>Status</th>
                <th>Order Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (mysqli_num_rows($result) > 0): ?>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?= $row['id']; ?></td>
                        <td><?= htmlspecialchars($row['buyer_name']); ?></td>
                        <td><?= htmlspecialchars($row['produce_name']); ?></td>
                        <td><?= $row['quantity']; ?></td>
                        <td>₹<?= $row['total_price']; ?></td>
                        <td><?= $row['order_status']; ?></td>
                        <td><?= $row['order_date']; ?></td>
                        <td>
                            <a href="update_order_status.php?id=<?= $row['id']; ?>&status=Completed" class="btn btn-success btn-sm">✅ Mark Completed</a>
                            <a href="update_order_status.php?id=<?= $row['id']; ?>&status=Cancelled" class="btn btn-danger btn-sm">❌ Cancel</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="8" class="text-center">No orders yet.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
</div> <!-- Closes .content from header.php -->
