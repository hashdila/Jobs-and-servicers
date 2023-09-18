<?php
include 'db_con.php';

if (isset($_GET['comment_id']) && is_numeric($_GET['comment_id'])) {
    $commentId = $_GET['comment_id'];
    $jobId = $_GET['job_id'];

    // Delete the comment from the database
    $deleteSql = "DELETE FROM post_comments WHERE id = ?";
    try {
        $deleteStmt = $pdo->prepare($deleteSql);
        $deleteStmt->execute([$commentId]);

        // Redirect back to the post details page after deleting the comment
        header("Location: cus_accept.php?job_id=$jobId");
        exit();
    } catch (\PDOException $e) {
        die("Database error: " . $e->getMessage());
    }
    
} else {
    // Handle invalid comment_id (not set or not numeric)
    header("Location: cus_accept.php");
    exit();
}
?>
