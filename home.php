<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Header</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
       
   <style>
    .custom-font {
        font-family: 'Dancing Script', cursive;
        font-size: 1.5rem; /* Increase the font size */
    }

    /* For mobile screens */
    @media (max-width: 768px) { /* This is the typical breakpoint for mobile screens with Bootstrap */
        .custom-navbar {
            justify-content: center;
            align-items: center;
            background-color: black; 
        }
    }

</style>


</head>
<body>






<nav class="container navbar navbar-expand-lg navbar-light bg-tranceperent fixed-top">
    <div class="container-fluid">
        <!-- Logo Section -->
        <a class="navbar-brand d-flex align-items-center" href="admin/ad_login.php">
            <img src="application/logo.png" alt="Your Logo" width="65" height="65" class="d-inline-block align-top">
            <span class="ms-3" style="font-size: 1.5rem;">Jobs and servisers</span>
        </a>

        <!-- Buttons Section -->
        <div class="d-flex">
            <a href="tec/tec_login.php" class="btn btn-primary me-2" role="button">Technician Login</a>
            <a href="cus/cus_login.php" class="btn btn-success" role="button">Customer Login</a>
        </div>
    </div>
</nav>










<!-- Include your additional content here -->

<?php include 'search.php'; ?>



<?php include 'home_map.php'; ?>



<?php include 'homedisplaypost.php'; ?>


<?php include 'footer.php'; ?>

<!-- Bootstrap JS -->




<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js"></script>
</body>
</html>
