<?php
// Include the database connection script
$host = 'localhost';
$db   = 'jas';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

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
