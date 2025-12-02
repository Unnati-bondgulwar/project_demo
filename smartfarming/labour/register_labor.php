<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Labor Registration - Smart Farming App</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #007bff, #0056b3);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .register-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px;
            width: 100%;
        }
        .register-container h2 {
            margin-bottom: 20px;
            font-weight: bold;
            color: #007bff;
        }
        .btn-register {
            background-color: #007bff;
            color: white;
            padding: 10px;
            border-radius: 5px;
            width: 100%;
        }
        .btn-register:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h2>Labor Registration</h2>
        <form action="register_labor_backend.php" method="POST">
            <div class="mb-3">
                <input type="text" name="name" class="form-control" placeholder="Full Name" required>
            </div>
            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <div class="mb-3">
                <input type="text" name="phone" class="form-control" placeholder="Phone Number" required>
            </div>
            <div class="mb-3">
                <textarea name="skills" class="form-control" placeholder="Your Skills" required></textarea>
            </div>
            <div class="mb-3">
                <input type="text" name="location" class="form-control" placeholder="Location" required>
            </div>
            <button type="submit" class="btn btn-register">Register</button>
        </form>
        <p class="mt-3"><a href="labor_login.php">Already have an account? Login</a></p>
        <p><a href="../index.php">← Back to Main Website</a></p>
    </div>
</body>
</html>
