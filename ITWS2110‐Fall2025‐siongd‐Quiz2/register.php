<?php
session_start();
require 'conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO users (user_id, password_hash, name, email) VALUES (?, ?, ?, ?)");
    try {
        $stmt->execute([$user_id, $password_hash, $name, $email]);
        $_SESSION['user_id'] = $user_id;
        header("Location: index.php");
        exit();
    } catch (PDOException $e) {
        $error = "User already exists or an error occurred: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
<h2>Register</h2>
<form method="POST">
    <label>User ID:</label>
    <input type="text" name="user_id" required><br><br>
    <label>Password:</label>
    <input type="password" name="password" required><br><br>
    <label>Name:</label>
    <input type="text" name="name" required><br><br>
    <label>Email:</label>
    <input type="email" name="email"><br><br>
    <button type="submit">Register</button>
</form>
<p style="color:red;"><?php echo isset($error) ? $error : ''; ?></p>
</body>
</html>
