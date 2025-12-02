<?php
session_start();
if (!isset($_SESSION['user_id'])) {
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
<h2>Welcome, <?php echo $_SESSION['user_id']; ?>!</h2>

<h3>Options:</h3>
<ul>
    <li><a href="add_project.php">Add a project</a></li>
    <li><a href="view_projects.php">View existing projects</a></li>
</ul>

<a href="logout.php">Logout</a>
</body>
</html>
