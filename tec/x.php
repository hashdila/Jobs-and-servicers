<?php
// ... your existing PHP code ...

// Fetch all posts
$sql = "SELECT * FROM tec_posts";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- ... your existing HTML code ... -->

<!-- Table for displaying all posts -->
<div class="container mt-5">
    <h3>All Job Posts</h3>
    <table class="table table-bordered table-responsive">
        <thead>
            <tr>
                <th>Name</th>
                <th>Job Category</th>
                <th>Age</th>
                <th>Address</th>
                <th>Work Description</th>
                <th>Images</th>
                <th>Location</th>
                <th>Phone Number</th>
                <!-- Add more columns if needed -->
            </tr>
        </thead>
        <tbody>
            <?php foreach($posts as $post): ?>
                <tr>
                    <td><?= htmlspecialchars($post['name']) ?></td>
                    <td><?= htmlspecialchars($post['job_category']) ?></td>
                    <td><?= htmlspecialchars($post['age']) ?></td>
                    <td><?= htmlspecialchars($post['physical_address']) ?></td>
                    <td><?= htmlspecialchars($post['work_description']) ?></td>
                    <td>
                        <img src="<?= htmlspecialchars($post['image1']) ?>" alt="Image 1" width="50px">
                        <img src="<?= htmlspecialchars($post['image2']) ?>" alt="Image 2" width="50px">
                        <img src="<?= htmlspecialchars($post['image3']) ?>" alt="Image 3" width="50px">
                    </td>
                    <td><?= htmlspecialchars($post['location']) ?></td>
                    <td><?= htmlspecialchars($post['phone_number']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
