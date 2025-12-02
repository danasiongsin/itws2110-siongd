<?php
session_start();
require 'conn.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['userId'];
    $first_name = $_POST['firstName'];
    $last_name = $_POST['lastName'];
    $nick_name = $_POST['nickName'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE user_id = ?");
    $stmt->execute([$user_id]);
    $user = $stmt->fetch();

    if ($user) {
        if (password_verify($password, $user['password_hash'])) {
            $_SESSION['user_id'] = $user['user_id'];
            header("Location: index.php");
            exit();
        } else {
            $error = "Incorrect password. Please try again.";
        }
    } else {
        header("Location: register.php");
        exit();
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
    <label>User ID:</label>
    <input type="text" name="user_id" required><br><br>
    <label>First Name:</label>
    <input type="text" name="first_name" required><br><br>
    <label>Last Name:</label>
    <input type="text" name="last_name" required><br><br>
    <label>Nickname:</label>
    <input type="text" name="nick_name" required><br><br>
    <label>Password:</label>
    <input type="password" name="password" required><br><br>
    <button type="submit">Login</button>
</form>
<p style="color:red;"><?php echo $error; ?></p>
</body>
</html>
