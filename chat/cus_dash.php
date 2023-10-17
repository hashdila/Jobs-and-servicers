



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


    <style>
        .navbar-nav .nav-link i, .navbar-nav .nav-link {
            font-size: 1.5em;  /* Adjust this value as per your requirement */
        }
        .navbar.bg-light-green {
        background-color: #98FB98 !important;  /* This is the light green color */
}

        </style>

</head>
<body>

<?php
// Start the session to access stored user information
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

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



<nav class="navbar navbar-expand  bg-light">
    <div class="container">
        <!-- Logo -->
        <!-- <a class="navbar-brand" href="#">
            <img src="../images/logo.png" alt="Logo" width="50" height="50" class="d-inline-block align-text-top">
        </a> -->

        <!-- Nav items and login button -->
        <ul class="navbar-nav">
            <!-- Other Nav items -->
            <li class="nav-item">
                <a class="nav-link" href="../cus/cus_home.php"><i class="fas fa-home"></i> Home</a>
            </li>
            <!-- More Nav items ... -->
        </ul>


        <ul class="navbar-nav ms-auto">
            <div class="user-info">
                <div class="display-6"><?php echo isset($_SESSION['name']) ? $_SESSION['name'] : ''; ?></div>
                <div class="fs-6 text-muted"><?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?></div>
            </div>
            <!-- Profile Image -->
            <li class="nav-item">
                <a class="nav-link" href="../cus/cus_profile.php">    
                <img src="<?php echo isset($_SESSION['profile_image']) && file_exists($_SESSION['profile_image']) ? $_SESSION['profile_image'] : '../profile images/profile.png'; ?>"
                 alt="Profile Image" class="circle" width="50" height="50"></a>
            </li>
        </ul>
        <div class="text-center mt-4">
        <button id="logout-button" class="btn btn-danger">Logout</button>
        </div>   
    </div>
</nav>

<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logoutModalLabel">Logout Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to log out?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <a href="?logout_id=<?php echo $_SESSION['unique_id']; ?>" class="btn btn-primary">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Include jQuery and Bootstrap scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Function to show the logout confirmation modal
    function showLogoutModal() {
        $('#logoutModal').modal('show');
    }

    // Attach an event listener to the new Logout button
    document.getElementById('logout-button').addEventListener('click', function () {
        showLogoutModal();
    });

    // Function to handle the logout action
    function logout() {
        // Redirect to the logout page (../logout.php in your case)
        window.location.href = '../logout.php';
    }

    // Attach an event listener to the "Logout" button inside the modal
    document.getElementById('modal-logout-button').addEventListener('click', function () {
        logout();
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>





</body>
</html>
