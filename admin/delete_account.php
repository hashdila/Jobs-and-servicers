<!-- delete.php -->
<?php
include 'db_connection.php';

$id = $_GET['id'];

// Delete user
$query = 'DELETE FROM users WHERE id = :id';
$stmt = $pdo->prepare($query);
$stmt->execute(['id' => $id]);

header('Location: account_manage.php');
