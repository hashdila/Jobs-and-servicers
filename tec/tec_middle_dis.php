<?php

include '../database_con.php';

$pdo = new PDO($dsn, $user, $pass, $opt);

$searchQuery = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['search'])) {
    $search = $_POST['search'];
    $searchQuery = " WHERE need_t LIKE :search";
}

$sql = "SELECT * FROM cus_posts" . $searchQuery;
$stmt = $pdo->prepare($sql);

if (!empty($searchQuery)) {
    $stmt->execute(['search' => "%" . $search . "%"]);
} else {
    $stmt->execute();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['job_category'])) {
        $selected_categories = $_POST['job_category'];
        // Process the selected categories...
        // Example: print_r($selected_categories);
    }
}

$jobs = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Job Posts</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <!-- Google Font: Roboto -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        /* Add custom CSS to style the images within the cards */
        .card-img-top {
            max-height: 100%; /* Limit the image height to 100% of its container (the card) */
            width: auto; /* Allow the image width to adjust proportionally */
        }
        .card {
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.5s;
        }

    </style>
</head>
<body>

<div class="container mt-4">
    <h1 class="text-center mb-4">Job Posts</h1>

    <?php foreach ($jobs as $job): ?>
    <div class="card mb-4 shadow-sm">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="<?php echo htmlspecialchars($job['image1'], ENT_QUOTES, 'UTF-8'); ?>" alt="Job Image" class="img-fluid rounded-start">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $job['work_description']; ?></h5>
                    <p class="card-text">
                        <i class="fas fa-user me-2"></i><strong>Name:</strong> <?php echo $job['name']; ?><br>
                        <i class="fas fa-map-marker-alt me-2"></i><strong>Area:</strong> <?php echo $job['location']; ?><br>
                        <i class="fas fa-address-card me-2"></i><strong>Address:</strong> <?php echo $job['address']; ?><br>
                        <i class="fas fa-search me-2"></i><strong>Searching:</strong> <?php echo $job['need_t']; ?><br>
                        <i class="fas fa-phone me-2"></i><strong>Phone Number:</strong> <?php echo $job['phone_number']; ?><br>
                        <i class="fas fa-rupee-sign me-2"></i><strong>Price:</strong> Rs.<?php echo $job['price']; ?>.00
                    </p>
                    <form action="cus_accept.php" method="get">
                        <input type="hidden" name="job_id" value="<?php echo $job['job_id']; ?>">
                        <button type="submit" class="btn btn-success mt-2">View Job Details</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>




<script>
    $(document).ready(function() {
    function isElementInViewport(el) {
        var rect = el.getBoundingClientRect();
        return (
            rect.top >= 0 &&
            rect.left >= 0 &&
            rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
            rect.right <= (window.innerWidth || document.documentElement.clientWidth)
        );
    }

    function displayCardsOnScroll() {
        $('.card').each(function() {
            if (isElementInViewport(this)) {
                $(this).css({
                    'opacity': '1',
                    'transform': 'translateY(0)'
                });
            }
        });
    }

    // Initial check
    displayCardsOnScroll();

    // Check again upon scrolling
    $(window).on('scroll', displayCardsOnScroll);
});

</script>
</body>


</html>
