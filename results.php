<?php
include 'database_con.php';

$job_category = isset($_GET['job_category']) ? $_GET['job_category'] : null;
$location = isset($_GET['location']) ? $_GET['location'] : null;

$results = [];

if ($job_category && $location) {
    $stmt = $pdo->prepare("SELECT * FROM tec_posts WHERE job_category = ? AND location = ?");
    $stmt->execute([$job_category, $location]);
} elseif ($job_category) {
    $stmt = $pdo->prepare("SELECT * FROM tec_posts WHERE job_category = ?");
    $stmt->execute([$job_category]);
} elseif ($location) {
    $stmt = $pdo->prepare("SELECT * FROM tec_posts WHERE location = ?");
    $stmt->execute([$location]);
}
if ($stmt->rowCount() > 0) {
    $results = $stmt->fetchAll();
} else {
    echo "No results found.";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Results</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <!-- Include any other styles if required -->
</head>

<body class="bg-dark text-light"> <!-- Set the whole body to dark mode -->
    
    <!-- Modal containing the results -->
    <div class="modal fade" id="resultsModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content bg-secondary text-light"> <!-- Set modal background to a dark shade and text to light -->
                <div class="modal-header">
                    <h5 class="modal-title">Results</h5>
                    <button type="button" id="closeBtn" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container mt-5">
                        <!-- Displaying job category if available -->
                        <?php if($job_category): ?>
                            <h1 class="mb-4">Results for: <?php echo htmlspecialchars($job_category); ?></h1>
                        <?php endif; ?>

                        <div class="row" id="resultBox">
                            <?php foreach($results as $item): ?>
                                <div class="col-md-4 mb-4">
                                    <div class="card bg-dark text-light"> <!-- Set card to dark mode -->
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo htmlspecialchars($item['name']); ?></h5>
                                            <p class="card-text"><i class="fas fa-phone-alt"></i> <?php echo htmlspecialchars($item['phone_number']); ?></p>
                                            <p class="card-text"><i class="fas fa-map-marker-alt"></i> <?php echo htmlspecialchars($item['physical_address']); ?></p>
                                            <p class="card-text"><i class="fas fa-globe"></i> <?php echo htmlspecialchars($item['location']); ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

 
    <script>
        // Script to automatically show the modal when the page loads
        document.addEventListener("DOMContentLoaded", function() {
    var myModal = new bootstrap.Modal(document.getElementById('resultsModal'));
    myModal.show();
    
    // Redirect to home.php when close button is clicked
    document.getElementById('closeBtn').addEventListener('click', function() {
        window.location.href = 'home.php';
    });
});
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
