<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
if (!isset($_SESSION['userId'])) {
    header("Location: login.php");
    exit();
}
require_once "conn.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $projectId = $_POST['projectId'] ?? '';
   $name = $_POST['name'] ?? '';
   $description = $_POST['description'] ?? '';
   $members = $_POST['members'] ?? [];


   if ($name && $description) {
      $stmt = $pdo->prepare("INSERT INTO projects (projectId, name, description) VALUES (?, ?)");
      $stmt->execute([$projectId, $name, $description]);

      if (!empty($members)) {
         $stmt = $pdo->prepare("INSERT INTO projectMembership (projectId, memberId) VALUES (?, ?)");
         foreach ($members as $memberId) {
            $stmt->execute([$projectId, $memberId]);
         }
      }
      echo "<p>Project added successfully!</p>";
   } 
   else {
      echo "<p style='color:red;'>Please fill in all required fields.</p>";
   }
}
$users = $pdo->query("SELECT userId, firstName, lastName, nickName FROM users ORDER BY firstName")->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
   <title>Add Project</title>
</head>
<body>
   <h2>Add New Project</h2>
   <form method="post">
      <label>Project ID:</label><br>
      <input type="number" name="projectId" required><br><br>
      <label>Project Name:</label><br>
      <input type="text" name="name" required><br><br>
      <label>Description:</label><br>
      <textarea name="description" required></textarea><br><br>
      <label>Project Members:</label><br>
      <select name="members[]" multiple size="5" required>
      <?php foreach ($users as $u): ?>
      <option value="<?= htmlspecialchars($u['userId']) ?>">
      <?= htmlspecialchars($u['firstName'] . ' ' . $u['lastName'] . ' (' . $u['nickName'] . ')') ?>
      </option>
      <?php endforeach; ?>
      </select><br><br>
      <button type="submit">Add Project</button>
   </form>
</body>
</html>