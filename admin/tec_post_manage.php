<?php
include 'db_connection.php';

// Fetch all posts
$query = 'SELECT * FROM tec_posts';
$stmt = $pdo->prepare($query);
$stmt->execute();
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tec Post Management</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<?php include 'ad_nav.php'; ?>

<body class=" text-white">
    <div class="container mt-5">
        <h1 class="text-white">Tec Post Management</h1>
        <table class="table  ">
            <thead>
                <tr>
                    <th>Job ID</th>
                    <th>Name</th>
                    <th>Job Category</th>
                    <th>Work description</th>
                    <th>Location</th>
                    <th>image1</th>
                    <th>image2</th>
                    <th>image3</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($posts as $post): ?>
                <tr>
                    <td><?= $post['job_id'] ?></td>
                    <td><?= $post['name'] ?></td>
                    <td><?= $post['job_category'] ?></td>
                    <td><?= $post['work_description'] ?></td>
                    <td><?= $post['physical_address'] ?></td>
                    <td><img src="<?= $post['image1'] ?>" alt="Image 1" width="50"></td>
                    <td><img src="<?= $post['image2'] ?>" alt="Image 2" width="50"></td>
                    <td><img src="<?= $post['image3'] ?>" alt="Image 3" width="50"></td>
                    <td>
                        <a href="tecedit_post.php?job_id=<?= $post['job_id'] ?>" class="btn btn-warning text-white">Edit</a>
                        <a href="#" class="btn btn-danger deletePostButton" data-bs-toggle="modal" data-bs-target="#deletePostModal" data-post-id="<?= $post['job_id'] ?>">Delete</a>

                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="modal fade" id="deletePostModal" tabindex="-1" aria-labelledby="deletePostModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deletePostModalLabel" style="color: black;">Delete Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p style="color: black;">Are you sure you want to delete this post?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <a href="#" id="deletePostLink" class="btn btn-danger">Delete</a>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
    $('.deletePostButton').click(function() {
        var postId = $(this).data('post-id');
        var deletePostLink = $('#deletePostLink');
        deletePostLink.attr('href', 'tecpost_delete.php?job_id=' + postId);
    });
});
</script>

</body>
</html>
