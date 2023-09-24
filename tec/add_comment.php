<?php
// Include the database connection script

include '../database_con.php';

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $job_id = $_POST['job_id'];
    $commentText = $_POST['comment_text'];

    // Insert the new comment into the database
    $insertSql = "INSERT INTO post_comments (job_id, comment_text) VALUES (?, ?)";
    $insertStmt = $pdo->prepare($insertSql);
    $insertStmt->execute([$job_id, $commentText]);

    // Redirect back to the post details page after adding the comment
    header("Location: cus_accept.php?job_id=$job_id");
    exit();
} else {
    // Handle invalid request method (e.g., GET)
    header("Location: cus_accept.php"); // Redirect to a suitable page
    exit();
}
?>
