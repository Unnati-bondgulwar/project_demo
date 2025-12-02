<?php 
include 'header.php'; 
?>

<div class="container mt-4">
    <h2 class="mb-4">👨‍🌾 Farmer Dashboard</h2>

    <div class="row">
        <!-- Post Labor Requests -->
        <div class="col-md-4">
            <div class="card shadow-lg text-center">
                <div class="card-body">
                    <h5 class="card-title">👷 Post Labor Requests</h5>
                    <p class="card-text">Find and hire laborers for your farm efficiently.</p>
                    <a href="post_labor.php" class="btn btn-success">Post Now</a>
                </div>
            </div>
        </div>

        <!-- List and Sell Produce -->
        <div class="col-md-4">
            <div class="card shadow-lg text-center">
                <div class="card-body">
                    <h5 class="card-title">🌾 Sell Produce</h5>
                    <p class="card-text">Sell your crops directly to consumers.</p>
                    <a href="sell_produce.php" class="btn btn-success">Sell Now</a>
                </div>
            </div>
        </div>

        <!-- View Orders & Earnings -->
        <div class="col-md-4">
            <div class="card shadow-lg text-center">
                <div class="card-body">
                    <h5 class="card-title">📦 View Orders & Earnings</h5>
                    <p class="card-text">Track your orders and earnings.</p>
                    <a href="view_orders.php" class="btn btn-success">View Details</a>
                </div>
            </div>
        </div>
    </div>
</div>

</div> <!-- Closes .content from header.php -->

<style>
    .card {
        border: none;
        border-radius: 10px;
        transition: transform 0.3s, box-shadow 0.3s;
    }
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.2);
    }
</style>

