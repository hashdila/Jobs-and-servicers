<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: tec_login.php");
    exit;
}

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

$sql = "SELECT * FROM tec_posts";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$jobs = $stmt->fetchAll();
?>


<!DOCTYPE html>
<html>
<head>
    <title>Job Posts</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>

<?php include 'tec_dashbord.php'; ?>


<div class="container">
    <div class="row">
        <?php foreach ($jobs as $job): ?>
            <div class="col-md-4">
                <div class="card mt-4">
                    <img class="card-img-top" src="<?php echo htmlspecialchars($job['image1'], ENT_QUOTES, 'UTF-8'); ?>" alt="Job image">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $job['job_category']; ?></h5>
                        <p class="card-text">
                            Name: <?php echo $job['name']; ?><br>
                            Age: <?php echo $job['age']; ?><br>
                            Address: <?php echo $job['physical_address']; ?><br>
                            Work Description: <?php echo $job['work_description']; ?><br>
                            Location: <?php echo $job['location']; ?><br>
                            Phone Number: <?php echo $job['phone_number']; ?>
                        </p>
                        <!-- Message Button -->
                        <a href="message.php?job_id=<?php echo $job['job_id']; ?>">
                            <button type="button" class="btn btn-primary">Message</button>
                        </a>

                        <!-- Accept Post Button -->
                        <form action="cus_accept.php" method="get">
                        <input type="hidden" name="job_id"  value="<?php echo $job['job_id']; ?>">
                        <input type="submit" class="btn btn-success"value="View Job Details">
                        </form>

                        <!-- <a href="cus_accept.php?jobs_id=<?php echo $job['job_id']; ?>">
                            <button type="button" class="btn btn-success">Accept the Post</button>
                        </a> -->





                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>


<?php include 'footer.php'; ?>
</body>
</html>
