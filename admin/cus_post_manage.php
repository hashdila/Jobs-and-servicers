<?php
include 'db_connection.php';

// Fetch all posts
$query = 'SELECT * FROM cus_posts';  // Updated the table name
$stmt = $pdo->prepare($query);
$stmt->execute();
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customer Post Management</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<?php include 'ad_nav.php'; ?>

<body class="text-white">
    <div class="container mt-5">
        <h1 class="text-white">Customer Post Management</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Job ID</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Address</th>
                    <th>Work Description</th>
                    <th>Location</th>
                    <th>Image1</th>
                    <th>Image2</th>
                    <th>Image3</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($posts as $post): ?>
                <tr>
                    <td><?= $post['job_id'] ?></td>
                    <td><?= $post['name'] ?></td>
                    <td><?= $post['age'] ?></td>
                    <td><?= $post['address'] ?></td>
                    <td><?= $post['work_description'] ?></td>
                    <td><?= $post['location'] ?></td>
                    <td><img src="<?= $post['image1'] ?>" alt="Image 1" width="50"></td>
                    <td><img src="<?= $post['image2'] ?>" alt="Image 2" width="50"></td>
                    <td><img src="<?= $post['image3'] ?>" alt="Image 3" width="50"></td>
                    <td>
                        <a href="cusedit_post.php?job_id=<?= $post['job_id'] ?>" class="btn btn-warning text-white">Edit</a>
                        <a href="cusdelete_post.php?job_id=<?= $post['job_id'] ?>" class="btn btn-danger text-white">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
