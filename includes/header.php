<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
    
<!DOCTYPE html>
<html>
<head>
    <title>My PHP Website</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <img src="assets/Tarecos_og.png" alt="Logo" class="logo">
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a href="contacts.php">Contact</a></li>
                <li><a href="about.php">About Us</a></li>
                <?php if (isset($_SESSION["admin_logged_in"]) && $_SESSION["admin_logged_in"] === true): ?>
                    <li><a href="admin.php">Admin</a></li>
                <?php else: ?>
                    <li style="float: right;"><a href="login.php">Admin Login</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
