<?php

include '../database_con.php';



if (isset($_GET['job_id'])) {
    $job_id = $_GET['job_id'];
} else {
    // Handle the case where job_id isn't set.
    // For example, display an error message or redirect the user.
    exit('Job ID not provided.');
}









$sql = "SELECT * FROM cus_posts WHERE job_id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$job_id]);
$post = $stmt->fetch(PDO::FETCH_ASSOC);





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tec Post Details</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>


<?php include 'tec_dashbord.php'; ?>


<div class="container mt-5">
    <h2>Tec Post Details</h2>
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">

                <!-- Bootstrap Carousel for Images -->
                <div id="postImages" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner" style="height: 400px;">
                        <!-- For a 16x9 aspect ratio -->
                        <div class="carousel-item active aspect-ratio ar-16x9">
                            <div class="aspect-ratio-content">
                                <img src="<?php echo htmlspecialchars($post['image1']); ?>" class="d-block w-100 h-100 object-fit-cover" alt="Image 1">
                            </div>
                        </div>
                        <div class="carousel-item aspect-ratio ar-16x9">
                            <div class="aspect-ratio-content">
                                <img src="<?php echo htmlspecialchars($post['image2']); ?>" class="d-block w-100 h-100 object-fit-cover" alt="Image 2">
                            </div>
                        </div>
                        <div class="carousel-item aspect-ratio ar-16x9">
                            <div class="aspect-ratio-content">
                                <img src="<?php echo htmlspecialchars($post['image3']); ?>" class="d-block w-100 h-100 object-fit-cover" alt="Image 3">
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#postImages" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#postImages" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

                <!-- Card Body -->
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-6">
                            <h2 class="mb-0">Job Details</h2>
                        </div>
                        <div class="col-6 text-right">
                            <h4 class="mb-0">Job ID: <?php echo $job_id; ?></h4>
                        </div>
                    </div>
                    
                    <table class="table table-bordered">
                        <tr>
                            <th>Name</th>
                            <td><?php echo htmlspecialchars($post['name']); ?></td>
                        </tr>
                        <tr>
                            <th>Type</th>
                            <td><?php echo $post['need_t']; ?></td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td><?php echo htmlspecialchars($post['address']); ?></td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td><?php echo htmlspecialchars($post['work_description']); ?></td>
                        </tr>
                        <tr>
                            <th>Area</th>
                            <td><?php echo htmlspecialchars($post['location']); ?></td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td><?php echo $post['phone_number']; ?></td>
                        </tr>
                        <tr>
                            <th>Price (Rs.)</th>
                            <td><?php echo $post['price']; ?>.00</td>
                        </tr>
                    </table>
                    <!-- Accept Post Button -->
                    <!-- <form action="cus_qr.php" method="get">
                        <input type="hidden" name="job_id"  value="<?php echo $job['job_id']; ?>">
                        <input type="submit" class="btn btn-success"value=" comform">
                        </form> -->
                        <div class="row mt-4">
                            <div class="col-6">
                        <form action="accept_job.php" method="post" id="accept-form">
                            <input type="hidden" name="job_id" value="<?php echo $job_id; ?>">
                            <input type="hidden" name="name" value="<?php echo htmlspecialchars($post['name']); ?>">
                            <input type="hidden" name="address" value="<?php echo htmlspecialchars($post['address']); ?>">
                            <input type="hidden" name="work_description" value="<?php echo htmlspecialchars($post['work_description']); ?>">
                            <input type="hidden" name="location" value="<?php echo htmlspecialchars($post['location']); ?>">
                            <input type="hidden" name="phone_number" value="<?php echo htmlspecialchars($post['phone_number']); ?>">
                            <input type="hidden" name="price" value="<?php echo htmlspecialchars($post['price']); ?>">

                            <!-- Accept Job Button -->
                            <button type="submit" class="btn btn-primary">Accept</button> 
                            </form>
                            </div>
                            <div class="col-6">
                        <form action="tec_pdf.php" method="post">
                            <input type="hidden" name="job_id" value="<?php echo $job_id; ?>">
                            <input type="hidden" name="tec_id" value="<?php echo $tec_id; ?>">
                            <input type="hidden" name="name" value="<?php echo htmlspecialchars($post['name']); ?>">
                            <input type="hidden" name="address" value="<?php echo htmlspecialchars($post['address']); ?>">
                            <input type="hidden" name="work_description" value="<?php echo htmlspecialchars($post['work_description']); ?>">
                            <input type="hidden" name="location" value="<?php echo htmlspecialchars($post['location']); ?>">
                            <input type="hidden" name="phone_number" value="<?php echo htmlspecialchars($post['phone_number']); ?>">
                            <input type="hidden" name="price" value="<?php echo htmlspecialchars($post['price']); ?>">
                            <!-- Add other hidden fields similarly -->

                            <!-- Download PDF Button -->
                            <button type="submit" class="btn btn-danger">Download PDF</button>
                        </form>


                    </div>
                    </div>
                    <div class="modal fade" id="acceptConfirmationModal" tabindex="-1" aria-labelledby="acceptConfirmationModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="acceptConfirmationModalLabel">Accept Job Confirmation</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to accept this job?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-primary" id="confirm-accept">Accept</button>
                                </div>
                            </div>
                        </div>
                    </div>


                        
                </div>
            </div>
      

    <div class="container mt-4">
    <h3>Comments</h3>
    <?php
    // Fetch comments for the post from your database
    $commentsSql = "SELECT * FROM post_comments WHERE job_id = ?";
    $commentsStmt = $pdo->prepare($commentsSql);
    $commentsStmt->execute([$job_id]);
    $comments = $commentsStmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($comments) > 0) {
        foreach ($comments as $comment) {
            echo '<div class="card mb-2">';
            echo '<div class="card-body">';
            echo '<p class="card-text">';
            echo htmlspecialchars($comment['comment_text']) . '<br>';
            echo '<small>Posted on: ' . htmlspecialchars($comment['created_at']) . '</small> ';
            echo '<a href="delet_coment.php?comment_id=' . $comment['comment_id'] . '&job_id=' . $comment['job_id'] . '">🗑️</a>';
            echo '</p>';

            echo '</div>';
            echo '</div>';
            
        }
    } else {
        echo '<p>No comments yet.</p>';
    }
    ?>

    <!-- Add Comment Form -->
    <h4>Add a Comment</h4>
    <form action="add_comment.php" method="post">
        <input type="hidden" name="job_id" value="<?php echo $job_id; ?>">
        <div class="form-group">
            <label for="commentText">Comment:</label>
            <textarea class="form-control" id="commentText" name="comment_text" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit Comment</button>
    </form>
    
</div>


</div>
    </div>

</div>

<!-- <script>
    function handleAccept(jobId) {
        // First, accept the job
        fetch(`accept_job.php?job_id=${jobId}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.text();
            })
            .then(data => {
                // If the job was accepted successfully, redirect to generate PDF
                window.location.href = `cus_pdf.php?job_id=${jobId}`;
            })
            .catch(error => {
                console.log('There was a problem with the fetch operation:', error.message);
            });
    }
</script> -->
<script>
    // Function to show the accept confirmation modal
    function showAcceptConfirmationModal() {
        $('#acceptConfirmationModal').modal('show');
    }

    // Attach an event listener to the form submission
    document.getElementById('accept-form').addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent the default form submission

        // Show the custom confirmation modal
        showAcceptConfirmationModal();

        // Handle the confirmation
        document.getElementById('confirm-accept').addEventListener('click', function () {
            // User clicked "Accept" in the modal
            // Proceed with form submission
            document.getElementById('accept-form').submit();
        });
    });
</script>



<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
