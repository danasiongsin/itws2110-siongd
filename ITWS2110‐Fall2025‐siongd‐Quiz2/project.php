<?php
session_start();
if (!isset($_SESSION['userId'])) {
    header("Location: login.php");
    exit();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$name = $_POST['name'] ?? '';
$description = $_POST['description'] ?? '';
$members = $_POST['members'] ?? [];


if ($name && $description) {
// Insert project
$stmt = $pdo->prepare("INSERT INTO projects (name, description) VALUES (?, ?)");
$stmt->execute([$name, $description]);
$projectId = $pdo->lastInsertId();


// Insert memberships
if (!empty($members)) {
$stmt = $pdo->prepare("INSERT INTO projectMembership (projectId, memberId) VALUES (?, ?)");
foreach ($members as $memberId) {
$stmt->execute([$projectId, $memberId]);
}
}

echo "<p>Project added successfully!</p>";
} else {
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