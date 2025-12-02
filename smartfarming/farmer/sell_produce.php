<?php 
include 'header.php'; 
?>

<div class="container mt-4">
    <h2 class="mb-4">🌾 Sell Your Produce</h2>

    <div class="card shadow-lg">
        <div class="card-body">
            <form action="sell_produce_backend.php" method="POST">
                
                <div class="mb-3">
                    <label class="form-label">Produce Name</label>
                    <input type="text" name="produce_name" class="form-control" placeholder="Enter produce name" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" placeholder="Describe the produce" rows="3" required></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Quantity (kg)</label>
                    <input type="number" name="quantity" class="form-control" placeholder="Enter quantity in kg" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Price per kg (₹)</label>
                    <input type="number" name="price" class="form-control" placeholder="Enter price per kg" required>
                </div>

                <button type="submit" class="btn btn-success w-100">🛒 List Produce for Sale</button>
            </form>
        </div>
    </div>
</div>

</div> <!-- Closes .content from header.php -->
