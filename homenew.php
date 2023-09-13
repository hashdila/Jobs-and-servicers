<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Header</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Animate.css for animations -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary animate__animated animate__fadeInDown">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand" href="#">Jobs and Servicers</a>

        <!-- Toggler for small screens -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Nav items and login button -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- Left Navigation items -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link animate__animated animate__slideInLeft" href="#"><i class="bi bi-house-door-fill"></i> Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link animate__animated animate__slideInLeft" href="#"><i class="bi bi-info-circle-fill"></i> About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link animate__animated animate__slideInLeft" href="#"><i class="bi bi-envelope-fill"></i> Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link animate__animated animate__slideInLeft" href="scann.php"><i class="bi bi-upc-scan"></i> Scan</a>
                </li>
            </ul>

            <!-- Right Navigation items -->
            <ul class="navbar-nav ml-auto">
                <!-- Login Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle animate__animated animate__slideInRight" href="#" id="loginDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-fill"></i> Login
                    </a>
                    <div class="dropdown-menu" aria-labelledby="loginDropdown">
                        <!-- Using data-bs-toggle and data-bs-target to trigger the modal -->
                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#loginModal">Customer</a>
                        <a class="dropdown-item" href="tec_login.php">Technician</a>
                    </div>
                </li>
                
                <!-- Settings Icon -->
                <li class="nav-item">
                    <a class="nav-link animate__animated animate__slideInRight" href="#" data-bs-toggle="tooltip" title="Settings"><i class="bi bi-gear-fill"></i></a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Include your additional content here -->

<?php include 'home_map.php'; ?>

<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="cus_login.php" method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Login</button>
                        <a href="cus_registration.php" class="btn btn-secondary">Register</a>
                    
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"></script>

</body>
</html>
