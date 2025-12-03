<?php
session_start();
if (!isset($_SESSION['userId'])) {
    header("Location: login.php");
    exit();
}

require_once "conn.php";

$query = $pdo->query("
    SELECT p.projectId, p.name, p.description,
           u.firstName, u.lastName, u.nickName
    FROM projects p
    LEFT JOIN projectMembership pm ON p.projectId = pm.projectId
    LEFT JOIN users u ON pm.memberId = u.userId
    ORDER BY p.projectId, u.firstName
");

$projects = [];
while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
   $pid = $row['projectId'];
   if (!isset($projects[$pid])) {
      $projects[$pid] = [
         'name' => $row['name'],
         'description' => $row['description'],
         'members' => []
      ];
   }
   if ($row['firstName']) {
      $projects[$pid]['members'][] =
         $row['firstName'] . " " . $row['lastName'] . " (" . $row['nickName'] . ")";
   }
}

?>

<!DOCTYPE html>
<html>
<head>
   <title>Dashboard</title>
   <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Project Information Website</h2>
<a href="project.php">Add a project</a>

<h2>Existing Projects</h2>

<?php if (empty($projects)): ?>
   <p>No projects found.</p>
<?php else: ?>
   <?php foreach ($projects as $pid => $p): ?>
      <div style="border:1px solid #ccc; padding:10px; margin-bottom:10px;">
         <h3>
               Project ID: <?= htmlspecialchars($pid) ?>:
               <?= htmlspecialchars($p['name']) ?>
         </h3>
         <p><strong>Description:</strong> <?= htmlspecialchars($p['description']) ?></p>
         
         <p><strong>Members:</strong></p>
         <ul>
               <?php foreach ($p['members'] as $m): ?>
                  <li><?= htmlspecialchars($m) ?></li>
               <?php endforeach; ?>
         </ul>
      </div>
   <?php endforeach; ?>
<?php endif; ?>

<a href="logout.php">Logout</a>
</body>
</html>
