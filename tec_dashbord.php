<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Header</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

<?php
// Start the session to access stored user information
session_start();

// Display message after job post acceptance
if (isset($_SESSION['message'])) {
    echo '<div class="alert alert-success">' . $_SESSION['message'] . '</div>';
    unset($_SESSION['message']);
}

if (isset($_SESSION['error'])) {
    echo '<div class="alert alert-danger">' . $_SESSION['error'] . '</div>';
    unset($_SESSION['error']);
}

// Check if the user is logged in (you can add more sophisticated checks if needed)
if (!isset($_SESSION["username"])) {
    // Redirect to the login page if the user is not logged in
    header("Location: index.html");
    exit;
}

// Retrieve the user's name from the session
$username = $_SESSION["username"];

?>



<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand" href="#">
            <img src="images/logo.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
        </a>

        <!-- Toggler for small screens -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Nav items and login button -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <!-- Other Nav items -->
                <li class="nav-item">
                    <a class="nav-link" href="tec_home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tec_addpost.php">Add Post</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tec_display.php">Display</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tec_cus_display.php">Cus Display</a>
                </li>
            </ul>

            <!-- Login Dropdown -->
            <ul class="navbar-nav ms-auto">
                <div class="user-info">
                    <div class="display-6"><?php echo isset($_SESSION['name']) ? $_SESSION['name'] : ''; ?></div>
                    <div class="fs-6 text-muted"><?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?></div>
                </div>
                <!-- Profile Image -->
                <li class="nav-item">
                <a class="nav-link" href="tec_profile.php">    
                <img src="<?php echo isset($_SESSION['profile_image']) && file_exists($_SESSION['profile_image']) ? $_SESSION['profile_image'] : 'profile images/profile.png'; ?>"
                 alt="Profile Image" class="circle" width="50" height="50"></a>

                </li>
            </ul>

            

            
            <ul>
                <div class="text-center mt-4">
                    <a href="logout.php" class="btn btn-danger">Logout</a>
                </div>
            </ul>    
        </div>
    </div>
</nav>



