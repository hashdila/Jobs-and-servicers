<?php
include '../database_con.php';
session_start();

// Enable error reporting for diagnosis
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Check if the user is logged in
if (!isset($_SESSION['id']) || !isset($_SESSION['name'])) {
    exit('User not logged in.');
}

// Fetch the technician details from the session
$tec_id = $_SESSION['id'];
$tec_name = $_SESSION['name'];

// Check if required fields are set
if (!isset($_POST['job_id']) || !isset($_POST['name']) || !isset($_POST['address']) || !isset($_POST['price'])) {
    exit('Required fields not provided.');
}

$job_id = $_POST['job_id'];
$name = $_POST['name'];
$address = $_POST['address'];
$work_description = isset($_POST['work_description']) ? $_POST['work_description'] : ''; // Default to empty if not set
$location = isset($_POST['location']) ? $_POST['location'] : ''; // Default to empty if not set
$phone_number = isset($_POST['phone_number']) ? $_POST['phone_number'] : ''; // Default to empty if not set

// Validate and sanitize price
$price = filter_var($_POST['price'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
if (!$price || !is_numeric($price)) {
    exit('Invalid price provided.');
}

try {
    // Insert into the accepted_jobs table
    $sql = "INSERT INTO accepted_jobs (job_id, tec_id, tec_name, name, address, work_description, location, phone_number, price) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$job_id, $tec_id, $tec_name, $name, $address, $work_description, $location, $phone_number, $price]);

    // Optional: Use session messages if you wish
    // $_SESSION['message'] = 'Job accepted successfully!';
} catch (PDOException $e) {
    die("Database error: " . $e->getMessage());
    // Optional: Use session messages if you wish
    // $_SESSION['error'] = 'Error accepting the job.';
}

// Redirect back to the details page
header('Location: cus_accept.php?job_id=' . $job_id);
exit();
?>
