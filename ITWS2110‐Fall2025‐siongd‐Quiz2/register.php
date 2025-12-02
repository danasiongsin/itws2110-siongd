<?php
session_start();
require 'conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_POST['userId'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $nickName = $_POST['nickName'];
    $password = $_POST['password'];

    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO users (userId, firstName, lastName, nickName, password_hash) VALUES (?, ?, ?, ?, ?)");
    try {
        $stmt->execute([$userId, $firstName, $lastName, $nickName, $password_hash]);
        $_SESSION['userId'] = $userId;
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
    <input type="text" name="userId" required><br><br>
    <label>First Name:</label>
    <input type="text" name="firstName" required><br><br>
    <label>Last Name:</label>
    <input type="text" name="lastName" required><br><br>
    <label>Nickname:</label>
    <input type="text" name="nickName" required><br><br>
    <label>Password:</label>
    <input type="password" name="password" required><br><br>
    <button type="submit">Register</button>
</form>
<p style="color:red;"><?php echo isset($error) ? $error : ''; ?></p>
</body>
</html>
