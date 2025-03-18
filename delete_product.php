<?php
session_start();
if (!isset($_SESSION["admin_logged_in"]) || $_SESSION["admin_logged_in"] !== true) {
    die("Access Denied. <a href='login.php'>Login</a>");
}
?>
<?php
include 'includes/db.php';
$id = $_GET['id'];
$conn->exec("DELETE FROM products WHERE id='$id'");
header("Location: products.php");
?>