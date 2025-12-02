<?php
$host = "localhost";
$dbname = "ITWS2110‐Fall2025‐siongd‐Quiz2";
$username = "phpmyadmin";
$password = "NewPMApassword123!";
$dbOK = false;

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>


