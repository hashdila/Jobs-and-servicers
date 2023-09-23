<?php
$host = 'localhost';
$db   = 'jas';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

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
                    <h4 class="card-title"><?php echo htmlspecialchars($post['name']); ?></h4>
                    <p class="card-text">
                        <strong>Type:</strong> <?php echo $post['need_t']; ?><br>
                        <strong>Age:</strong> <?php echo $post['age']; ?><br>
                        <strong>Address:</strong> <?php echo htmlspecialchars($post['address']); ?><br>
                        <strong>Description:</strong> <?php echo htmlspecialchars($post['work_description']); ?><br>
                        <strong>Area:</strong> <?php echo htmlspecialchars($post['location']); ?><br>
                        <strong>Phone:</strong> <?php echo $post['phone_number']; ?><br>

                        
                    </p>
                    <!-- Accept Post Button -->
                    <!-- <form action="cus_qr.php" method="get">
                        <input type="hidden" name="job_id"  value="<?php echo $job['job_id']; ?>">
                        <input type="submit" class="btn btn-success"value=" comform">
                        </form> -->

                        <a href="cus_pdf.php?job_id=<?php echo $job_id; ?>" class="btn btn-success">Accept</a>


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




<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
