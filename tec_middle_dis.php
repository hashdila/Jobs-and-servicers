<?php
$host = "localhost";
$db   = "jas";
$user = "root";
$pass = "";
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        /* Add custom CSS to style the images within the cards */
        .card-img-top {
            max-height: 100%; /* Limit the image height to 100% of its container (the card) */
            width: auto; /* Allow the image width to adjust proportionally */
        }
    </style>
</head>
<body>

<div class="container">
    

    <?php foreach ($jobs as $job): ?>
    <div class="card mb-4 shadow">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img class="card-img" src="<?php echo htmlspecialchars($job['image1'], ENT_QUOTES, 'UTF-8'); ?>" alt="Job image">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $job['work_description']; ?></h5>
                    <p class="card-text">
                        Name: <?php echo $job['name']; ?><br>
                        Area: <?php echo $job['location']; ?><br>                       
                        Address: <?php echo $job['address']; ?><br>
                        Searching: <?php echo $job['need_t']; ?><br> <!-- Removed redundant ;?> -->
                        Phone Number: <?php echo $job['phone_number']; ?>
                    </p>
                    <!-- Message Button -->
                    <form action="start_chat.php" method="post">
                        <input type="hidden" name="start_chat_with_cus_id" value="<?php echo $job['job_id']; ?>">
                        <input type="submit" class="btn btn-info" value="Start Chat">
                    </form>

                    


                    <!-- Accept Post Button -->
                    <form action="cus_accept.php" method="get">
                        <input type="hidden" name="job_id"  value="<?php echo $job['job_id']; ?>">
                        <input type="submit" class="btn btn-success" value="View Job Details">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

</body>
</html>
