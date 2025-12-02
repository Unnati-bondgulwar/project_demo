<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Farming App</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4;
        }
        .hero {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://t3.ftcdn.net/jpg/08/04/22/42/360_F_804224219_QdNW7DlskOWvDzon8xM4LQuxX62bdvdm.jpg') center/cover no-repeat;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;
            color: #fff;
            padding: 20px;
        }
        .hero h1 {
            font-size: 3.5rem;
            font-weight: bold;
            text-transform: uppercase;
        }
        .hero p {
            font-size: 1.5rem;
        }
        .hero .btn {
            font-size: 1.2rem;
            padding: 12px 25px;
            border: none;
            color: white;
            border-radius: 25px;
            transition: 0.3s;
            margin: 10px;
        }
        .btn-farmer {
            background-color: #28a745;
        }
        .btn-labor {
            background-color: #007bff;
        }
        .btn-shop {
            background-color: #ff9800;
        }
        .hero .btn:hover {
            opacity: 0.9;
        }
        .navbar {
            background: linear-gradient(45deg, #28a745, #218838);
        }
        .section-title {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 20px;
            color: #343a40;
        }
        .feature-box {
            background: linear-gradient(135deg, #fff, #f8f9fa);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .feature-box:hover {
            transform: translateY(-5px);
            box-shadow: 0px 6px 20px rgba(0, 0, 0, 0.2);
        }
        footer {
            background: #343a40;
            color: white;
            padding: 20px;
        }
    </style>
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Smart Farming</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                   <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                </ul>
            </div>
        </div>
    </nav>
    
    <section class="hero">
        <div class="container">
            <h1>Empowering Farmers with Smart Technology</h1>
            <p>Connecting Farmers, Laborers, and Consumers</p>
            <a href="farmer/" class="btn btn-farmer">Farmer Login</a>
            <a href="labour/" class="btn btn-labor">Labor Login</a>
            <a href="shop.php" class="btn btn-shop">Shop Now</a>
        </div>
    </section>
    
    <section id="about" class="py-5 text-center">
        <div class="container">
            <h2 class="section-title">About Smart Farming</h2>
            <p>Our platform connects farmers directly with laborers and consumers, making agriculture more efficient and profitable.</p>
        </div>
    </section>
    
    <section id="features" class="py-5 bg-light text-center">
        <div class="container">
            <h2 class="section-title">Key Features</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="feature-box">
                        <h4>Find Laborers Easily</h4>
                        <p>Farmers can connect with laborers in real-time.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box">
                        <h4>Sell Produce Directly</h4>
                        <p>Eliminate intermediaries and boost profits.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box">
                        <h4>Smart Insights</h4>
                        <p>Get data-driven recommendations for farming.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <footer class="text-center">
        <p>&copy; 2025 Smart Farming App. All Rights Reserved.</p>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>