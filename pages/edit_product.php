<?php
session_start();
if (!isset($_SESSION["admin_logged_in"]) || $_SESSION["admin_logged_in"] !== true) {
    die("Access Denied. <a href='login.php'>Login</a>");
}
?>
<?php
include '../includes/db.php';
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM products WHERE id='$id'");
$product = $result->fetchArray(SQLITE3_ASSOC);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $stmt = $conn->prepare("UPDATE products SET name = ?, category = ?, price = ? WHERE id = ?");
    $stmt->bindValue(1, $name, SQLITE3_TEXT);
    $stmt->bindValue(2, $category, SQLITE3_TEXT);
    $stmt->bindValue(3, $price, SQLITE3_FLOAT);
    $stmt->bindValue(4, $id, SQLITE3_INTEGER);
    $stmt->execute();
    header("Location: products.php");
}
?>
<?php include '../includes/header.php'; ?>
<form method="POST">
    <input type="text" name="name" value="<?php echo $product['name']; ?>" required>
    <input type="text" name="category" value="<?php echo $product['category']; ?>" required>
    <input type="number" name="price" value="<?php echo $product['price']; ?>" required>
    <button type="submit">Update Product</button>
</form>
<?php include '../includes/footer.php'; ?>
