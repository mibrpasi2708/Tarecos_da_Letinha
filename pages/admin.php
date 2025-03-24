<?php
session_start();
if (!isset($_SESSION["admin_logged_in"]) || $_SESSION["admin_logged_in"] !== true) {
    die("Access Denied. <a href='login.php'>Login</a>");
}
?>

<?php include '../includes/header.php'; ?>
    <h1>Admin Panel</h1>
    <form action="add_product.php" method="POST">
        <input type="text" name="name" placeholder="Product Name" required>
        <input type="text" name="category" placeholder="Category" required>
        <input type="number" name="price" placeholder="Price" required>
        <button type="submit">Add Product</button>
    </form>
<a href="logout.php">Logout</a>

<?php include '../includes/footer.php'; ?>