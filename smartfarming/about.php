<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About - Smart Farming App</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4;
        }
        .navbar {
            background: linear-gradient(45deg, #28a745, #218838);
        }
        .hero {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://t3.ftcdn.net/jpg/08/04/22/42/360_F_804224219_QdNW7DlskOWvDzon8xM4LQuxX62bdvdm.jpg') center/cover no-repeat;
            height: 60vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: #fff;
            padding: 20px;
        }
        .hero h1 {
            font-size: 3rem;
            font-weight: bold;
        }
        .about-section {
            padding: 60px 0;
            background: #fff;
            text-align: center;
        }
        .about-section p {
            font-size: 1.2rem;
            color: #555;
            max-width: 800px;
            margin: auto;
        }
        .about-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
            margin-top: 30px;
        }
        .about-card {
            background: linear-gradient(135deg, #fff, #f8f9fa);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
            width: 300px;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .about-card:hover {
            transform: translateY(-5px);
            box-shadow: 0px 6px 20px rgba(0, 0, 0, 0.2);
        }
        .footer {
            background: #343a40;
            color: white;
            padding: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="index.html">Smart Farming</a>
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
            <h1>About Smart Farming</h1>
        </div>
    </section>
    
    <section class="about-section">
        <div class="container">
            <h2 class="section-title">Our Mission</h2>
            <p>Smart Farming App is designed to bridge the gap between farmers, laborers, and consumers. By leveraging technology, we empower farmers with tools to manage their workforce and sell produce directly, ensuring efficiency, profitability, and sustainability.</p>
            
            <div class="about-grid">
                <div class="about-card">
                    <h4>Efficient Workforce Management</h4>
                    <p>Farmers can find and hire laborers efficiently, reducing labor shortages during peak seasons.</p>
                </div>
                <div class="about-card">
                    <h4>Direct-to-Consumer Sales</h4>
                    <p>Our platform enables farmers to sell their produce directly to consumers, increasing profits.</p>
                </div>
                <div class="about-card">
                    <h4>Smart Agricultural Insights</h4>
                    <p>We provide data-driven insights to help farmers optimize their resources and boost productivity.</p>
                </div>
                <div class="about-card">
                    <h4>Sustainable Farming Practices</h4>
                    <p>Through smart technology, we promote environmentally friendly and cost-effective farming techniques.</p>
                </div>
            </div>
        </div>
    </section>
    
    <footer class="footer">
        <p>&copy; 2025 Smart Farming App. All Rights Reserved.</p>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
