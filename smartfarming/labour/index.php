<?php
session_start();
session_destroy(); // Destroy all session data
header("Location: labor_login.php"); // Redirect to login page or home page
exit();
?>
