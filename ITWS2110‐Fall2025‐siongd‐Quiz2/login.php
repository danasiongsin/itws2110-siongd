<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
require 'conn.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_POST['userId'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE userId = ?");
    $stmt->execute([$userId]);
    
    $user = $stmt->fetch();

    if ($user) {
        if (password_verify($password, $user['password_hash'])) {
            $_SESSION['userId'] = $user['userId'];
            echo "Session set: " . $_SESSION['userId'];
            header("Location: index.php");
            exit();
        } else {
            $error = "Incorrect password. Please try again.";
        }
    } else {
        $error = "User not found. Please register.";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
<h2>Login</h2>
<form method="POST">
    <label>User ID (number):</label>
    <input type="text" name="userId" required><br><br>
    <label>Password:</label>
    <input type="password" name="password" required><br><br>
    <button type="submit">Login</button>
</form>
<p>No account? <a href="register.php">Register here</a></p>

<p style="color:red;"><?php echo $error; ?></p>
</body>
</html>
