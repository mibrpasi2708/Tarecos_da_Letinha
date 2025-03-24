<?php
session_start();
$admin_username = "admin";
$admin_password = "Btsseven7*"; // Change this to a secure password

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username === $admin_username && $password === $admin_password) {
        $_SESSION["admin_logged_in"] = true;
        header("Location: admin.php");
        exit();
    } else {
        echo "Invalid credentials!";
    }
}
?>

<form method="POST">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
</form>
