<?php

$host = "localhost";
$db   = "jas";
$user = "root";
$pass = "";
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

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
        echo "The username or password was incorrect.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Login</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">

    <style>
        body, html {
            height: 100%;
        }

        /* Desktop View */
        #splitScreenContainer {
            display: flex;
            height: 100vh;
        }

        #bgVideo {
            width: 40%;
            height: 100%;
            object-fit: cover;
            border-right: 5px solid #1a1a1a;
        }

        #loginPart {
            width: 60%;
            padding: 5% 10%;
            background: linear-gradient(120deg, #2c3e50 0%, #34495e 100%);
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        @media (max-width: 767px) {
    #splitScreenContainer {
        flex-direction: column-reverse;
        align-items: center;
        justify-content: center; /* This ensures content is centered vertically on mobile */
    }

    #bgVideo {
        width: 100%;
        height: 100%;
        position: fixed;
        top: 0;
        left: 0;
        z-index: -1;
        border-right: none;
    }

    #loginPart {
        width: 95%;
        padding: 10%;
        /* Since you want it centered, these flex properties help in achieving that */
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
}
    </style>
</head>

<body>
    <div id="splitScreenContainer">
        <!-- Background Video -->
        <video autoplay muted loop id="bgVideo">
            <source src="../application/logvideo.mp4" type="video/mp4">
            
        </video>

        <!-- Login Part -->
        <div id="loginPart">
            <h5 class="modal-title text-white mb-4 display-2">Login</h5>
            <form action="cus_login.php" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label text-white fs-3">Username</label>
                    <input type="text" class="form-control form-control-lg" id="username" name="username" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label text-white fs-3">Password</label>
                    <input type="password" class="form-control form-control-lg" id="password" name="password" required>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-lg">Login</button>
                </div>
                <div class="mt-4">
                    <p class="text-white fs-4">Don't have an account? <a href="cus_registration.php" class="text-warning">Sign up</a></p>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap 5 JS bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>










