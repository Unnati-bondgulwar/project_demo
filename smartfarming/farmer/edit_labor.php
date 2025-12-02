<?php 
include 'header.php'; 
include '../db.php'; 

$id = $_GET['id'];
$sql = "SELECT * FROM labor_requests WHERE id = '$id' AND farmer_id = '{$_SESSION['farmer_id']}'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<div class="container mt-4">
    <h2 class="mb-4">✏ Edit Labor Request</h2>

    <div class="card shadow-lg">
        <div class="card-body">
            <form action="update_labor.php" method="POST">
                <input type="hidden" name="id" value="<?= $row['id'] ?>">

                <div class="mb-3">
                    <label class="form-label">Job Title</label>
                    <input type="text" name="job_title" class="form-control" value="<?= $row['job_title'] ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" required><?= $row['description'] ?></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Workers Needed</label>
                    <input type="number" name="required_workers" class="form-control" value="<?= $row['required_workers'] ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Duration (in days)</label>
                    <input type="text" name="duration" class="form-control" value="<?= $row['duration'] ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Payment (₹)</label>
                    <input type="number" name="payment" class="form-control" value="<?= $row['payment'] ?>" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">Update Labor Request</button>
            </form>
        </div>
    </div>
</div>

</div> <!-- Closes .content from header.php -->
