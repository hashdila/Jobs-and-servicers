<!-- edit.php -->
<?php
include 'db_connection.php';

$id = $_GET['id'];

// Fetch user
$query = 'SELECT * FROM users WHERE id = :id';
$stmt = $pdo->prepare($query);
$stmt->execute(['id' => $id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Update user
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    $updateQuery = 'UPDATE users SET name = :name, email = :email, address = :address WHERE id = :id';
    $updateStmt = $pdo->prepare($updateQuery);
    $updateStmt->execute(['name' => $name, 'email' => $email, 'address' => $address, 'id' => $id]);
    $_SESSION['update_success'] = true;
    header('Location: account_manage.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Edit User</h1>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= $user['name'] ?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= $user['email'] ?>">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" value="<?= $user['address'] ?>">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="user_management.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Update Success</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Your update was successful.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>
<?php if (isset($_SESSION['update_success']) && $_SESSION['update_success']) : ?>
    <script>
        $(document).ready(function () {
            $('#successModal').modal('show');
        });
    </script>
    <?php unset($_SESSION['update_success']); // Reset the flag ?>
<?php endif; ?>

</body>
</html>
