<?php
include 'db_connection.php';

if (isset($_GET['job_id'])) {
    // Delete the post
    $job_id = $_GET['job_id'];
    $query = 'DELETE FROM cus_posts WHERE job_id = ?';
    $stmt = $pdo->prepare($query);
    $stmt->execute([$job_id]);

    header('Location: cus_post_manage.php');  // Redirect to your main dashboard or list page
    exit;
}
