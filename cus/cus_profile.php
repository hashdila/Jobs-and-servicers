<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: tec_login.php");
    exit;
}


include '../database_con.php';

$pdo = new PDO($dsn, $user, $pass, $opt);

$cus_id = $_SESSION["id"];

// Fetch technician's basic details
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$cus_id]);
$userDetails = $stmt->fetch();

// Fetch all job posts by the technician
$stmt = $pdo->prepare("SELECT * FROM cus_posts WHERE cus_id = ?");
$stmt->execute([$cus_id]);
$jobs = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tata's Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@500&display=swap" rel="stylesheet">


    <style>
        .carousel-item img {
            height: 200px;
            object-fit: cover;  /* This ensures the aspect ratio of the image is maintained */
        }
    </style>
</head>
<body>
<?php include 'cus_dashbord.php'; ?>

<div class="container mt-5 text-black">

    <!-- Profile Section -->
    
    <div class="p-4 border shadow-sm rounded bg-light position-relative">
        <h2 class="mb-4 display-4"><span class="me-2"></span>My Profile</h2>
        <div class="d-flex align-items-start mb-5">
        <img src="<?php echo htmlspecialchars($userDetails['profile_image']); ?>" alt="../cus/Profile Image" class="rounded-circle border border-secondary p-1" style="width: 150px; height: 150px;">


            <div class="ms-4">
                <p class="mb-2 fs-2"><span class="fw-bold me-2"></span> <?php echo htmlspecialchars($userDetails['name']); ?></p>
                <p class="mb-2 fs-5"><span class="fw-bold me-2">&#x2709;</span>Email: <?php echo htmlspecialchars($userDetails['email']); ?></p>
                <p class="mb-2 fs-5"><span class="fw-bold me-2">&#x1F3E0;</span>Address: <?php echo htmlspecialchars($userDetails['address']); ?></p>

            </div>
        </div>
        <a href="edit_profile.php" class="btn btn-outline-secondary position-absolute top-0 end-0 m-3"><i class="bi bi-pencil"></i></a>
    </div>



    <!-- Jobs Posted Section -->
    <h3 class="mb-4 p-4 text-center fs-1" style="font-family: 'Roboto Slab', serif;">Jobs Posted</h3>
        <?php foreach ($jobs as $job): ?>
            <div class="card mb-4 bg-light text-dark shadow-sm"> <!-- Adjusted bg-light and text-dark -->
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <div id="jobCarousel<?php echo $job['job_id']; ?>" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="<?php echo htmlspecialchars($job['image1']); ?>" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="<?php echo htmlspecialchars($job['image2']); ?>" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="<?php echo htmlspecialchars($job['image3']); ?>" class="d-block w-100" alt="...">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#jobCarousel<?php echo $job['job_id']; ?>" role="button" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#jobCarousel<?php echo $job['job_id']; ?>" role="button" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title display-6"><?php echo htmlspecialchars($job['name']); ?></h5> <!-- Using display-6 for larger font -->
                            <p class="card-text fs-5"><i class="bi bi-person-fill me-2"></i><strong>Age:</strong> <?php echo htmlspecialchars($job['age']); ?></p> <!-- Using fs-5 for a larger font and added an icon for age -->
                            <p class="card-text fs-5"><i class="bi bi-house-door-fill me-2"></i><strong>Address:</strong> <?php echo htmlspecialchars($job['address']); ?></p> <!-- Using fs-5 and added an icon for address -->
                            <p class="card-text fs-5"><i class="bi bi-briefcase-fill me-2"></i><strong>Work Description:</strong> <?php echo htmlspecialchars($job['work_description']); ?></p> <!-- Using fs-5 and added an icon for work -->
                            <p class="card-text fs-5"><i class="bi bi-geo-fill me-2"></i><strong>Location:</strong> <?php echo htmlspecialchars($job['location']); ?></p> <!-- Using fs-5 and added an icon for location -->
                            <p class="card-text fs-5"><i class="bi bi-telephone-fill me-2"></i><strong>Phone:</strong> <?php echo htmlspecialchars($job['phone_number']); ?></p> <!-- Using fs-5 and added an icon for phone -->
                        </div>
                    
                    <div class="card-footer bg-transparent border-top">

                    <form id="deleteForm" action="cus_delete_post.php" method="post">
                        <input type="hidden" name="job_id" value="<?php echo htmlspecialchars($job['job_id']); ?>">

                        <!-- Trigger button for the modal -->
                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteConfirmModal">Delete</button>

                        <div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-labelledby="deleteConfirmModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteConfirmModalLabel">Confirm Delete</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this post?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>


                        </div>
                    </div>

                </div>
            </div>
        <?php endforeach; ?>


</div>





<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script> -->

</body>
</html>
