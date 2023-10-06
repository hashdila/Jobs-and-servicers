<?php
include 'database_con.php';

$sql = "SELECT * FROM tec_posts ORDER BY job_category ASC";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$jobs = $stmt->fetchAll();

if (empty($jobs)) {
    die("No jobs found in the database.");
}
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.rawgit.com/michalsnik/aos/2.3.1/dist/aos.css">
    <style>
        .background1 {
            background-image: url('application/hompost.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
            background-position: center center;
        }
    </style>
</head>

<body>

<div class="background1">
    <div class="container ">
        <h2 class="text-center ">
            <br>Technicians</h2>

        <?php
        $currentCategory = "";
        $delay = 0;  // Initialize delay for AOS
        foreach ($jobs as $job) {
            if ($currentCategory != $job['job_category']) {
                if ($currentCategory != "") {
                    echo '</div>';  // close the row for the previous category
                }
                echo '<h3 class="mt-4">' . $job['job_category'] . '</h3>';
                echo '<div class="row g-4 d-flex align-items-stretch">';
                $currentCategory = $job['job_category'];
            }
        ?>

        <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>">
            <div class="card h-100">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title">
                        <i class="fa fa-wrench"></i> <?php echo $job['name']; ?>
                    </h5>
                </div>
                <div class="card-body">
                    <p class="card-text"><strong>Address:</strong> <?php echo $job['physical_address']; ?></p>
                    <p class="card-text"><strong>Location:</strong> <?php echo $job['location']; ?></p>
                    <p class="card-text"><strong>Contact No:</strong> <?php echo $job['phone_number']; ?></p>
                    <p class="card-text">
                        <strong>Description:</strong>
                        <i class="fa fa-info-circle text-info"></i>
                        <?php echo $job['work_description']; ?>
                    </p>
                </div>
            </div>
        </div>

        <?php
            $delay += 100;  // Increase the delay for each card
        }
        if ($currentCategory != "") {
            echo '</div>';
        }
        ?>

    </div>
</div>

<script src="https://cdn.rawgit.com/michalsnik/aos/2.3.1/dist/aos.js"></script>
<script>
   AOS.init({
    offset: 800  
});

</script>

</body>

</html>
