<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: cus_login.php");
    exit;
}


include '../database_con.php';

$pdo = new PDO($dsn, $user, $pass, $opt);

$sql = "SELECT * FROM cus_posts";
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

<?php include 'cus_dashbord.php'; ?>


<div class="container">
    <div class="row">
        <?php foreach ($jobs as $job): ?>
            <div class="col-md-4">
                <div class="card mt-4">
                    <img class="card-img-top" src="<?php echo htmlspecialchars($job['image1'], ENT_QUOTES, 'UTF-8'); ?>" alt="Job image">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $job['name']; ?></h5>
                        <p class="card-text">
                            Age: <?php echo $job['age']; ?><br>
                            Address: <?php echo $job['physical_address']; ?><br>
                            Work Description: <?php echo $job['work_description']; ?><br>
                            Location: <?php echo $job['location']; ?><br>
                            Phone Number: <?php echo $job['phone_number']; ?>
                        </p>
                        <a href="message.php?job_id=<?php echo $job['job_id']; ?>" class="btn btn-primary">Message</a>
                        <a href="accept_post.php?job_id=<?php echo $job['job_id']; ?>" class="btn btn-success">Accept Post</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>


<?php include 'footer.php'; ?>
</body>
</html>
