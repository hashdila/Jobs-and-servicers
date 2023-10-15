<?php


include '../database_con.php';

$pdo = new PDO($dsn, $user, $pass, $opt);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        session_start();
        $_SESSION["loggedin"] = true;
        $_SESSION["id"] = $user["id"];
        $_SESSION["username"] = $username;
        $_SESSION["name"] = $user["name"];
        $_SESSION["email"] = $user["email"];
        $_SESSION["NIC"] = $user["NIC"];
        $_SESSION["unique_id"] = $user["unique_id"];

        // Redirect user to welcome page
        header("location: cus_home.php");
    } else {
        // Display an error message if password is not valid
        $error = "The username or password was incorrect.";
    }
}

?>

<?php if (!empty($error)): ?>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', (event) => {
            var errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
            errorModal.show();
        });
    </script>
<?php endif; ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Login</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

        
</head>

<body>
    
        
<button id="closePageBtn" class="btn btn-danger position-fixed top-0 end-0 m-3" onclick="closePage()">X</button>

<div class="container">
    <div class="row justify-content-center align-items-center vh-100">
        <!-- Login Part -->
        <div class="col-md-6 border p-4 shadow">
            <div id="loginPart">
                <h5 class="modal-title text-black mb-4 display-2">Customer Login</h5>
                <form action="cus_login.php" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label text-black fs-4">Username</label>
                        <input type="text" class="form-control form-control-lg" id="username" name="username" required>
                    </div>
                    <div class="mb-3 position-relative">
                        <label for="password" class="form-label text-black fs-4">Password</label>
                        <input type="password" class="form-control form-control-lg" id="password" name="password" required>
                        <span class="text-black fs-6" style="cursor: pointer;" onclick="togglePasswordVisibility()">Show Password</span>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg">Login</button>
                    </div>
                    <div class="mt-4">
                        <p class="text-black fs-4">Don't have an account? <a href="cus_registration.php" class="text-warning">Sign up</a></p>
                    </div>
                </form>
            </div>
        </div>
        <!-- Image Part -->
        <div class="col-md-6 d-none d-sm-block">
            <div class="photo d-flex justify-content-center align-items-center">
                <img src="../application/login.jpg" alt="Your Image" class="img-fluid" style="max-width: 100%; max-height: 100%; object-fit: cover; object-position: left;">
            </div>
        </div>
    </div>
</div>

    <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="errorModalLabel">Login Error</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    The username or password was incorrect.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="location.tec_login.php">OK</button>
                </div>
            </div>
        </div>
    </div>
    <script>
    function closePage() {
        window.location.href = '../home.php'; // change 'home.php' to your desired URL
    }
</script>
<script>
    function togglePasswordVisibility() {
    let passwordField = document.getElementById('password');
    if (passwordField.type === 'password') {
        passwordField.type = 'text';
    } else {
        passwordField.type = 'password';
    }
}

</script>

    <!-- Bootstrap 5 JS bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>










