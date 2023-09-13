<?php
// Assuming you have a database connection set up as $conn
require_once 'db_con.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['job_id'])) {
        $job_id = $_POST['job_id'];
        echo "Received job_id: " . $job_id;
        
        // Create a prepared statement to delete the post
        $stmt = $conn->prepare("DELETE FROM cus_posts WHERE job_id = ?");
        $stmt->bind_param("i", $job_id); // assuming the ID is an integer

        if ($stmt->execute()) {
            // Successfully deleted the post
            header("Location: cus_profile.php");
        } else {
            // Error deleting the post
            header("Location: cus_profile.php");
        }
        
        $stmt->close();
    }
}

$conn->close();
?>
