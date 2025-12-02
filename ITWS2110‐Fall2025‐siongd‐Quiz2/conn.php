<?php
$dbOK = false;

@$db = new mysqli('localhost', 'phpmyadmin', 'NewPMApassword123!', 'ITWS2110‐Fall2025‐siongd‐Quiz2');

if ($db->connect_error) {
   echo '<div class="messages">Could not connect to the database. Error: ';
   echo $db->connect_errno . ' - ' . $db->connect_error . '</div>';
} else {
   $dbOk = true;
}
?>