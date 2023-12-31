<?php
require_once '../vendor/autoload.php';


// Get job_id from GET request
$job_id = $_GET['job_id'];

// Connect to database
// Connect to database

include '../database_con.php';



// Your PDO code here

$sql = "SELECT * FROM cus_posts WHERE job_id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$job_id]);
$post = $stmt->fetch(PDO::FETCH_ASSOC);

// Create new PDF instance
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Tec Post Details');
$pdf->SetSubject('Tec Post Details for ' . $post['name']);

// Set font
$pdf->SetFont('helvetica', '', 12);

// Add a page
$pdf->AddPage();

// Content
$html = '<h1>Tec Post Details</h1>';
$html .= '<h2>' . htmlspecialchars($post['name']) . '</h2>';
$html .= '<p><strong>Type:</strong> ' . $post['need_t'] . '</p>';

$html .= '<p><strong>Description:</strong> ' . $post['work_description'] . '</p>';
$html .= '<p><strong>Phone number:</strong> ' . $post['phone_number'] . '</p>';
$html .= '<p><strong>Adderess:</strong> ' . $post['address'] . '</p>';

//... Add other details similarly

$pdf->writeHTML($html, true, 0, true, 0);

// Close and output PDF
$pdf->Output('job details.pdf', 'D'); // D - send to the browser and force a file download
?>
