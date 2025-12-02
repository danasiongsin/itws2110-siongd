<?php
session_start();
if (!isset($_SESSION['userId'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
<h2>Project Information Website</h2>

<h3>Options:</h3>
<ul>
    <li><a href="project.php">Add a project</a></li>
    <li><a href="view_projects.php">View existing projects</a></li>
</ul>

<a href="logout.php">Logout</a>
</body>
</html>
