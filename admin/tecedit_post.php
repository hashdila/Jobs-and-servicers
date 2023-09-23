<?php
include 'db_connection.php';

$job_id = $_GET['job_id'];

// Fetch specific post
$query = 'SELECT * FROM tec_posts WHERE job_id = :job_id';
$stmt = $pdo->prepare($query);
$stmt->execute(['job_id' => $job_id]);
$post = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $job_category = $_POST['job_category'];
    $work_description = $_POST['work_description'];
    $physical_address = $_POST['physical_address'];

    // Update the post
    $updateQuery = 'UPDATE tec_posts SET name = :name, job_category = :job_category, work_description = :work_description, physical_address = :physical_address WHERE job_id = :job_id';
    $updateStmt = $pdo->prepare($updateQuery);
    $updateStmt->execute([
        'name' => $name,
        'job_category' => $job_category,
        'work_description' => $work_description,
        'physical_address' => $physical_address,
        'job_id' => $job_id,
    ]);

    header('Location: tec_post_management.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Post</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">
    <div class="container mt-5">
        <h1>Edit Post</h1>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= $post['name'] ?>">
            </div>
            <div class="mb-3">
                <label for="job_category" class="form-label">Job Category</label>
                <input type="text" class="form-control" id="job_category" name="job_category" value="<?= $post['job_category'] ?>">
            </div>
            <div class="mb-3">
                <label for="work_description" class="form-label">Work Description</label>
                <textarea class="form-control" id="work_description" name="work_description"><?= $post['work_description'] ?></textarea>
            </div>
            <div class="mb-3">
                <label for="physical_address" class="form-label">Physical Address</label>
                <input type="text" class="form-control" id="physical_address" name="physical_address" value="<?= $post['physical_address'] ?>">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="tec_post_management.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>
