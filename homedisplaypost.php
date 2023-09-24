<?php
include'database_con.php';

    $sql = "SELECT * FROM tec_posts ORDER BY job_category ASC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $jobs = $stmt->fetchAll();

    if (empty($jobs)) {
        die("No jobs found in the database.");
    }

?>





<div class="container mt-5">
    <h2 class="text-center">Technicians</h2>

    <?php
    $currentCategory = "";
    foreach ($jobs as $job) {
        if ($currentCategory != $job['job_category']) {
            if ($currentCategory != "") {
                echo '</div>';  // close the row for the previous category
            }
            echo '<h3 class="mt-4">' . $job['job_category'] . '</h3>';
            echo '<div class="row g-4 d-flex align-items-stretch">';  // start a new row for this category with gaps
            $currentCategory = $job['job_category'];
        }
    ?>

    <div class="col-6 col-md-4 col-lg-3">
        <div class="card h-100">
            <!-- Card Header with an Icon -->
            <div class="card-header bg-primary text-white">
                <h5 class="card-title">
                    <i class="fa fa-wrench"></i> <?php echo $job['name']; ?>
                </h5>
            </div>
            <div class="card-body">
                <!-- Bold Text -->
                <p class="card-text"><strong>Address:</strong> <?php echo $job['physical_address']; ?></p>
                <p class="card-text"><strong>Location:</strong> <?php echo $job['location']; ?></p>
                <p class="card-text"><strong>Contact No:</strong> <?php echo $job['phone_number']; ?></p>
                <!-- Icon for Description -->
                <p class="card-text">
                    <strong>Description:</strong>
                    <i class="fa fa-info-circle text-info"></i>
                    <?php echo $job['work_description']; ?>
                </p>
            </div>
        </div>
    </div>

    <?php
    }
    if ($currentCategory != "") {
        echo '</div>';  // close the last row
    }
    ?>

</div>
