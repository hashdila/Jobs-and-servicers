<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['job_id'])) {
    // Update the post data
    $query = 'UPDATE cus_posts SET name = ?, age = ?, address = ?, work_description = ?, location = ?, image1 = ?, image2 = ?, image3 = ? WHERE job_id = ?';
    $stmt = $pdo->prepare($query);
    $stmt->execute([
        $_POST['name'], 
        $_POST['age'], 
        $_POST['address'], 
        $_POST['work_description'], 
        $_POST['location'], 
        $_POST['image1'], 
        $_POST['image2'], 
        $_POST['image3'],
        $_POST['job_id']
    ]);
    header('Location: cus_post_manage.php');  // Redirect to your main dashboard or list page
    exit;
}

// Get the post details for editing
$job_id = $_GET['job_id'];
$query = 'SELECT * FROM cus_posts WHERE job_id = ?';
$stmt = $pdo->prepare($query);
$stmt->execute([$job_id]);
$post = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<?php include 'ad_nav.php'; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Customer Post</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-2">
    <h2>Edit Customer Post</h2>
    <form method="post" class="mt-4">
        <input type="hidden" name="job_id" value="<?= $post['job_id'] ?>">
        
        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= $post['name'] ?>">
        </div>
        
        <div class="mb-3">
            <label for="age" class="form-label">Age:</label>
            <input type="text" class="form-control" id="age" name="age" value="<?= $post['age'] ?>">
        </div>
        
        <div class="mb-3">
            <label for="address" class="form-label">Address:</label>
            <textarea class="form-control" id="address" name="address"><?= $post['address'] ?></textarea>
        </div>
        
        <div class="mb-3">
            <label for="work_description" class="form-label">Work Description:</label>
            <textarea class="form-control" id="work_description" name="work_description"><?= $post['work_description'] ?></textarea>
        </div>
        
        <div class="mb-3">
            <label for="location" class="form-label">Location:</label>
            <input type="text" class="form-control" id="location" name="location" value="<?= $post['location'] ?>">
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="image1" class="form-label">Image 1:</label>
                <input type="text" class="form-control" id="image1" name="image1" value="<?= $post['image1'] ?>">
            </div>
            <div class="col-md-4 mb-3">
                <label for="image2" class="form-label">Image 2:</label>
                <input type="text" class="form-control" id="image2" name="image2" value="<?= $post['image2'] ?>">
            </div>
            <div class="col-md-4 mb-3">
                <label for="image3" class="form-label">Image 3:</label>
                <input type="text" class="form-control" id="image3" name="image3" value="<?= $post['image3'] ?>">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="tec_post_management.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
