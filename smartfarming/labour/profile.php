<?php
session_start();
include '../db.php';

// Check if laborer is logged in
if (!isset($_SESSION['labor_id'])) {
    header("Location: login.php");
    exit();
}

$labor_id = $_SESSION['labor_id'];

// Fetch current user details
$query = "SELECT * FROM laborers WHERE id = '$labor_id'";
$result = mysqli_query($conn, $query);
$laborer = mysqli_fetch_assoc($result);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $new_password = $_POST['new_password'];

    // Update profile
    $update_query = "UPDATE laborers SET name='$name', email='$email', phone='$phone' WHERE id='$labor_id'";
    mysqli_query($conn, $update_query);

    // Update password if provided
    if (!empty($new_password)) {
        $password_query = "UPDATE laborers SET password='$new_password' WHERE id='$labor_id'";
        mysqli_query($conn, $password_query);
    }

    $_SESSION['success'] = "Profile updated successfully.";
    header("Location: profile.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile - Smart Farming App</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="content mt-5">
        <h2>Edit Profile</h2>
        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success"> <?php echo $_SESSION['success']; unset($_SESSION['success']); ?> </div>
        <?php endif; ?>
        <form action="" method="POST">
            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="<?php echo $laborer['name']; ?>" required>
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="<?php echo $laborer['email']; ?>" required>
            </div>
            <div class="mb-3">
                <label>Phone</label>
                <input type="text" name="phone" class="form-control" value="<?php echo $laborer['phone']; ?>" required>
            </div>
            <div class="mb-3">
                <label>New Password (Leave blank to keep current password)</label>
                <input type="password" name="new_password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Update Profile</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
