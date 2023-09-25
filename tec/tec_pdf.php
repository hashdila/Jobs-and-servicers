<?php
require_once '../vendor/autoload.php';

// Start buffering the output
ob_start();

// Retrieve the data from the POST request
$job_id = $_POST['job_id'];
$name = $_POST['name'];
$address = $_POST['address'];
$location = $_POST['location'];
$work_description = $_POST['work_description'];
$phone_number = $_POST['phone_number'];
$price = $_POST['price'];

// Create a new TCPDF object
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->SetCreator(PDF_CREATOR);
$pdf->SetTitle('Job Details');

// Remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

$pdf->AddPage();

// Build the HTML content for the PDF
$html = "
<h1>Job Details</h1>
<p><strong>Job ID:</strong> {$job_id}</p>
<p><strong>Name:</strong> {$name}</p>
<p><strong>Address:</strong> {$address}</p>
<p><strong>Work Description:</strong> {$work_description}</p>
<p><strong>Location:</strong> {$location}</p>
<p><strong>Phone Number:</strong> {$phone_number}</p>
<p><strong>Price: Rs.</strong> {$price}.00</p>
";

$pdf->writeHTML($html, true, false, true, false, '');

// Clear the buffered output
ob_end_clean();

// Output the PDF
$pdf->Output('job_details.pdf', 'D');
?>





<form action="generate_pdf.php" method="post">
    <input type="hidden" name="job_id" value="<?php echo $job_id; ?>">
    <input type="hidden" name="Accepted_date" value="<?php echo $accepted_date; ?>">
    <input type="hidden" name="Poster Name" value="<?php echo $name; ?>">
    <input type="hidden" name="Address" value="<?php echo $address; ?>">
    <input type="hidden" name="location" value="<?php echo $location; ?>">
    <input type="hidden" name="work description" value="<?php echo $work_description; ?>">
    <input type="hidden" name="Tel" value="<?php echo $phone_number; ?>">
    <input type="hidden" name="Price" value="<?php echo $price; ?>">
    <!-- Add other hidden fields similarly -->

    <!-- Download PDF Button -->
    <button type="submit" class="btn btn-success">Download PDF</button>
</form>
