<?php
session_start();
if (!isset($_SESSION["admin_logged_in"]) || $_SESSION["admin_logged_in"] !== true) {
    die("Access Denied. <a href='login.php'>Login</a>");
}
?>
<?php
include '../includes/db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];

    $stmt = $conn->prepare("INSERT INTO products (name, category, price) VALUES (?, ?, ?)");
    $stmt->bindValue(1, $name, SQLITE3_TEXT);
    $stmt->bindValue(2, $category, SQLITE3_TEXT);
    $stmt->bindValue(3, $price, SQLITE3_FLOAT);
    $stmt->execute();
    header("Location: admin.php");
}
?>