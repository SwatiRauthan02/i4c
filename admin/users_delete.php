<?php include 'auth.php'; include 'db.php';
$id = (int)$_GET['id'];
$conn->query("UPDATE users SET is_deleted = 1 WHERE id = $id");
header("Location: users_index.php");
?>