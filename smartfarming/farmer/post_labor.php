<?php 
include 'header.php'; 
?>

<div class="container mt-4">
    <h2 class="mb-4">🚜 Post a Labor Request</h2>

    <div class="card shadow-lg">
        <div class="card-body">
            <form action="post_labor_backend.php" method="POST">
                
                <div class="mb-3">
                    <label class="form-label">Job Title</label>
                    <input type="text" name="job_title" class="form-control" placeholder="Enter job title" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Job Description</label>
                    <textarea name="description" class="form-control" placeholder="Describe the job in detail" rows="3" required></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Number of Workers Needed</label>
                    <input type="number" name="required_workers" class="form-control" placeholder="Enter number of workers" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Duration (in days)</label>
                    <input type="text" name="duration" class="form-control" placeholder="Enter duration (e.g., 7 days)" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Payment Offered (₹)</label>
                    <input type="number" name="payment" class="form-control" placeholder="Enter payment amount" required>
                </div>

                <button type="submit" class="btn btn-success w-100">📢 Post Labor Request</button>
            </form>
        </div>
    </div>
</div>

</div> <!-- Closes .content from header.php -->
