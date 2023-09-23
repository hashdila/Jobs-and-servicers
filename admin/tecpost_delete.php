<?php
include 'db_connection.php';

$job_id = $_GET['job_id'];

// Delete post
$query = 'DELETE FROM tec_posts WHERE job_id = :job_id';
$stmt = $pdo->prepare($query);
$stmt->execute(['job_id' => $job_id]);

header('Location: tec_post_manage.php');
