<?php

// Turn on error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include the database connection

$host = 'localhost';
$db = 'jas';
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



// Check if both 'comment_id' and 'job_id' are set and are numeric
if (isset($_GET['comment_id'], $_GET['job_id']) && is_numeric($_GET['comment_id']) && is_numeric($_GET['job_id'])) {
    
    $commentId = $_GET['comment_id'];
    $jobId = $_GET['job_id'];

    // Delete the comment from the database
    $deleteSql = "DELETE FROM post_comments WHERE id = ?";

    try {
        // Prepare and execute the delete statement
        $deleteStmt = $pdo->prepare($deleteSql);
        $deleteStmt->execute([$commentId]);

        // Redirect back to the post details page after deleting the comment
        header("Location: cus_accept.php?job_id=$jobId");
        exit();

    } catch (\PDOException $e) {
        // Log the error for debugging and show a generic error message
        // Note: In a real-world application, consider logging this error to a file or error tracking system
        error_log("Database error: " . $e->getMessage());
        die("There was an error processing your request. Please try again later.");
    }

} else {
    // If the 'comment_id' or 'job_id' parameters are invalid, send a bad request response
    http_response_code(400); // Bad request
    header("Location: cus_accept.php");
    exit();
}
?>
