<?php

include 'header.php';
include '../db.php';

if (!isset($_SESSION['farmer_id'])) {
    echo "<script>alert('Please log in first!'); window.location.href='index.php';</script>";
    exit();
}

if (!isset($_GET['id'])) {
    echo "<script>alert('Invalid request!'); window.location.href='manage_produce.php';</script>";
    exit();
}

$farmer_id = $_SESSION['farmer_id'];
$produce_id = $_GET['id'];

// Fetch current produce details
$sql = "SELECT * FROM produce_listings WHERE id='$produce_id' AND farmer_id='$farmer_id'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) == 0) {
    echo "<script>alert('Produce not found!'); window.location.href='manage_produce.php';</script>";
    exit();
}
$row = mysqli_fetch_assoc($result);
?>

<div class="container mt-4">
    <h2 class="mb-4">✏️ Edit Produce Details</h2>

    <div class="card shadow-lg">
        <div class="card-body">
            <form action="update_produce_backend.php" method="POST">
                <input type="hidden" name="produce_id" value="<?= $produce_id; ?>">

                <div class="mb-3">
                    <label class="form-label">Produce Name</label>
                    <input type="text" name="produce_name" class="form-control" value="<?= htmlspecialchars($row['produce_name']); ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" required><?= htmlspecialchars($row['description']); ?></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Quantity (kg)</label>
                    <input type="number" name="quantity" class="form-control" value="<?= $row['quantity']; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Price per kg (₹)</label>
                    <input type="number" name="price" class="form-control" value="<?= $row['price']; ?>" required>
                </div>

                <button type="submit" class="btn btn-success w-100">✅ Update Produce</button>
            </form>
        </div>
    </div>
</div>
</div> <!-- Closes .content from header.php -->
