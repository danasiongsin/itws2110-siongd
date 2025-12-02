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
<h2>Welcome, <?php echo $_SESSION['userId']; ?>!</h2>

<h3>Options:</h3>
<ul>
    <li><a href="add_project.php">Add a project</a></li>
    <li><a href="view_projects.php">View existing projects</a></li>
</ul>

<a href="logout.php">Logout</a>
</body>
</html>
